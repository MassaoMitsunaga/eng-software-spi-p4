@extends('base.base')
@push('css')
    <link rel="stylesheet" href="{{secure_asset('assets/produto/css/show.css')}}">
@endpush
@section('content')

    <div class="envolve">
        <h1 class="title">Deletar produto</h1>

        <div class="produto-delete">
            <div class="produto">
                <p>{{$produto->marca}} {{$produto->modelo}}</p>
            </div>

            <div class="botoes-delete-wrapper">
                <div class="deletar">
                    <form method="POST" action="{{route('destroy', $produto->id)}}">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <button id="botao">Confirmar</button>
                    </form>
                </div>
                <div class="cancelar-wrapper">
                    <button type="button" class="botao-cancelar" onclick="window.location='{{ url("/") }}'">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


@endsection
