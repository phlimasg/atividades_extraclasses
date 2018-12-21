@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10"><h1>Adicionar Turma</h1></div>
    <div class="col-sm-2"><a href="{{route('atividades_show', ['id' => Request::segment(4)])}}" class="btn btn-primary btn-add"> <span class="glyphicon glyphicon-arrow-left "></span> Voltar</a></div>
    </div>
    
    
    <hr>
    @if (Session::has('message'))
    <div class="alert alert-success">
        <b>Dados salvos!</b> <br>
        {{Session::get('message')}}
        <br>
        <a href="" class="btn btn-primary btn-pisca"> <span class="glyphicon glyphicon-plus"></span> Adicionar Horário</a>
    </div>  
    <br>       
    @endif
    <form action="{{route('turmas_store', ['id' => Request::segment(4)])}}" method="POST">
        @csrf
        <div class="form-group col-sm-6">
            <div class="form-group">
                <label for="descricao_turma">Descrição da Turma:</label>
            <input type="text" name="descricao_turma" autofocus class="form-control" placeholder="Ex: Turma A, Grupo A, Fraldinha I...">
            @if ($errors->has('descricao_turma'))
            <div class="alert alert-danger">
                {{$errors->first('descricao_turma')}}
            </div>
            @endif                
            </div>                        
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Adicionar</button>        
        </div>  
    </form>
    
</div>
@endsection
