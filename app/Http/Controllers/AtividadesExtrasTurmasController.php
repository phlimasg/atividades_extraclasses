<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\atv_extra_turma;
use Illuminate\Support\Facades\Auth;
use App\Model\turmas;
use App\Model\atv_extra_turmas_autorizadas;
use App\Model\inscricao;
use App\Model\espera;
use App\Model\UVW_STE_ALUNOS_E_RESPONSAVEIS;
use Mpdf\Mpdf;


class AtividadesExtrasTurmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turmas = turmas::get();        
        return view('admin.atv_extra_turma.turma_create', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'descricao_turma' => 'required|max:254',
            'hora_ini' =>'required|date_format:H:i',
            'hora_fim' => 'nullable|date_format:H:i|after:hora_ini',
            'vagas' => 'required|integer',
            'valor' => 'required|regex:/^\d*(\,\d{1,2})?$/',
            'turmas' => 'required',
            'dias' => 'required',
        ],
        [
            'required' => 'Campo Obrigatório',
            'max' => 'Tamanho máximo de 254.'
        ]);
        //dd($request->all());
        try{
            $turma = new atv_extra_turma();
            $turma->descricao_turma = $request->descricao_turma;
            $turma->hora_ini = $request->hora_ini;
            $turma->hora_fim = $request->hora_fim;
            $turma->vagas = $request->vagas;
            $turma->valor = $request->valor;
            $turma->user = Auth::user()->email;
            $turma->atv_extra_id = $id;
            foreach($request->dias as $d){
                $turma->dia .= $d.' | ';
            }
            $turma->save();
            //dd($request->turmas);
            foreach($request->turmas as $t){
                $aut = new atv_extra_turmas_autorizadas();
                $aut->atv_extra_turma_id = $turma->id;
                $aut->turmas_id = $t;
                $aut->user = Auth::user()->email;
                $aut->save();
            }
            return redirect()->back()->with('message' , 'A Turma '.$turma->descricao_turma.' foi salvo(a) com sucesso!');
        }catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
           $turma = atv_extra_turma::find($id);           
           $turmas_aut = turmas::whereIn('id', 
            atv_extra_turmas_autorizadas::select('turmas_id')
            ->where('atv_extra_turma_id',$id)
            ->get())           
           ->get();
           $insc = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('RA','NOME_ALUNO','TURMA')
           ->whereIn('RA',
           inscricao::select('aluno_id')->where('atv_extra_turma_id',$id)->get()
           )           
           ->get();
           $espera = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('RA','NOME_ALUNO','TURMA')
           ->whereIn('RA',
           espera::select('aluno_id')->where('atv_extra_turma_id',$id)->orderBy('created_at')->get()
           )           
           ->get();
           return view('admin.atv_extra_turma.turma_show', compact('turma','turmas_aut','insc','espera'));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function inscPdf($id){ 
        try {
            $insc = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('RA','NOME_ALUNO','RESPACAD', 'RESPACADEMAIL','ANO','TURMA','TURNO_ALUNO','RESPACADTEL1','RESPACADTEL2')
            ->whereIn('RA',inscricao::select('aluno_id')->where('atv_extra_turma_id',$id)->where('pagamento',1)->get())        
            ->get();
            $atv = atv_extra_turma::where('atv_extra_turmas.id',$id)
            ->join('atv_extras','atv_extra_id','atv_extras.id')
            ->first();
            //dd($atv,$insc);
            $pdf = new Mpdf(['tempDir' => storage_path('app\public')]);            
            $pdf->WriteHTML(view('admin.recibo.lista', compact('insc','atv')));            
            $pdf->Output();
         } catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
            }   
    }
    public function espera($id){ 
        try {
            $insc = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('RA','NOME_ALUNO','RESPACAD', 'RESPACADEMAIL','ANO','TURMA','TURNO_ALUNO','RESPACADTEL1','RESPACADTEL2')
            ->whereIn('RA',espera::select('aluno_id')->where('atv_extra_turma_id',$id)->get())        
            ->get();
            $atv = atv_extra_turma::where('atv_extra_turmas.id',$id)
            ->join('atv_extras','atv_extra_id','atv_extras.id')
            ->first();
            //dd($atv,$insc);
            $pdf = new Mpdf(['tempDir' => storage_path('app\public')]);            
            $pdf->WriteHTML(view('admin.recibo.espera', compact('insc','atv')));            
            $pdf->Output();
         } catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
            }   
    }
}
