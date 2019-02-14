<div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: justify">
    <div><h2 align="center"><u>RECIBO DE CANCELAMENTO</u></h2></div>  
    <br><br>
<b>Aluno:</b> {{$aluno->NOME_ALUNO}} <br>
   <b> Atividade cancelada: </b> {{$insc->descricao_atv}}<br>
<b>Turma:</b> {{$insc->descricao_turma}}<br>
    <b>Horário:</b> {{substr($insc->hora_ini,0,5)}} - {{substr($insc->hora_fim,0,5)}}<br>
<b>Dia:</b> {{$insc->dia}}
<br><br><br><br><br>
<div align="center">
        ____________________________________________________ <br>
        Tesouraria - La Salle Abel<br><br><br><br>
</div>
<div align="right">    
    Cancelamento efetuado no dia {{date('d/m/Y')}} <br>
    <img src="{{asset('img/logo_pb.png')}}" alt="" width="150px">
</div>
</div>
<hr>

