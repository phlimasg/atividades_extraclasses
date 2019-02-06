<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.usuario.user_index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|regex:/^.+@lasalle.+$/i',
        ],
            [
                'required' => 'Campo Obrigatório',
                'regex' => 'Somente email @lasalle'
            ]
        );
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with('message' , 'Usuário criado com sucesso!');
        }catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
        } 
        
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        try{
            User::destroy($id);            
            return redirect()->back()->with('message' , 'Usuário excluído com sucesso!');
        }catch (\Exception $e) {
            $message = $e->getMessage();
            return view('errors.404',compact('message'));
        }         
    }
}
