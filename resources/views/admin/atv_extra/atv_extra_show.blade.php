@extends('layouts.app')

@section('content')
<div class="container-fluid">    
        <div class="row">
            <div class="col-sm-10">
                <h1>{{$atv->descricao_atv}} - Detalhes </h1> 
            </div>
            <div class="col-sm-2">            
                <a href="{{route('turmas_create', ['id' => Request::segment(3)])}}" class="btn btn-primary btn-add btn-pisca"> <span class="glyphicon glyphicon-plus"></span> Adicionar Turma</a>                
            </div>
        </div>    
    <hr> 
        <div class="panel panel-primary">
            <div class="panel-heading">
                Dados da Atividade Extraclasse 
                <a class="btn btn-success" href="{{route('atividades_edit',['id' => Request::segment(3)])}}" class="">
                    <span class="glyphicon glyphicon-pencil"></span></a>
                </div>
            <div class="panel-body">
                <p><b>Id da atividade:</b> {{$atv->id}}</p>
                <p><b>Descrição:</b> {{$atv->descricao_atv}}</p>
                <p><b>Codigo Totvs:</b> {{$atv->cod_totvs}}</p>
                <p><b>Usuário de criação:</b> {{$atv->user}}</p>
                <p><b>Dia da criação:</b> {{$atv->created_at}}</p>
                <p><b>Última alteração:</b> {{$atv->updated_at}}</p>
            </div>
        </div>
        <h3>Turmas cadastradas:</h3>
        <div class="table-responsive">          
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Turma</th>
                      <th></th>
                      <th></th>
                      <th></th>                      
                    </tr>
                  </thead>
                  <tbody>                     
        @forelse ($turmas as $i)  
        <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->descricao_turma}} </td>
        <td> <a href="{{route('turmas_show', ['id' => $i->id])}}" class="btn btn-primary"> <span class="glyphicon glyphicon-eye-open"></span></a></td>
            <td><a href="" class="btn btn-success"> <span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a href="" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span></a></td>            
        </tr>
        @empty                
            <div class="alert alert-danger">
                <p><strong>Ops!</strong> Nenhuma turma cadastrada.</p>
                <a href="{{route('turmas_create', ['id' => Request::segment(3)])}}" class="btn btn-primary btn-add"> 
                    <span class="glyphicon glyphicon-plus"></span> Adicionar Turma
                </a>                
            </div>
        @endforelse  
    </tbody>
</table>
</div>   
        
</div>
@endsection
