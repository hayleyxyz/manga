@extends('layouts.default')

@section('content')
    <div class="ui page grid" ng-controller="SeriesEdit">
        <div class="column">
            @include('partials.messages')

            <div class="ui segment">
                <div class="ui grid">
                    <div class="sixteen wide column">
                        <h1 class="ui header">
                            Edit Releases
                            <div class="sub header">{{ $series->present()->titleWithYear }}</div>
                        </h1>

                        <form method="post" action="{{ $series->present()->saveReleasesUrl }}" class="ui form"
                              ng-init="loadFacets({{ $series->facets->toJson() }})">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <table class="ui table">
                                <thead>
                                    <tr>
                                        <th>File</th>
                                        <th>Size</th>
                                        <th>Uploaded</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($series->releases as $release)
                                        <tr>
                                            <td>
                                                <a href="{{ $release->present()->downloadUrl }}">
                                                    {{ $release->name }}
                                                </a>
                                            </td>
                                            <td>{{ $release->present()->fileSize }}</td>
                                            <td>
                                                <time title="{{ $release->created_at }}"
                                                      datetime="{{ $release->created_at }}">{{ $release->present()->uploadedAt }}</time>
                                            </td>
                                            <td>
                                                <div class="ui red pointing dropdown link button">
                                                    <div class="text">Actions</div>
                                                    <i class="dropdown icon"></i>
                                                    <div class="menu">
                                                        <div class="item">Delete</div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop