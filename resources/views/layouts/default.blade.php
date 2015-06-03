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
            </div>
        </div>
    </header>

    <div class="ui page grid">
        <div class="row">
            <div class="column">
                <div class="ui top attached segment">
                    <h2 class="ui header">Search</h2>
                </div>
                <div class="ui bottom attached segment">
                    <form method="get" action="" class="ui form">
                        <div class="ui action input">
                            <input type="text" placeholder="Search...">
                            <button class="ui icon button">
                                <i class="search icon"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <div class="ui two column doubling results-list grid">
                    @for($i = 0; $i < 10; $i++)
                        <div class="column">
                            <div class="ui item segment">
                                <div class="image">
                                    <a href="#">
                                        <img src="https://manga.madokami.com/images/i212763.png" alt class="ui image"/>
                                    </a>
                                </div>
                                <div class="content">
                                    <a class="ui header" href="#">Himouto! Umaru-chan [2013]</a>
                                    <p class="meta">
                                        <a href="#">Sankaku Head</a> / <a href="#">Anonymous</a>
                                    </p>

                                    <div class="labels minimised">
                                        <a class="ui green label" href="#">Comedy</a>
                                        <a class="ui green label" href="#">School Life</a>
                                        <a class="ui green label" href="#">Seinen</a>
                                        <a class="ui green label" href="#">Slice of Life</a>

                                        <a class="ui red label" href="#">Brother/s</a>
                                        <a class="ui red label" href="#">Chibi</a>
                                        <a class="ui red label" href="#">Childcare</a>
                                        <a class="ui red label" href="#">Closet Otaku</a>
                                        <a class="ui red label" href="#">Gag</a>
                                        <a class="ui red label" href="#">Popular Female Lead</a>
                                        <a class="ui red label" href="#">Secret Identity</a>
                                        <a class="ui red label" href="#">Short Chapter/s</a>
                                        <a class="ui red label" href="#">Siblings</a>
                                        <a class="ui red label" href="#">Sister/s</a>
                                    </div>

                                    {{--
                                    <div class="ui files list">
                                        <div class="item">
                                            <div title="Himouto! Umaru-chan - c102 [batoto].zip">
                                                <i class="upload icon"></i>
                                                <span class="time">(1m)</span>
                                                <a href="#">Himouto! Umaru-chan - c102 [batoto].zip</a>
                                            </div>

                                            <div title="Himouto! Umaru-chan Ch.101v002 Umaru and Lunchtime [KissManga].zip">
                                                <i class="upload icon"></i>
                                                <span class="time">(67d)</span>
                                                <a href="#">Himouto! Umaru-chan Ch.101v002 Umaru and Lunchtime [KissManga].zip</a>
                                            </div>

                                            <div title="Himouto! Umaru-chan - c101v4 [batoto].zip">
                                                <i class="upload icon"></i>
                                                <span class="time">(675d)</span>
                                                <a href="#">Himouto! Umaru-chan - c101v4 [batoto].zip</a>
                                            </div>
                                        </div>
                                    </div>
                                    --}}
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <script src="{{{ URL::asset('vendor/semantic/semantic.js') }}}"></script>
</body>
</html>