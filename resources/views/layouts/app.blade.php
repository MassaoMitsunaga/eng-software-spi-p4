<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Projeto Eng de Software</title>

    <!-- Styles -->
    <link href="{{ secure_asset('particles-js/particles-style.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/auth.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<div id="app">
    <div id="particles-js">
        @yield('content')
    </div>
</div>

{{--    <!-- Scripts -->--}}
{{--    --}}{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{secure_asset('js/auth/my-login.js') }}"></script>
<script src="{{secure_asset('js/auth/auth.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{secure_asset('js/jquery.min.js')}}"></script>
<script src="{{secure_asset('particles-js/particles.js')}}"></script>
<script src="{{secure_asset('particles-js/particles-custom.js')}}"></script>

<script>
    particlesJS.load('particles-js','particles-js/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>

</body>
</html>
