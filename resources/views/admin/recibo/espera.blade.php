@extends('layouts.app')
@section('content')
<div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div style="background-color: gainsboro; padding: 15px">
        <u><h2>Lista de Espera - {{$atv->descricao_atv}}</h2></u>    
        <b>Turma:</b> {{$atv->descricao_turma}} <br>
        <b>Horário:</b> {{substr($atv->hora_ini,0,5)}} {{substr($atv->hora_fim,0,5)}} <br> 
        <b>Dia:</b> {{$atv->dia}}
    </div>
        <br>
    @forelse ($insc as $i)
    <br>
    <div style="">
        <div style="border: 1; border-top: none; border-left: none">
            - {{$i->NOME_ALUNO}}
        </div>        
        <table style="width: 100%; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                <tr>
                    <td style="width: 30%">
                        Matrícula: {{$i->RA}}                    
                    </td>
                    <td>
                        Resp.: {{$i->RESPACAD}}
                    </td>
                </tr>
                <tr>
                    <td>Turma: {{$i->TURMA}}</td>
                    <td>Email: {{$i->RESPACADEMAIL}}</td>
                </tr>
                <tr>
                    <td>Ano: {{$i->ANO}}</td>
                    <td>Telefones: {{$i->RESPACADTEL1}} {{$i->RESPACADTEL2}}</td>
                </tr>
                <tr>
                    <td>Turno: {{$i->TURNO_ALUNO}}</td>
                    <td></td>
                </tr>
              </table>
    </div>
    @empty
        Nenhum aluno inscrito
    @endforelse

</div>
@endsection