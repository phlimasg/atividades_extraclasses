@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-10"><h3>Efetuar troca de turma - {{$aluno->NOME_ALUNO}}</h3></div>    
    </div>    
    <hr>
    @if (Session::has('message'))
    <div class="alert alert-success">
        <b>Dados salvos!</b> <br>
        {{Session::get('message')}}                
    </div>  
    <br>       
    @endif
    Selecione a turma:
    <form action="" method="post">
        @csrf
    <input type="hidden" name="ra" value="{{Request::segment(5)}}">
    <input type="hidden" name="turma_old" value="{{Request::segment(4)}}">
    <div class="row">
        <div class="col-sm-8">
            <select name="turma" class="form-control">
                <option value=""></option>
                @foreach ($atv as $a)
                @if ($a->id != Request::segment(4))
                    <option value="{{$a->id}}">{{$a->descricao_turma}} - {{$a->hora_ini}} - {{$a->hora_fim}} - {{$a->dia}}</option>    
                @endif
                
                @endforeach            
            </select>
        </div>
        <div class="col-sm-2"><button type="submit" class="btn btn-danger">Trocar</button></div>
    </div>
    </form>
    
    
    
    
</div>
@endsection
