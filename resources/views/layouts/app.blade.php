<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid menu-collapse">
        <div class="row">
            <div class="col-sm-2"> 
                    <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                              <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span> 
                                </button>
                                <a class="navbar-brand" href="#">{{env('app_name')}}</a>
                              </div>
                              <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav nav-pills nav-stacked">
                                  <li><a href="/home"> <span class="glyphicon glyphicon-home"></span> Dashboard</a></li> 
                                  <li role="presentation" class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                           <span class="glyphicon glyphicon-flag"></span> Inscrições <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <a href="{{route('insc_index')}}">
                                                <div class="submenu">
                                                    <span class="glyphicon glyphicon-plus"></span> Inscrever Aluno
                                                </div>                                                
                                            </a>  
                                            <a href="">
                                                <div class="submenu">
                                                    <span class="glyphicon glyphicon-remove"></span> Cancelar Inscrição
                                                </div>                                                
                                            </a>
                                        </ul>                                        
                                    </li>                                        
                                  <li role="presentation" class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                           <span class="glyphicon glyphicon-tag"></span> Atividades <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <a href="{{route('atividades')}}">
                                                <div class="submenu">
                                                    <span class="glyphicon glyphicon-list-alt"></span> Listar
                                                </div>                                                
                                            </a>  
                                            <a href="{{route('atividades_create')}}">
                                                <div class="submenu">
                                                    <span class="glyphicon glyphicon-plus"></span> Adicionar
                                                </div>                                                
                                            </a>  
                                            <a href="">
                                                <div class="submenu">
                                                    <span class="glyphicon glyphicon-pencil"></span> Editar
                                                </div>
                                            </a>
                                            <a href="">
                                                    <div class="submenu">
                                                        <span class="glyphicon glyphicon-remove"></span> Excluir
                                                    </div>
                                                </a>
                                        </ul>                                        
                                    </li>                                 
                                    <li><a href="{{ route('user_index')}}"> <span class="glyphicon glyphicon-user"></span> Usuários</a></li>                                     
                                </ul>
                                <ul class="nav nav-pills nav-stacked navbar-inverse bottom">                                  
                                  <li><a href="#"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                                  <li class="text-center"><img src="{{asset('img/logo.png')}}" alt="" width="80%"></li>
                                </ul>
                              </div>
                            </div>
                          </nav>
            </div>
            <div class="col-sm-10">            
                @yield('content')
            </div>
        </div>
    </div>    
</body>
</html>
