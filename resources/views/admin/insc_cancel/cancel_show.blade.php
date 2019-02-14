@extends('layouts.app')
@section('content')
<div class="container-fluid">    
        <div class="row">
            <div class="col-sm-10">
                <h3>Atividades inscritas para {{ucwords($aluno->NOME_ALUNO)}}</h3> 
                *Todas as atividades abaixo foram pagas.
            </div>           
        </div>    
    <hr>    
        @php($count = 0)
            @forelse ($atv as $i)       
                    @if ($i->atv_extra_id != $count)
                    <hr>    
                    <h3>{{$i->descricao_atv}}</h3>
                    @endif
                    <div class="well">
                        <div class="row" >
                            <div class="col-sm-2">
                                <span>{{$i->descricao_turma}}</span>
                            </div>
                            <div class="col-sm-5">
                                {{$i->dia}}
                            </div>
                            <div class="col-sm-1">
                                {{substr($i->hora_ini,0,5)}}
                            </div>
                            <div class="col-sm-1">
                                {{substr($i->hora_fim,0,5)}}
                            </div>                            
                            <div class="col-sm-1 ">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{$i->id}}"> Cancelar</button>
                            </div>
                        </div>                  

                    </div>
                    @php($count = $i->atv_extra_id)
                    <!-- Modal -->
            <div class="modal fade" id="{{$i->id}}" role="dialog">
                <div class="modal-dialog">                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Aviso! {{$i->descricao_atv}} - {{$i->descricao_turma}}</h4>
                        </div>
                        <div class="modal-body">
                            <p>Deseja confirmar o cancelamento  para a atividade de</p>
                            <b>{{$i->descricao_atv}} - {{$i->descricao_turma}}? </b>
                        </div>
                        <div class="modal-footer">
                        <a href="{{ route('cancel_confirma', ['mat'=> Request::segment(2), 'id' => $i->id]) }}" class="btn btn-success" >Sim</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="alert alert-danger">
                    <p><b>Desculpe...</b></p>      
                    Nenhuma atividade disponível para {{$aluno->NOME_ALUNO}}
                </div> 
            @endforelse
    </div>
@endsection
