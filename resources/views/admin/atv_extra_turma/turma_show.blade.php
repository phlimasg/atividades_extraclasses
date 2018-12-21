@extends('layouts.app')

@section('content')
<div class="container-fluid">    
        <div class="row">
            <div class="col-sm-10">
                <h1>{{$turma->descricao_turma}} - Detalhes </h1> 
            </div>
            <div class="col-sm-2">            
                <a href="{{route('horarios_create', ['id' => Request::segment(4)])}}" class="btn btn-primary btn-add btn-pisca"> <span class="glyphicon glyphicon-plus"></span> Adicionar Horário</a>                
            </div>
        </div>    
    <hr> 
        <div class="panel panel-primary">
            <div class="panel-heading">
                Dados da Turma 
                <a class="btn btn-success" href="{{route('turmas_edit',['id' => Request::segment(4)])}}" class="">
                    <span class="glyphicon glyphicon-pencil"></span></a>
                </div>
            <div class="panel-body">
                <p><b>Id da Turma:</b> {{$turma->id}}</p>
                <p><b>Descrição:</b> {{$turma->descricao_turma}}</p>                
                <p><b>Usuário de criação:</b> {{$turma->user}}</p>
                <p><b>Dia da criação:</b> {{$turma->created_at}}</p>
                <p><b>Última alteração:</b> {{$turma->updated_at}}</p>
            </div>
        </div>
        <h3>Horários cadastrados:</h3>
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
        @forelse ($horarios as $i)  
        <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->descricao_turma}} </td>
            <td> <a href="" class="btn btn-primary"> <span class="glyphicon glyphicon-eye-open"></span></a></td>
            <td><a href="" class="btn btn-success"> <span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a href="" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span></a></td>            
        </tr>
        @empty                
            <div class="alert alert-danger">
                <p><strong>Ops!</strong> Nenhum horário cadastrado.</p>
                <a href="{{route('turmas_create', ['id' => Request::segment(4)])}}" class="btn btn-primary btn-add"> 
                    <span class="glyphicon glyphicon-plus"></span> Adicionar Horário
                </a>                
            </div>
        @endforelse  
    </tbody>
</table>
</div>   
        
</div>
@endsection
