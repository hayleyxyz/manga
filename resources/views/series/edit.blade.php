@extends('layouts.default')

@section('content')
    <div class="ui page grid" ng-controller="SeriesEdit">
        <div class="column">
            @include('partials.messages')

            <div class="ui segment">
                <div class="ui grid">
                    <div class="five wide column">
                        <img src="https://manga.madokami.com/images/i212763.png" alt class="ui image" />
                    </div>
                    <div class="eleven wide column">
                        <h1 class="ui header">Edit series: {{ $series->present()->titleWithYear }}</h1>

                        <form method="post" action="{{ route('series.save') }}" class="ui form" ng-init="loadFacets({{ $series->facets->toJson() }})">
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
                                    <h3 class="ui header">Staff</h3>

                                    <div class="labels">
                                        <div class="ui blue label" ng-repeat="staff in facets.author">
                                            @{{ staff.name }} (Author)
                                            <i class="delete icon" ng-click="removeFacet(staff)"></i>
                                        </div>

                                        <div class="ui blue label" ng-repeat="staff in facets.artist">
                                            @{{ staff.name }} (Artist)
                                            <i class="delete icon" ng-click="removeFacet(staff)"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="ten wide column">
                                    <div class="ui right labeled input">
                                        <input type="text" placeholder="Add new staff">
                                        <div class="ui dropdown label">
                                            <div class="text">Author &amp; Artist</div>
                                            <i class="dropdown icon"></i>
                                            <div class="menu">
                                                <div class="item">Author &amp; Artist</div>
                                                <div class="item">Author</div>
                                                <div class="item">Artist</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="three wide column">
                                    <div class="ui button">Add</div>
                                </div>

                                <div class="sixteen wide column">
                                    <h3 class="ui header">Alternative Titles</h3>

                                    <div class="labels">
                                        <div class="ui label" ng-repeat="title in facets.title">
                                            @{{ title.name }}
                                            <i class="delete icon" ng-click="removeFacet(title)"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="ten wide column">
                                    <div class="ui action input">
                                        <input type="text" placeholder="Add new title">
                                        <div class="ui button">Add</div>
                                    </div>
                                </div>

                                <div class="sixteen wide column">
                                    <h3 class="ui header">Genres</h3>

                                    <div class="labels">
                                        <div class="ui green label" ng-repeat="genre in facets.genre">
                                            @{{ genre.name }}
                                            <i class="delete icon" ng-click="removeFacet(genre)"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="ten wide column">
                                    <div class="ui action input">
                                        <input type="text" placeholder="Add new genre">
                                        <div class="ui button">Add</div>
                                    </div>
                                </div>

                                <div class="sixteen wide column">
                                    <h3 class="ui header">Tags</h3>

                                    <div class="labels">
                                        <div class="ui red label" ng-repeat="tag in facets.tag">
                                            @{{ tag.name }}
                                            <i class="delete icon" ng-click="removeFacet(tag)"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="ten wide column">
                                    <div class="ui action input">
                                        <input type="text" placeholder="Add new tag">
                                        <div class="ui button">Add</div>
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