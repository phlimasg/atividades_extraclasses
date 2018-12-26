@extends('layouts.app')

@section('content')
<div class="container-fluid">    
        <div class="row">
            <div class="col-sm-10">
                <h1>{{$turma->descricao_turma}} - Detalhes </h1> 
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
                <div class="row">
                        <div class="col-sm-6">
                                <p><b>Id da Turma:</b> {{$turma->id}}</p>
                                <p><b>Descrição:</b> {{$turma->descricao_turma}}</p>                
                                <p><b>Usuário de criação:</b> {{$turma->user}}</p>
                                <p><b>Dia da criação:</b> {{$turma->created_at}}</p>
                                <p><b>Última alteração:</b> {{$turma->updated_at}}</p>
                        </div>
                        <div class="col-sm-6">
                                <p><b>Dias:</b> {{$turma->dia}}</p>
                                <p><b>Hora de Início:</b> {{$turma->hora_ini}}</p>                
                                <p><b>Hora do fim:</b> {{$turma->hora_fim}}</p>
                                <p><b>Qtd. de vagas:</b> {{$turma->vagas}}</p>
                                <p><b>Valor:</b> R$ {{$turma->valor}}</p>
                        </div> 
                    </div>               
                <h3>Turmas autorizadas</h3>
                <div class="row">
                    @forelse ($turmas_aut as $i)
                        <div class="col-sm-2">
                            {{$i->descricao}}                        
                        </div>    
                    @empty
                        Nenhuma turma autorizada
                    @endforelse
                </div>                    
                
            </div>
        </div>        
    </tbody>
</table>
</div>   
        
</div>
@endsection
