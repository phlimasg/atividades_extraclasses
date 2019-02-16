@extends('layouts.app')

@section('content')
<br>
<div class="container-fluid">    
    <div class="row">        
        <div class="col-sm-offset-10 col-sm-2">
            <a href="{{ route('insc_index') }}" class="btn btn-success">Nova Inscrição</a>            
        </div>
    </div>
    <hr>
    <iframe src="{{ route('insc_recibo', ['id'=>Request::segment(2)]) }}" frameborder="0" width="100%" height="1000px">

    </iframe>

</div>
    
@endsection
