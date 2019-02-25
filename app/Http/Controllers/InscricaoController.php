<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UVW_STE_ALUNOS_E_RESPONSAVEIS;
use App\Model\turmas;
use App\Model\atv_extra_turmas_autorizadas;
use App\Model\atv_extra;
use App\Model\atv_extra_turma;
use App\Model\inscricao;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;
use App\Model\espera;

class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.insc.insc_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $t = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('RA','NOME_ALUNO','RESPFIN')
        ->where('RA', 'like','%'.$request->search)
        ->orWhere('NOME_ALUNO', 'like',$request->search.'%')
        ->get();        
        return view('admin.insc.insc_index', compact('t'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->atv as $a) { 
            //verifica se o aluno ja está inscrito           
            $i = inscricao::where('aluno_id', $request->mat)
            ->where('atv_extra_turma_id', $a)
            ->where('pagamento', 1)
            ->first();
            $incritos = inscricao::where('pagamento',1)
            ->where('atv_extra_turma_id',$a)
            ->count();
            $vagas = atv_extra_turma::select('vagas')->where('id',$a)->first();
            $vgsobra = $vagas->vagas - $incritos;            
            if(empty($i) && $vgsobra > 0){
                $insc = new inscricao();
                $insc->aluno_id = $request->mat;
                $insc->pagamento = 0;
                $insc->user = Auth::user()->email;
                $insc->atv_extra_turma_id = $a;            
                //echo('salvou');
                $insc->save();
            }elseif($vgsobra == 0){
                $espera = new espera();
                $espera->aluno_id = $request->mat;               
                $espera->user = Auth::user()->email;
                $espera->atv_extra_turma_id = $a;            
                //echo('salvou');
                $espera->save();
            }
                        //dd($insc);            
        }        
        return redirect()->route('insc_pagamento', ['ra' => $request->mat]);
        
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
            //pega a turma do aluno
            $aluno = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('RA', 'NOME_ALUNO', 'TURMA','ANO')
            ->where('RA',$id)
            ->first();              
            $turma = substr($aluno->TURMA,0,7);
            dd($aluno,$turma);
            
            //pesquisa as atividades para o aluno
            $atv = atv_extra::select('vagas','atv_extra_turmas.atv_extra_id', 'descricao_atv', 'atv_extra_turmas.id', 'descricao_turma', 'hora_ini', 'hora_fim', 'valor', 'dia')            
            ->join('atv_extra_turmas', 'atv_extras.id', 'atv_extra_id') 
            ->selectRaw('(SELECT COUNT(*) from inscricaos WHERE pagamento = 1 AND inscricaos.atv_extra_turma_id = atv_extra_turmas.id) as inscritos')            
            ->whereIn('atv_extra_turmas.id', 
            atv_extra_turmas_autorizadas::select('atv_extra_turma_id')
                ->whereIn('turmas_id',turmas::select('id')
                ->where('cod','like',$turma.'%')->first())
                ->get())
                ->groupBy('atv_extra_turmas.id')
                ->orderBy('descricao_atv')
            ->get();            
            return view('admin.insc.insc_show', compact(['atv','aluno']));
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
        inscricao::destroy($id);
        return redirect()->back();
    }

    public function pagamento($ra){
        $atv = inscricao::where('inscricaos.aluno_id', $ra)
        ->select('inscricaos.id','valor','descricao_turma','descricao_atv')
        ->where('pagamento',0)
        ->join('atv_extra_turmas','inscricaos.atv_extra_turma_id','atv_extra_turmas.id')
        ->join('atv_extras', 'atv_extra_turmas.atv_extra_id','atv_extras.id')
        ->get();
        $espera = espera::where('aluno_id',$ra)
        ->join('atv_extra_turmas','esperas.atv_extra_turma_id','atv_extra_turmas.id')
        ->join('atv_extras', 'atv_extra_turmas.atv_extra_id','atv_extras.id')
        ->get();        
        return view('admin.insc.insc_confirma', compact('atv','espera'));
    }
    public function recibo($ra){
        $aluno = UVW_STE_ALUNOS_E_RESPONSAVEIS::where('RA',$ra)->select('NOME_ALUNO','RESPFIN')->first();
        //dd($aluno);
        $atv = inscricao::where('inscricaos.aluno_id', $ra)
        ->where('pagamento',0)
        ->select('inscricaos.id','valor','descricao_turma','descricao_atv','hora_ini','hora_fim','dia','pagamento')
        ->join('atv_extra_turmas','inscricaos.atv_extra_turma_id','atv_extra_turmas.id')
        ->join('atv_extras', 'atv_extra_turmas.atv_extra_id','atv_extras.id')
        ->get();
        //dd($atv);
        $pdf = new Mpdf(['tempDir' => storage_path('app\public')]);
        $count = 1;        
        foreach($atv as $a){
            $a->pagamento = 1;
            $a->save();
            $pdf->WriteHTML(view('admin.recibo.recibo', compact('a','aluno')));
            $pdf->WriteHTML(view('admin.recibo.recibo', compact('a','aluno')));            
            if($count < sizeof($atv))
                $pdf->AddPage();
            $count++;
        }        
        $pdf->Output();
    }
    public function exibe_recibo(){
        return view('admin.insc.insc_recibo');
    }
}
