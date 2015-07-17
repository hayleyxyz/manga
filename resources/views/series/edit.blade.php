@extends('layouts.default')

@section('content')
    <div class="ui page grid" ng-controller="SeriesEdit">
        <div class="column">
            @include('partials.messages')

            <div class="ui segment">
                <div class="ui grid">
                    <div class="five wide column">
                        <img src="https://manga.madokami.com/images/i212763.png" alt class="ui image"/>
                    </div>
                    <div class="eleven wide column">
                        <h1 class="ui header">
                            Edit Series
                            <div class="sub header">{{ $series->present()->titleWithYear }}</div>
                        </h1>


                        <div class="ui grid">
                            <form method="post" action="{{ $series->present()->saveUrl }}" class="ui form row"
                                  ng-init="facets = {{ $series->facets->toJson() }}" id="series-edit-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="hidden" name="removed_facets[]" ng-repeat="facet in removedFacets"
                                       ng-value="facet | json">

                                <input type="hidden" name="added_facets[]" ng-repeat="facet in addedFacets"
                                       ng-value="facet | json">

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
                            </form>

                            <div class="sixteen wide column">
                                <h3 class="ui header">Staff</h3>

                                <div class="labels">
                                    <div class="ui blue label" ng-repeat="staff in facets | facetType:'author'">
                                        @{{ staff.name }} (Author)
                                        <i class="delete icon" ng-click="removeFacet(staff)"></i>
                                    </div>

                                    <div class="ui blue label" ng-repeat="staff in facets | facetType:'artist'">
                                        @{{ staff.name }} (Artist)
                                        <i class="delete icon" ng-click="removeFacet(staff)"></i>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ URL::current() }}" method="post">
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
                            </form>

                            <div class="sixteen wide column">
                                <h3 class="ui header">Alternative Titles</h3>

                                <div class="labels">
                                    <div class="ui label" ng-repeat="title in facets | facetType:'title'">
                                        @{{ title.name }}
                                        <i class="delete icon" ng-click="removeFacet(title)"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="ten wide column">
                                <form class="ui form" ng-submit="addFacet(newFacet.title)">
                                    <div class="ui action input">
                                        <input type="text" placeholder="Add new title" ng-model="newFacet.title.name">

                                        <button class="ui button">Add</button>
                                    </div>
                                </form>
                            </div>

                            <div class="sixteen wide column">
                                <h3 class="ui header">Genres</h3>

                                <div class="labels">
                                    <div class="ui green label" ng-repeat="genre in facets | facetType:'genre'">
                                        @{{ genre.name }}
                                        <i class="delete icon" ng-click="removeFacet(genre)"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="ten wide column">
                                <form class="ui form" ng-submit="addFacet(newFacet.genre)">
                                    <div class="ui action input">
                                        <input type="text" placeholder="Add new genre" ng-model="newFacet.genre.name">

                                        <div class="ui button">Add</div>
                                    </div>
                                </form>
                            </div>

                            <div class="sixteen wide column">
                                <h3 class="ui header">Tags</h3>

                                <div class="labels">
                                    <div class="ui red label" ng-repeat="tag in facets | facetType:'tag'">
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
                                <button class="ui primary button" form="series-edit-form">
                                    <i class="save icon"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop