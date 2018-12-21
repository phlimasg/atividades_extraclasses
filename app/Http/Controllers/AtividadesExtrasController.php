<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\atv_extra;
use Illuminate\Support\Facades\Auth;
use App\Model\atv_extra_turma;
use App\Model\atv_extra_horario;

class AtividadesExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $atv = atv_extra::get();
        return view('admin.atv_extra.atv_extra', compact('atv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.atv_extra.atv_extra_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao_atv' => 'required|string|max:254',
            'cod_totvs' => 'nullable',
        ],[
            'required' => 'Campo Obrigatório',
        ]);
        try {
            $atv = new atv_extra();
            $atv->descricao_atv = $request->descricao_atv;
            $atv->cod_totvs = $request->cod_totvs;
            $atv->user = Auth::user()->email;
            $atv->save();            
            return redirect()->back()
            ->with('message' , 'A atividade '.$atv->descricao_atv.' foi salvo(a) com sucesso!')
            ->with('id', $atv->id);
        } catch (\Exception $e) {
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
        try{
            $atv = atv_extra::find($id);
            if($atv == null) abort(404, "NOT FOUND.... Atividade não encontrada. Id da atividade: $id");
            $turmas = atv_extra_turma::where('atv_extra_id', $id)->get();            
            return view('admin.atv_extra.atv_extra_show', compact('atv','turmas'));
        }catch (\Exception $e) {
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
        try{
            $atv = atv_extra::find($id);
            if($atv == null) abort(404, "NOT FOUND.... Atividade não encontrada. Id da atividade: $id");
            return view('admin.atv_extra.atv_extra_update', compact('atv'));
        }catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
        }  
        
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
        $request->validate([
            'descricao_atv' => 'required|string|max:254',
            'cod_totvs' => 'nullable',
        ],[
            'required' => 'Campo Obrigatório',
        ]);

        try {
            atv_extra::where('id',$id)
            ->update([
            'descricao_atv' => $request->descricao_atv,
            'cod_totvs' =>$request->cod_totvs,
            ]);
            return redirect()
            ->route('atividades_edit', ['id'=> $id])
            ->with('message' , 'A atividade '.$request->descricao_atv.' foi atualizado(a) com sucesso!');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
        }
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
