@extends('layouts.app')
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript"> 
  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawBarColors);
  function drawBarColors() {
    var data = google.visualization.arrayToDataTable([      
      ['Atividades',''],
      @foreach($grafico as $g)
        ['{{$g->descricao_atv}}', {{$g->insc}}],
      @endforeach        
    ]);
    var options = {
      title: 'Inscrições - Atividades Extraclasse',
      chartArea: {width: '50%'},
      colors: ['#193c72'],
      hAxis: {
        title: 'Total das inscrições',
        minValue: 0
      },
      vAxis: {
        title: 'Atividades'
      }
    };
    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>
<div class="container-fluid"> 
  <br>
    @if (!empty($up))
        <div class="alert alert-danger">
            {{$up}}
        </div>       
    @endif
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Resumo</a></li>
      <li><a data-toggle="tab" href="#menu1">Últimos Inscritos</a></li>
      <li><a data-toggle="tab" href="#menu2">Cancelamentos</a></li>
      <li><a data-toggle="tab" href="#menu3">Trocas</a></li>
    </ul>
    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="row">
          <div id="chart_div" class="col-sm-8" style="height: 100vh"></div>
          <div class="col-sm-4">
              <div class="table-responsive">          
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Atividade</th>
                        <th>Inscritos</th>                   
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($grafico as $g)
                        <tr>
                        <td> <a href="{{ route('atividades_show', ['id'=>$g->id]) }}">{{$g->descricao_atv}}</a></td>
                          <td>{{$g->insc}}</td>
                        </tr>
                        @endforeach                      
                    </tbody>
                  </table>
          </div>
        </div>
    </div>
      </div>
      <div id="menu1" class="tab-pane fade">
          <div class="table-responsive">          
              <table class="table">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Atividade</th>
                    <th>Turma</th>
                    <th>Data</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($inscritos as $i)
                    <tr>
                    <td> {{$i->NOME_ALUNO}}</td>
                    <td> {{$i->descricao_atv}}</td>
                    <td> <a href="{{ route('turmas_show', ['id'=>$i->id]) }}"> {{$i->descricao_turma}}</a></td>
                    <td> {{$i->created_at}}</td>
                    </tr>
                    @empty
                    <h3>Nada para listar</h3>
                    @endforelse                                      
                </tbody>
              </table>
          </div>
      </div>
      <div id="menu2" class="tab-pane fade">
          <div class="table-responsive">          
              <table class="table">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Atividade</th>
                    <th>Turma</th>
                    <th>Data</th>
                    <th>Usuário</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($cancel as $i)
                    <tr>
                    <td> {{$i->NOME_ALUNO}}</td>
                    <td> {{$i->descricao_atv}}</td>
                    <td> {{$i->descricao_turma}}</td>
                    <td> {{$i->created_at}}</td>
                    <td> {{$i->user}}</td>
                    </tr>
                    @empty
                    <h3>Nada para listar</h3>
                    @endforelse                                      
                </tbody>
              </table>
          </div>
      </div>
    </div>
@endsection
