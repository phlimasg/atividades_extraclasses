<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\totvs;
use App\Model\UVW_STE_ALUNOS_E_RESPONSAVEIS;
use App\Model\inscricao;
use App\Model\cancelamento;

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
        ->selectRaw('atv_extras.id, descricao_atv, count(*) as insc')
        ->where('pagamento',1)
        ->groupBy('atv_extras.id')
        ->orderBy('descricao_atv')
        ->get();
        $inscritos = inscricao::join('atv_extra_turmas','atv_extra_turma_id','atv_extra_turmas.id')
        ->join('atv_extras','atv_extra_id','atv_extras.id')
        ->join('totvs','aluno_id','totvs.RA')
        ->where('pagamento',1)
        ->select('totvs.NOME_ALUNO','atv_extra_turmas.descricao_turma','descricao_atv','inscricaos.created_at','atv_extra_turmas.id')
        ->groupBy('totvs.NOME_ALUNO','atv_extra_turmas.descricao_turma','descricao_atv','inscricaos.created_at','atv_extra_turmas.id')
        ->orderBy('inscricaos.created_at','desc')
        ->limit(100)
        ->get();
        $cancel = cancelamento::join('atv_extra_turmas','atv_extra_turma_id','atv_extra_turmas.id')
        ->join('atv_extras','atv_extra_id','atv_extras.id')
        ->join('totvs','aluno_id','totvs.RA')
        ->select('totvs.NOME_ALUNO','atv_extra_turmas.descricao_turma','descricao_atv','cancelamentos.created_at','cancelamentos.user')
        ->groupBy('totvs.NOME_ALUNO','atv_extra_turmas.descricao_turma','descricao_atv','cancelamentos.created_at','cancelamentos.user')
        ->orderBy('cancelamentos.created_at','desc')
        ->limit(100)
        ->get();
        //dd($inscritos);
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
            return view('home',compact('up','grafico','inscritos','cancel'));
        }        
        return view('home',compact('grafico','inscritos','cancel'));
    }
}
