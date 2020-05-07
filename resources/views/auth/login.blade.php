@extends('layouts.app')

@section('content')
    <div class="my-login-page actual-content-container">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat" id="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <img src="{{secure_asset('img/logo.png')}}" class="logo-main"/>
                                    <li class="nav-item" >
                                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cadastrar-tab" data-toggle="tab" href="#cadastrar" role="tab" aria-controls="home" aria-selected="false">Cadastrar</a>
                                    </li>
                                </ul>
                                <span class="divisor"></span>


                                <div class="tab-content" id="myTabContent">

                                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                        <form method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}
                                            <div class="margin-bottom form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email">Endereço de E-mail</label>

                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    {{ $errors->first('email') }}
                                                     </span>
                                                @endif
                                            </div>

                                            <div class="margin-bottom form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password">Senha</label>
                                                <input id="password" type="password" class="form-control" name="password" required data-eye>
{{--                                                @if (Route::has('password.request'))--}}
{{--                                                    <a class="btn btn-link float-right" href="{{ route('password.request') }}">--}}
{{--                                                        {{ __('Esqueceu a senha?') }}--}}
{{--                                                    </a>--}}
{{--                                                @endif--}}
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                    {{ $errors->first('password') }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group margin-top-login">
                                                <button type="submit" class="btn botao-login btn-block">
                                                    Login
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="cadastrar" role="tabpanel" aria-labelledby="cadastrar-tab">
                                        @include('auth.register')
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div onselectstart="return false" class="footer" >
                            Desenvolvido por: Carlos Barbosa | Massao Mitsunaga | Cleyton Anderson
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </div>
@endsection
