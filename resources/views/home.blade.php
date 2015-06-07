@extends('layouts.default')

@section('content')
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
                    @foreach($seriesResults as $series)
                        <div class="column">
                            <div class="ui item segment">
                                <div class="image">
                                    <a href="{{ $series->present()->url }}">
                                        <img src="https://manga.madokami.com/images/i212763.png" alt
                                             class="ui image"/>
                                    </a>
                                </div>
                                <div class="content">
                                    <a class="ui header" href="{{ $series->present()->url }}">{{ $series->present()->titleWithYear }}</a>

                                    <p class="meta">
                                        @foreach($series->present()->groupedStaff as $staff)
                                            <a href="#">{{ $staff }}</a>
                                        @endforeach
                                    </p>

                                    <div class="labels minimised">
                                        @foreach($series->present()->genres as $genre)
                                            <a href="#" class="ui green label">{{ $genre }}</a>
                                        @endforeach

                                            @foreach($series->present()->tags as $tag)
                                                <a href="#" class="ui red label">{{ $tag }}</a>
                                            @endforeach
                                    </div>

                                    <div class="ui files list">
                                        <div class="item">
                                            @foreach($series->releases as $release)
                                                <div title="{{ $release->name }}">
                                                    <i class="upload icon"></i>
                                                    <span class="time">(1m)</span>
                                                    <a href="{{ $release->present()->downloadUrl }}">Himouto! Umaru-chan - c102 [batoto].zip</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {!! $seriesResults->render() !!}
            </div>
        </div>
    </div>
@stop