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
            $insc = new inscricao();
            $insc->aluno_id = $request->mat;
            $insc->pagamento = 0;
            $insc->user = Auth::user()->email;
            $insc->atv_extra_turma_id = $a;            
            $insc->save();
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
        ->join('atv_extra_turmas','inscricaos.atv_extra_turma_id','atv_extra_turmas.id')
        ->join('atv_extras', 'atv_extra_turmas.atv_extra_id','atv_extras.id')
        ->get();
        //dd($atv);
        return view('admin.insc.insc_confirma', compact('atv'));
    }
    public function recibo($ra){
        $aluno = UVW_STE_ALUNOS_E_RESPONSAVEIS::where('RA',$ra)->select('NOME_ALUNO','RESPFIN')->first();
        //dd($aluno);
        $atv = inscricao::where('inscricaos.aluno_id', $ra)
        ->select('inscricaos.id','valor','descricao_turma','descricao_atv','hora_ini','hora_fim','dia')
        ->join('atv_extra_turmas','inscricaos.atv_extra_turma_id','atv_extra_turmas.id')
        ->join('atv_extras', 'atv_extra_turmas.atv_extra_id','atv_extras.id')
        ->get();
        //dd($atv);
        $pdf = new Mpdf();
        foreach($atv as $a){
            $pdf->WriteHTML(view('admin.recibo.recibo', compact('a','aluno')));
            $pdf->WriteHTML(view('admin.recibo.recibo', compact('a','aluno')));
            $pdf->AddPage();
        }        
        $pdf->Output();
        dd($atv);
    }
}
