@extends('layouts.app')

@section('content')
<div class="container-fluid">    
    <div class="row">
        <div class="col-sm-10">
            <h3>Confirmação e pagamento</h3>                 
        </div>           
    </div>    
    <hr>
    @php($total = 0)
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Resumo das atividades
            </div>
                <div class="panel-body">
    @forelse ($atv as $a)        
            <div class="row">
                <div class="col-sm-4">
                    <b>{{$a->descricao_atv}}</b>
                </div>
                <!--<div class="col-sm-1">
                    <span class="glyphicon glyphicon-credit-card"></span>
                </div>-->
                <div class="col-sm-2">
                    <b>Turma:</b> {{$a->descricao_turma}}
                </div>
                <div class="col-sm-2">
                    <b>Valor: </b>{{number_format($a->valor, 2, ',', ' ')}}
                </div>
                <div class="col-sm-1">
                <a href="{{ route('insc_destroy', ['id'=>$a->id]) }}"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>        
        @php($total += $a->valor)        
    @empty
      Nenhuma atividade selecionada.  
    @endforelse
            </div>    
        </div>
    </div>
    <b>Em espera:</b> <br>
    @forelse ($espera as $item)    
        {{$item->descricao_atv}} <br>
        {{$item->descricao_turma}} - {{$item->dia}} <br>
    @empty
        Lista de espera vazia
    @endforelse
    <div class="row">
        <div class="col-sm-offset-9 col-sm-3">
            <h2><b>Total: </b>{{number_format($total, 2, ',', ' ')}}</h2>
        </div>
    </div>
    <br>
        <div class="row">
            <div class="col-sm-offset-9 col-sm-2">
                    <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#confirma"> Corfirmar pagamento</button>                         
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
                    <p>Deseja confirmar o pagamento? </p>
                    <p>Após confirmação, será gerado o recibo. </p>
                </div>
                <div class="modal-footer">
                        <a href="{{ route('insc_exibe_recibo', ['id'=>Request::segment(2)]) }}" class="btn btn-success" >Sim</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            
            </div>
        </div>
</div>
    
@endsection
