@extends('layouts.app')

@section('content')
<div class="container-fluid">    
        <div class="row">
            <div class="col-sm-10">
                <h3>Atividades disponíveis para {{ucwords($aluno->NOME_ALUNO)}}</h3> 
            </div>           
        </div>    
    <hr>
    <form action="{{ route('insc_store', ['ra' => Request::segment(2)]) }}" method="POST">    
        @csrf    
        @php($count = 0)
            @forelse ($atv as $i)       
                    @if ($i->atv_extra_id != $count)
                    <hr>    
                    <h3>{{$i->descricao_atv}}</h3>
                    @endif
                    <div class="row" style="background-color: lightgrey; border-bottom: 1px solid white">
                        <div class="col-sm-2">
                            <label class="checkbox-inline"><input type="checkbox" name="atv[]" value="{{$i->id}}">{{$i->descricao_turma}}</label>
                        </div>
                        <div class="col-sm-6">
                            {{$i->dia}}
                        </div>
                        <div class="col-sm-1">
                            {{substr($i->hora_ini,0,5)}}
                        </div>
                        <div class="col-sm-1">
                            {{substr($i->hora_fim,0,5)}}
                        </div>
                        <div class="col-sm-1">
                            {{$i->valor}}
                        </div>
                    </div>                  
                    @php($count = $i->atv_extra_id)
            @empty
                <div class="alert alert-danger">
                    <p><b>Desculpe...</b></p>      
                    Nenhuma atividade disponível para {{$aluno->NOME_ALUNO}}
                </div> 
            @endforelse
            @if($count != 0)
            <br />
            <div class="row">
                <div class="col-sm-offset-9 col-sm-2">
                        <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#confirma"> Realizar inscrição</button>                         
                </div>

            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="confirma" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Aviso</h4>
                    </div>
                    <div class="modal-body">
                        <p>Deseja confirmar a inscrição do aluno(a) {{$aluno->NOME_ALUNO}}? </p>
                    </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-success" >Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
                
                </div>
            </div>
            @endif
    </form> 
</div>
@endsection
