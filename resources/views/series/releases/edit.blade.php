@extends('layouts.default')

@section('content')
    <div class="ui page grid" ng-controller="ReleasesEdit" ng-init="uploadUrl = '{{ $series->present()->uploadReleaseUrl }}'; seriesId = {{ $series->id }};">
        <div class="column">
            @include('partials.messages')

            <div class="ui segment">
                <div class="ui grid">
                    <div class="sixteen wide column">
                        <h1 class="ui header">
                            Edit Releases
                            <div class="sub header">{{ $series->present()->titleWithYear }}</div>
                        </h1>

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
                                <tr ng-repeat="file in files">
                                    <td>@{{ file.name }}</td>
                                    <td>@{{ file.size | formatFileSize }}</td>
                                    <td>
                                        <div class="ui inverted progress" data-percent="@{{ file.progressPercentage }}" ng-class="{ success: (file.progressPercentage === 100) }">
                                            <div class="bar" style="transition-duration: 300ms; -webkit-transition-duration: 300ms;" ng-style="{ width: (file.progressPercentage + '%') }">
                                                <div class="progress">@{{ file.progressPercentage }}%</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="right aligned">
                                        <a href="#" class="ui primary button" ngf-select ng-model="files" ngf-multiple="true">
                                            <i class="upload icon"></i>
                                            Upload
                                        </a>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop