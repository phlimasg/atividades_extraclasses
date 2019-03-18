@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>
        Dashboard
    </h1> 
    @if (!empty($up))
        <div class="alert alert-danger">
            {{$up}}
        </div>       
    @endif
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
@endsection
