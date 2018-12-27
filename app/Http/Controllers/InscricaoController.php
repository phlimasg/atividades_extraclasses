<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UVW_STE_ALUNOS_E_RESPONSAVEIS;
use App\Model\turmas;
use App\Model\atv_extra_turmas_autorizadas;
use App\Model\atv_extra;

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
        $t = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('RA','NOME_ALUNO')
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
        //
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
            //pesquisa as atividades para o aluno
            $atv = atv_extra::select('atv_extra_turmas.atv_extra_id', 'descricao_atv', 'atv_extra_turmas.id', 'descricao_turma', 'hora_ini', 'hora_fim', 'valor', 'dia' )
            ->join('atv_extra_turmas', 'atv_extras.id', 'atv_extra_id') 
            ->whereIn('atv_extra_turmas.id', atv_extra_turmas_autorizadas::select('atv_extra_turma_id')
                ->whereIn('turmas_id',turmas::select('id')
                    ->where('cod','like',$turma.'%')->first())
                ->get())       
            ->get(); 
            //dd($atv) ;
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
        //
    }
}
