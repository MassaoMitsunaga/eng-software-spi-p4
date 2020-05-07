@extends('layouts.app')
<form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div class="margin-bottom form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="email">Nome</label>

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="margin-bottom form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Endereço de E-mail</label>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="margin-bottom form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Senha</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" data-eye>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="margin-bottom form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password-confirm">Confirmar Senha</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" data-eye>
    </div>

    <div class="form-group margin-top-login">
        <button type="submit" class="btn botao-login btn-block">
            {{ __('Cadastrar') }}
        </button>
    </div>
</form>
