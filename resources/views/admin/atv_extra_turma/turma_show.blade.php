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
        <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Inscritos <span class="badge">{{sizeof($insc)}}</span></a></li>
            <li><a data-toggle="tab" href="#menu1">Lista de espera <span class="badge">{{sizeof($espera)}}</span></a></li>
          </ul>
        
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-sm-4"><h3>Alunos Inscritos </h3></div>
                    <div class="col-sm-offset-6 col-sm-2">
                        <a href="{{ route('turmas_insc', ['id'=>Request::segment(4)]) }}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-tasks"></span> Lista de Inscritos
                        </a>                        
                    </div>
                </div>

                
                <div class="table-responsive">          
                        <table class="table">
                            <thead>
                            <tr>
                                <th>RA</th>
                                <th>Nome</th>
                                <th>Turma</th>
                                <th></th>                                 
                            </tr>
                            </thead>
                            <tbody>
                        @forelse ($insc as $i)
                        <tr>
                                <td>{{$i->RA}}</td>
                                <td><a href="#" data-toggle="modal" data-target="#{{$i->RA}}">{{$i->NOME_ALUNO}}</a></td>
                                <div id="{{$i->RA}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                      
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Dados do Aluno</h4>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                                              <div class="col-sm-6">
                                                  <p><b>Resp. Acad.:</b>{{$i->RESPACAD}}</p>
                                                  <p><b>Email:</b>{{$i->RESPACADEMAIL}}</p>
                                                  <p><b>Tel:</b>{{$i->RESPACADTEL1}} - {{$i->RESPACADTEL2}}</p>                                                  
                                                </div>
                                                  <div class="col-sm-6">
                                                        <p><b>Resp. Fin.:</b>{{$i->RESPFIN}}</p>
                                                        <p><b>Email:</b>{{$i->RESPFINEMAIL}}</p>
                                                        <p><b>Tel:</b>{{$i->RESPFINTEL1}} - {{$i->RESPFINCEL}}</p>  
                                                  </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                            </div>
                                          </div>
                                      
                                        </div>
                                      </div>
                                <td>{{$i->TURMA}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('turmas_troca', ['id'=>Request::segment(4),'ra'=>$i->RA]) }}" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> Trocar de turma</a>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('cancel_show', ['id'=>$i->RA]) }}">Cancelar</a></li>                                        
                                        </ul>
                                    </div>                                         
                                </td>                                 
                            </tr>
                        @empty
                            Ninguém inscrito
                        @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>
            <div id="menu1" class="tab-pane fade">
                    <div class="row">
                            <div class="col-sm-4"><h3>Lista de Espera </h3></div>
                            <div class="col-sm-offset-6 col-sm-2">
                                <a href="{{ route('turmas_espera', ['id'=>Request::segment(4)]) }}" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-save"></span> Lista de espera
                                </a>                        
                            </div>
                        </div>
              <div class="table-responsive">          
                    <table class="table">
                        <thead>
                        <tr>
                            <th>RA</th>
                            <th>Nome</th>
                            <th>Turma</th>                                 
                            <th></th> 
                        </tr>
                        </thead>
                        <tbody>
                    @forelse ($espera as $i)
                    <tr>
                            <td>{{$i->RA}}</td>
                            <td>{{$i->NOME_ALUNO}}</td>
                            <td>{{$i->TURMA}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Inscrever</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Remover</a></li>                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        Ninguém inscrito
                    @endforelse
                    </tbody>
                </table>
                </div>
            </div>              
            </div>            
          </div>
</div>   
        
</div>
@endsection
