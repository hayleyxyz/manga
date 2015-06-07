@extends('layouts.default')

@section('content')
    <div class="ui page grid">
        <div class="column">
            @include('partials.messages')

            <div class="ui segment">
                <div class="ui grid">
                    <div class="five wide column">
                        <img src="https://manga.madokami.com/images/i212763.png" alt class="ui image" />
                    </div>
                    <div class="eleven wide column">
                        <h1 class="ui header">Edit series: {{ $series->present()->titleWithYear }}</h1>

                        <form method="post" action="{{ route('series.save') }}" class="ui form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $series->id }}">

                            <div class="ui grid">
                                <div class="twelve wide column">
                                    <div class="field">
                                        <label>Title</label>
                                        <input type="text" name="series[title]" value="{{ $series->title }}">
                                    </div>
                                </div>
                                <div class="four wide column">
                                    <div class="field">
                                        <label>Year</label>
                                        <input type="tel" name="series[year]" value="{{ $series->year }}">
                                    </div>
                                </div>
                                <div class="sixteen wide column">
                                    <button class="ui primary button">
                                        <i class="save icon"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop