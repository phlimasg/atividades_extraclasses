<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\totvs;
use App\Model\UVW_STE_ALUNOS_E_RESPONSAVEIS;
use App\Model\inscricao;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$update = UVW_STE_ALUNOS_E_RESPONSAVEIS::whereNotIn('RA', totvs::select('RA')->orderBy('RA')->limit(0,2000)->get())
        ->whereNotIn('RA', totvs::select('RA')->orderBy('RA')->limit(2000,2000)->get())
        ->get();        
        dd(totvs::select('RA')->orderBy('RA')->limit(2000,2000)->get());     */
        $grafico = inscricao::join('atv_extra_turmas','atv_extra_turma_id','atv_extra_turmas.id')
        ->join('atv_extras','atv_extra_id','atv_extras.id')
        ->selectRaw('descricao_atv, count(*) as insc')
        ->groupBy('atv_extras.id')
        ->orderBy('descricao_atv')
        ->get();
        $count1 = UVW_STE_ALUNOS_E_RESPONSAVEIS::count();
        $count2 = totvs::count();        
        if ($count1 > $count2) {
            $update = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('RA','NOME_ALUNO','CARTEIRINHA','SEXO','ANO','TURMA','TURNO_ALUNO','RESPACAD','RESPACADEMAIL','RESPACADTEL1','RESPACADTEL2','RESPFIN','RESPFINEMAIL','RESPFINTEL1','RESPFINCEL')
            ->get();
            totvs::truncate();
            foreach ($update as $a) {
                $local = new totvs();
                $local->RA = $a->RA;            
                $local->NOME_ALUNO = $a->NOME_ALUNO; 
                $local->CARTEIRINHA = $a->CARTEIRINHA; 
                $local->SEXO = $a->SEXO; 
                $local->ANO = $a->ANO;
                $local->TURMA = $a->TURMA; 
                $local->TURNO_ALUNO = $a->TURNO_ALUNO; 
                $local->RESPACAD = $a->RESPACAD; 
                $local->RESPACADEMAIL = $a->RESPACADEMAIL;
                $local->RESPACADTEL1 = $a->RESPACADTEL1; 
                $local->RESPACADTEL2 = $a->RESPACADTEL2; 
                $local->RESPFIN = $a->RESPFIN; 
                $local->RESPFINEMAIL = $a->RESPFINEMAIL; 
                $local->RESPFINTEL1 = $a->RESPFINTEL1; 
                $local->RESPFINCEL = $a->RESPFINCEL;
                $local->save();
            }
            $up = 'Base de alunos atualizada.';
            return view('home',compact('up','grafico'));
        }        
        return view('home',compact('grafico'));
    }
}
