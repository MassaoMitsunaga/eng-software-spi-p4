@extends('base.base')

@section('content')

    <nav class="navbar navbar-expand-lg navbar-light navbar-main">
        <img src="{{secure_asset('img/logo.png')}}" class="logo-main"/>
        <h1 class="main-title">MechStore | Painel Administrador</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav orienta-navbar">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle welcome-user" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Olá, {{$user->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="global-wrapper">
        {{--    <header class="wrapper" >--}}
        {{--        <div class="header">--}}
        {{--            <h1>Teclados Mecânicos</h1>--}}
        {{--        </div>--}}
        {{--    </header>--}}

        <div class="conteudo card">

            <div class="header-wrapper">
                <div class="header">
                    <h1 class="list-title ">Produtos</h1>
                </div>
                <div class="add">
                    <div class="inner_add">
                        <a href="{{url('create')}}"><button>Novo Produto <em class="fas fa-plus-square"></em></button></a>
                    </div>
                </div>
            </div>

            <div class="table">
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Categoria</th>
                        <th class="descricao">Descrição</th>
                        <th>Estoque</th>
                        <th>Ação</th>
                    </tr>

                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->numero}}</td>
                            <td>{{$produto->marca}}</td>
                            <td>{{$produto->modelo}}</td>
                            <td>{{$produto->categoria}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{($produto->estoque == true) ? 'Sim' : 'Não'}}</td>
                            <td>
                                <a href="{{route('edit', $produto->id)}}"><i class="fas fa-edit edit"></i></a>
                                <a href="{{route('show', $produto->id)}}"><i class="fas fa-eye delete"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="paginador">
        {{$produtos->links("pagination::bootstrap-4")}}
    </div>

@endsection
