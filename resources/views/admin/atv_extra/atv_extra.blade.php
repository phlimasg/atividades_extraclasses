@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>
        Atividades Extraclasse Cadastradas
    </h1>
    <hr>  
    <div class="table-responsive">          
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Descrição</th>
                  <th>Cod. Totvs</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>  
    @forelse ($atv as $i)    
                <tr>
                  <td>{{$i->id}}</td>
                  <td>{{$i->descricao_atv}}</td>
                  <td>{{$i->cod_totvs}}</td>
                  <td><a href="{{route('atividades_show',['id' => $i->id])}}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                  <td><a href="{{route('atividades_edit',['id' => $i->id])}}" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a></td>                  
                </tr>    
    @empty
    <div class="alert alert-info">
        <strong>Ops!</strong> Nenhuma atividade cadastrada. <br>
    <a href="{{route('atividades_create')}}" class="btn btn-danger"> <span class="glyphicon glyphicon-plus"></span> Adicionar atividade</a>
    </div> 
    @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
