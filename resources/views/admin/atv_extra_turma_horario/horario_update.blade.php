@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Editar Atividade Extraclasse</h1>
    <hr>
    @if (Session::has('message'))
    <div class="alert alert-success">
        <b>Dados salvos!</b> <br>
        {{Session::get('message')}}
    </div>  
    <br>       
    @endif
    <form action="{{route('atividades_update',['id'=> Request::segment(3)])}}" method="POST">
        @csrf
        <div class="form-group col-sm-6">
            <div class="form-group">
                <label for="descricao_atv">Descrição da atividade:</label>
            <input type="text" name="descricao_atv" autofocus class="form-control" placeholder="Ex: Catequese, Escolinha, etc..."             
            @if (!empty($atv->descricao_atv))
            value="{{$atv->descricao_atv}}"    
            @endif
            />
            @if ($errors->has('descricao_atv'))
            <div class="alert alert-danger">
                {{$errors->first('descricao_atv')}}
            </div>
            @endif                
            </div>            
            <div class="form-group">
                <label for="cod_totvs">Código Totvs:</label>
                <input type="text" class="form-control" placeholder="Descrição da Atividade" name="cod_totvs" 
                @if (!empty($atv->cod_totvs))
                    value="{{$atv->cod_totvs}}"    
                @endif>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>        
        </div>  
    </form>
    
</div>
@endsection
