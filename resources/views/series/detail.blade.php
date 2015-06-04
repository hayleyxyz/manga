@extends('layouts.default')

@section('content')
    <div class="ui page grid">
        <div class="column">
            <div class="ui segment">
                <div class="ui grid">
                    <div class="five wide column">
                        <img src="https://manga.madokami.com/images/i212763.png" alt />
                    </div>
                    <div class="eleven wide column">
                        <h1 class="ui header">{{ $series->present()->titleWithYear }}</h1>

                        <h3 class="ui header">Alternative Titles</h3>
                        <div class="labels">
                            @foreach($series->present()->alternativeTitles as $title)
                                <div class="ui label">{{ $title }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop