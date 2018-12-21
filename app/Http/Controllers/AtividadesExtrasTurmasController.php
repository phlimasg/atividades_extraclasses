<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\atv_extra_turma;
use Illuminate\Support\Facades\Auth;
use App\Model\atv_extra_horario;

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
        return view('admin.atv_extra_turma.turma_create');
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
        ],
        [
            'required' => 'Campo Obrigatório'
        ]);

        try{
            $turma = new atv_extra_turma();
            $turma->descricao_turma = $request->descricao_turma;
            $turma->user = Auth::user()->email;
            $turma->atv_extra_id = $id;
            $turma->save();
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
           $horarios = atv_extra_horario::where('atv_extra_turma_id',$id)->get();
           return view('admin.atv_extra_turma.turma_show', compact(['turma', 'horarios']));
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
