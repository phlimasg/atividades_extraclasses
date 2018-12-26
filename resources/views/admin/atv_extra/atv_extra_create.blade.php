@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Adicionar Atividade Extraclasse</h1>
    <hr>
    @if (Session::has('message'))
    <div class="alert alert-success">
        <b>Dados salvos!</b> <br>
        {{Session::get('message')}} <br>
    <a href="{{route('turmas_create', ['id' => Session::get('id')])}}" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> Adicionar Turma</a>

    </div>  
    <br>       
    @endif
    <form action="{{route('atividades_store')}}" method="POST">
        @csrf
        <div class="form-group col-sm-6">
            <div class="form-group">
                <label for="descricao_atv">Descrição da atividade:</label>
            <input type="text" name="descricao_atv" autofocus class="form-control" placeholder="Ex: Catequese, Escolinha, etc..." value="{{old('descricao_atv')}}">
            @if ($errors->has('descricao_atv'))
            <div class="alert alert-danger">
                {{$errors->first('descricao_atv')}}
            </div>
            @endif                
            </div>            
            <div class="form-group">
                <label for="cod_totvs">Código Totvs:</label>
                <input type="text" class="form-control" placeholder="Descrição da Atividade" name="cod_totvs">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>        
        </div>  
    </form>
</div>
@endsection