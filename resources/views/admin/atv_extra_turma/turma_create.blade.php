@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10"><h1>Adicionar Turma</h1></div>
    <div class="col-sm-2"><a href="{{route('atividades_show', ['id' => Request::segment(4)])}}" class="btn btn-primary btn-add"> <span class="glyphicon glyphicon-arrow-left "></span> Voltar</a></div>
    </div>
    
    
    <hr>
    @if (Session::has('message'))
    <div class="alert alert-success">
        <b>Dados salvos!</b> <br>
        {{Session::get('message')}}                
    </div>  
    <br>       
    @endif
    <form action="{{route('turmas_store', ['id' => Request::segment(4)])}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="descricao_turma">Descrição da Turma:</label>
                    <input type="text" name="descricao_turma" autofocus class="form-control" value="{{old('descricao_turma')}}" placeholder="Ex: Turma A, Grupo A, Fraldinha I...">
                    @if ($errors->has('descricao_turma'))
                        <div class="alert alert-danger">
                            {{$errors->first('descricao_turma')}}
                        </div>
                    @endif                
                </div>
            </div>
            <div class="col-sm-2">
                <label for="">Horário de inicio</label>
                <input type="time" class="form-control" name="hora_ini" placeholder="Ex: 17:40" value="{{old('hora_ini')}}">
                @if ($errors->has('hora_ini'))
                    <div class="alert alert-danger">
                        {{$errors->first('hora_ini')}}
                    </div>
                @endif
            </div>
            <div class="col-sm-2">
                <label for="">Horário final</label>
                <input type="time" class="form-control" name="hora_fim" placeholder="Ex: 18:40" value="{{old('hora_fim')}}">
                @if ($errors->has('hora_fim'))
                    <div class="alert alert-danger">
                        {{$errors->first('hora_fim')}}
                    </div>
                @endif
            </div>
            <div class="col-sm-2">
                <label for="">Qtd. de Vagas</label>
                <input type="number" class="form-control" name="vagas" placeholder="Ex: 20" min="1" value="{{old('vagas')}}">
                @if ($errors->has('vagas'))
                    <div class="alert alert-danger">
                        {{$errors->first('vagas')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <label for="">Valor</label>
                <input type="text" class="form-control" name="valor" placeholder="Ex: 130,00" value="{{old('valor')}}">
                @if ($errors->has('valor'))
                    <div class="alert alert-danger">
                        {{$errors->first('valor')}}
                    </div>
                @endif
            </div>
        </div>
        <h3>Dias das Atividades</h3>
        <div class="row">
            <div class="col-sm-2">
                <label class="checkbox-inline">
                    <input type="checkbox" name="dias[]" value="Segunda-feira">Segunda-feira
                </label>
            </div>    
            <div class="col-sm-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="dias[]" value="Terça-feira">Terça-feira
                    </label>
                </div>
                <div class="col-sm-2">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="dias[]" value="Quarta-feira">Quarta-feira
                        </label>
                </div>
                <div class="col-sm-2">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="dias[]" value="Quinta-feira">Quinta-feira
                        </label>
                </div>
                <div class="col-sm-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="dias[]" value="Sexta-feira">Sexta-feira
                    </label>
                </div>
                <div class="col-sm-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="dias[]" value="Sábado">Sábado
                    </label>
                </div>
                @if ($errors->has('dias'))
                    <div class="alert alert-danger">
                        {{$errors->first('dias')}}
                    </div>
                @endif
        </div>    
        <div class="row">
            <div class="col-sm-12">
                <h3>Quais anos poderão se inscrever?</h3>
                @forelse ($turmas as $i)
                <div class="col-sm-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="turmas[]" value="{{$i->id}}">{{$i->descricao}}
                    </label>
                </div>
                @empty
                <h1>Nenhuma turma cadastrada.</h1>                    
                @endforelse
                @if ($errors->has('turmas'))
                    <div class="alert alert-danger">
                        {{$errors->first('turmas')}}
                    </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">            
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-floppy-disk"></span> Adicionar
                </button>        
            </div>
        </div>
    </form>
    
</div>
@endsection
