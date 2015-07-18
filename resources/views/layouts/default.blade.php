<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Madokami</title>

        <link href="{{ URL::asset('vendor/semantic/2.0.4/semantic.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body ng-app="app">

        <header id="header">
            <div class="ui page grid">
                <div class="column">
                    <div class="ui inverted main menu">
                        <a href="{{ url('/') }}" class="item">Madokami</a>

                        <div class="right menu">
                            @if(Auth::check())
                                <div class="ui dropdown link item">
                                    <span class="count">{{ Auth::user()->email }}</span>
                                    <div class="menu">
                                        <a class="item" href="{{ url('/auth/logout') }}">Logout</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        @section('content')

        @show

        <script src="{{ URL::asset('vendor/jquery/2.1.4/jquery.js') }}"></script>
        <script src="{{ URL::asset('vendor/semantic/2.0.4/semantic.js') }}"></script>
        <script src="{{ URL::asset('vendor/angular/1.4.3/angular.js') }}"></script>
        <script src="{{ URL::asset('vendor/ng-file-upload/5.0.9/ng-file-upload.js') }}"></script>
        <script src="{{ URL::asset('vendor/moment/2.10.3/moment.js') }}"></script>
        <script src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>