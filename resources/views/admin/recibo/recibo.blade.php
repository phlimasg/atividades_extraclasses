<div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: justify">
    <div><h2 align="center"><u>RECIBO DE PAGAMENTO</u></h2></div>    
    Recebemos do (a) Responsável Financeiro <b>{{$aluno->RESPFIN}}</b> a
importância de <b>R$: {{number_format($a->valor, 2, ',', ' ')}}</b> referente à 1ª parcela da atividade extraclasse 
<b>"{{$a->descricao_atv}}"</b> para o aluno(a) <b>{{$aluno->NOME_ALUNO}}</b>.
<br><br>
<b>Turma:</b> {{$a->descricao_turma}}<br>
<b>Horário:</b> {{substr($a->hora_ini,0,5)}} - {{substr($a->hora_fim,0,5)}}<br>
{{$a->dia}}
<br><br><br><br><br>
<div align="center">
        ____________________________________________________ <br>
        Tesouraria - La Salle Abel<br><br><br><br>
</div>
<div align="right">    
    Pagamento efetuado no dia {{date('d/m/Y')}} <br>
    <img src="{{asset('img/logo_pb.png')}}" alt="" width="150px">
</div>
</div>
<hr>

