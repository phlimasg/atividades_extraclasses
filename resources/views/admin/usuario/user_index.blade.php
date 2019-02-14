@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            <h1>Usuários</h1>
        </div>
    </div>    
    <hr>   
    <form action="" method="POST">
        <h3>Adicionar usuário</h3>
        @csrf  
        <div class="row">
            <div class="col-sm-2">
                <label for="name">Nome</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>
            <div class="col-sm-4">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control">
            </div>
            <div class="col-sm-2">
                <label for="email">Perfil</label>
                <select name="profile" id="" class="form-control">
                    <option value=""></option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuário</option>
                </select>
            </div>
            <div class="col-sm-1">   
                <br>
                <button type="submit" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-plus"></span> Adicionar</button>
            </div>            
        </div>
        @if(Session::has('message'))
        <br>
        <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('message')}}
              </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3>Usuários Cadastrados</h3>
        @forelse ($user as $u)
        <hr>
        <div class="row">
            <div class="col-sm-3">
                {{$u->name}}
            </div>
            <div class="col-sm-3">
                {{$u->email}}
            </div>
            <div class="col-sm-3">
                {{$u->profile}}
            </div>
            <div class="col-sm-1">
            <a href="" data-toggle="modal" data-target="#{{$u->id}}" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span></a>
            </div>            
        </div>        
        <!-- Modal -->
<div id="{{$u->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Excluir usuário?</h4>
            </div>
            <div class="modal-body">
              <p>Confirma a exclusão do acesso de {{$u->name}}</p>
            </div>
            <div class="modal-footer">
                <a href="{{route('user_destroy', ['id' => $u->id])}}" class="btn btn-success">Sim</a>
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
            </div>
          </div>
      
        </div>
      </div>
        @empty
            Nenhum usuário cadastrado.
        @endforelse
    </form>
    <hr>
    
       
        
    
    
</div>
@endsection
