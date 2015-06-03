<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Madokami</title>

        <link href="{{{ URL::asset('vendor/semantic/semantic.css') }}}" rel="stylesheet">
        <link href="{{{ URL::asset('css/app.css') }}}" rel="stylesheet">
    </head>
    <body>
        <header id="masthead" class="ui main menu">
            <div class="ui page grid">
                <div class="column">
                    <h1 class="ui header">Madokami</h1>

                    @if(Auth::check())
                        <a href="{{{ url('/auth/logout') }}}">Logout</a>
                    @endif
                </div>
            </div>
        </header>

        @section('content')

        @show

        <script src="{{{ URL::asset('vendor/semantic/semantic.js') }}}"></script>
    </body>
</html>