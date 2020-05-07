@extends('base/base')
@push('css')
    <link rel="stylesheet" href="{{secure_asset('assets/produto/css/create.css')}}">
@endpush
@section('content')
    <div class="create-edit-global-wrapper">
        <header>
            <h1 class="cadastro-produtos-title">Cadastro de Produtos</h1>
        </header>

        @if(isset($errors) && count($errors) > 0)
            <div class="erros">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <div class="cont">
            @if (isset($produtos->id))
                <form class="form" method="post" action="{{route('update', $produtos->id)}}">
                    {{ method_field('PUT') }}
                    @else
                        <form class="form" method="post" action="{{route('store')}}">
                            @endif
                            {{csrf_field()}}

                            <div>
                                <input class="form-interno" type="text" name="numero" placeholder="Código:" value="{{$produtos->numero}}">
                            </div>

                            <div >
                                <input class="form-interno" type="text" name="marca" placeholder="Marca:" value="{{$produtos->marca}}">
                            </div>

                            <div>
                                <input class="form-interno" type="text" name="modelo" placeholder="Modelo:" value="{{$produtos->modelo}}">
                            </div>

                            <div class="categoria-checkbox">
                                <div>
                                    <select name="categoria" class="categoria">
                                        <option  disabled selected>Categoria</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{$categoria}}" @if(isset($produtos) && $produtos->categoria == $categoria) selected @endif >{{$categoria}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="estoque-wrap">
                                    <div class="estoque">
                                        <label>Em estoque?</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="estoque" name="estoque" @if (isset($produtos) && $produtos->estoque == true) checked @endif>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <textarea class="form-interno" type="text" rows="3" name="descricao" placeholder="Descrição:">{{$produtos->descricao}}</textarea>
                            </div>

                            <div class="botoes-create-edit">
                                <div class="orienta-botao cancelar">
                                    <button type="button" class="botao-cancelar" onclick="window.location='{{ url("/") }}'">Cancelar</button>
                                </div>
                                <div class="orienta-botao enviar">
                                    <button class="botao">Enviar</button>
                                </div>
                            </div>

                        </form>
        </div>
    </div>
@endsection
