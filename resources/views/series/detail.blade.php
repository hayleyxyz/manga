@extends('layouts.default')

@section('content')
    <div class="ui page grid">
        <div class="column">
            @include('partials.messages')

            <div class="ui segment">
                <div class="ui grid">
                    <div class="five wide column">
                        <img src="https://manga.madokami.com/images/i212763.png" alt/>
                    </div>
                    <div class="eleven wide column">
                        <h1 class="ui header">{{ $series->present()->titleWithYear }}</h1>

                        <h3 class="ui header">Staff</h3>

                        <div class="labels">
                            @foreach($series->present()->staff as $staff)
                                <div class="ui blue label">{{ $staff['name'] }} ({{ $staff['type'] }})</div>
                            @endforeach
                        </div>

                        <h3 class="ui header">Alternative Titles</h3>

                        <div class="labels">
                            @foreach($series->present()->alternativeTitles as $title)
                                <div class="ui label">{{ $title }}</div>
                            @endforeach
                        </div>

                        <h3 class="ui header">Genre</h3>

                        <div class="labels">
                            @foreach($series->present()->genres as $genre)
                                <div class="ui green label">{{ $genre }}</div>
                            @endforeach
                        </div>

                        <h3 class="ui header">Tags</h3>

                        <div class="labels">
                            @foreach($series->present()->tags as $tag)
                                <div class="ui red label">{{ $tag }}</div>
                            @endforeach
                        </div>

                        <div class="ui divider"></div>

                        <div>
                            @if(Auth::check())
                                @if($userIsWatchingSeries)
                                    <form method="post" action="{{ $series->present()->unwatchUrl() }}" class="ui inline form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="ui red button">
                                            <i class="alarm slash outline icon"></i>
                                            Watch
                                        </button>
                                    </form>
                                @else
                                    <form method="post" action="{{ $series->present()->watchUrl() }}" class="ui inline form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="ui green button">
                                            <i class="alarm outline icon"></i>
                                            Watch
                                        </button>
                                    </form>
                                @endif
                            @endif

                            <a href="{{ $series->present()->editUrl }}" class="ui primary button">
                                <i class="edit icon"></i>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="ui top attached header">
                Releases
            </h2>
            <div class="ui attached segment">
                <table class="ui table">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop