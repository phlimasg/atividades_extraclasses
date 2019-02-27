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
</div>
@endsection
