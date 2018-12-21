@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (!empty($message))
    <h2>ERRO!</h2>
    <hr>
    Oi {{Auth::user()->name}}, <br>
    Peço desculpas pelo o incoveniente e por favor, <b>informe o erro abaixo ao administrador do sistema</b>.
    <br><br>
    <div class="alert alert-danger">
        <code>
            {{$message}}
        </code>
    </div>
    
    <iframe src="https://giphy.com/embed/9Y5BbDSkSTiY8" width="350" frameBorder="0" class="disable" style="margin-left: -65px"></iframe>
    @else
    <h1>
        Página não encontrada...
    </h1>
    @endif
    
</div>
@endsection