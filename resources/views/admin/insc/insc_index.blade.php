@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            <h1>Inscrever aluno</h1>
        </div>
    </div>    
    <hr>   
    <form action="" method="POST">
        @csrf  
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group">
                <input type="text" class="form-control" name="search" value="{{old('search')}}" placeholder="Procure pelo nome ou matrícula">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                        <i class="glyphicon glyphicon-search"></i> Procurar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    @if (!empty($t))
        @forelse ($t as $i)
        <div class="well well-lg">
                <div class="row">
                        <div class="col-sm-2">
                                {{$i->RA}}
                        </div>
                        <div class="col-sm-4">
                                {{$i->NOME_ALUNO}}
                        </div>
                        <div class="col-sm-4">
                            {{$i->RESPFIN}}
                        </div>
                        <div class="col-sm-2">
                        <a href="{{route('insc_show',['ra'=>$i->RA])}}" class="btn btn-primary">Inscrever</a>
                        </div>
                </div>
        </div>
        @empty
            <div class="alert alert-danger">
                <p><b>Desculpe...</b></p>
                Não localizamos nenhum aluno.
            </div>
        @endforelse
    @endif
    
</div>
@endsection
