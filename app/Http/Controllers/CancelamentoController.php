<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UVW_STE_ALUNOS_E_RESPONSAVEIS;
use App\Model\inscricao;
use App\Model\cancelamento;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;

class CancelamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.insc_cancel.cancel_index');
    }

    public function search(Request $request)
    {        
        try {
            $request->validate([
                'search' => 'required'
            ]);
            $t = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('RA','NOME_ALUNO','RESPFIN')
            ->where('RA', 'like','%'.$request->search)
            ->orWhere('NOME_ALUNO', 'like',$request->search.'%')
            ->get();        
            return view('admin.insc_cancel.cancel_index', compact('t'));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
        }
    }

    public function cancelar($mat, $id)
    {
        try {
            $aluno = UVW_STE_ALUNOS_E_RESPONSAVEIS::where('RA',$mat)->select('NOME_ALUNO')->first();            
            $insc = inscricao::where('aluno_id',intval($mat))->where('inscricaos.id',$id)
            ->select('aluno_id','inscricaos.id','atv_extra_turma_id','descricao_turma','hora_ini','hora_fim','dia','descricao_atv','atv_extra_id')
            ->join('atv_extra_turmas','inscricaos.atv_extra_turma_id','atv_extra_turmas.id')
            ->join('atv_extras','atv_extra_turmas.atv_extra_id','atv_extras.id')
            ->first();
            //dd($insc);
            $cancel = new cancelamento();
            $cancel->aluno_id = $insc->aluno_id;
            $cancel->atv_extra_turma_id = $insc->atv_extra_turma_id;
            $cancel->user = Auth::user()->email;            
            $cancel->save();
            inscricao::destroy($id);
            $pdf = new Mpdf(['tempDir' => storage_path('app\public')]);            
            $pdf->WriteHTML(view('admin.recibo.cancelamento', compact('insc','aluno')));                
            $pdf->WriteHTML(view('admin.recibo.cancelamento', compact('insc','aluno')));                
            
            $pdf->Output();
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
        }
    }
  
    public function show($id)
    {
        try {
            $aluno = UVW_STE_ALUNOS_E_RESPONSAVEIS::select('NOME_ALUNO')->where('RA',$id)->first();
            $atv = inscricao::where('aluno_id',$id)
            ->select('inscricaos.id','atv_extra_turma_id','descricao_turma','hora_ini','hora_fim','dia','descricao_atv','atv_extra_id')
            ->join('atv_extra_turmas','inscricaos.atv_extra_turma_id','atv_extra_turmas.id')
            ->join('atv_extras','atv_extra_turmas.atv_extra_id','atv_extras.id')
            ->where('pagamento',1)
            ->orderBy('descricao_atv')
            ->get();
            //dd($atv);
            return view('admin.insc_cancel.cancel_show', compact('aluno','atv'));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
        }
    }
}
