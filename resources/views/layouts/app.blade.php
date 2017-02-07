<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @section('styles')
        @include('partials.slate')
    @show
    <!-- Scripts -->
    @section('scripts')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @show
</head>
<body>
    <div id="app">
        <div class="container">
            @section('top')
                <h4 align="center"> <strong>{{ date('l jS \of F Y h:i:s A') }}</strong> </h4>
            @show
        </div>
        
        @include('partials.nav')
        <div class="container">
            <div class="page-header clearfix" align="center">
                <h1>
                    @yield('header')

                </h1>
            </div>
        </div>
    
        <div class="container">
            <div class="row">
                @if (session('message'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="container">
            @yield('content')
        </div>
    
       
        
        <div class="container">
            @section('footer')
                <div class="row" align="center">
                    <a href="https://laravel.com/docs" target="_blank">Documentation &nbsp;</a>
                    <a href="https://laracasts.com" target="_blank">&nbsp; Laracasts &nbsp;</a>
                    <a href="https://laravel-news.com" target="_blank">&nbsp; News &nbsp;</a>
                    <a href="https://forge.laravel.com" target="_blank">&nbsp; Forge &nbsp;</a>
                    <a href="https://github.com/laravel/ laravel" target="_blank">&nbsp;GitHub</a>
                </div>
            @show
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
