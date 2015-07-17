$(document).ready(function() {

    /*
     * Dismiss Semantic UI messages
     */
    $('.message .close').on('click', function() {
        $(this).closest('.message').fadeOut();
    });

    /*
     * Semantic UI popups
     */
    $('.ui.simple-popup.button').popup();

    /*
     * Semantic UI dropdown
     */
    $('.ui.dropdown').dropdown();

});

/*
 * Angular magic happens here
 */
(function(module) {

    /*
     * Series edit
     */
    module.controller('SeriesEdit', function($scope) {

        $scope.facets = [ ];

        $scope.newFacet = {
            title: { pivot: { type: 'title' } },
            genre: { pivot: { type: 'genre' } }
        };

        $scope.addedFacets = [ ];
        $scope.removedFacets = [ ]

        $scope.removeFacet = function(facet) {
            if(facet.id) {
                // Remove facet that was already added before page load
                for(var i = 0; i < $scope.facets.length; i++) {
                    if($scope.facets[i].id === facet.id
                        && $scope.facets[i].pivot.type === facet.pivot.type) { // Same facet ID & facet

                        // Remove facet
                        $scope.facets.splice(i, 1);

                        // Update index after splice
                        i--;

                        // Record removal
                        $scope.removedFacets.push(facet);
                    }
                }
            }
            else {
                // Remove facet that was added after page load
                for(var i = 0; i < $scope.facets.length; i++) {
                    if($scope.facets[i].name === facet.name
                        && $scope.facets[i].pivot.type === facet.pivot.type) { //  Same facet name & type

                        // Remove facet
                        $scope.facets.splice(i, 1);

                        // Update index after splice
                        i--;
                    }
                }

                for(var i = 0; i < $scope.addedFacets.length; i++) {
                    if($scope.addedFacets[i].name === facet.name
                        && $scope.addedFacets[i].pivot.type === facet.pivot.type) {

                        // Remove added record
                        $scope.addedFacets.splice(i, 1);

                        // Update index after splice
                        i--;
                    }
                }
            }
        };

        $scope.addFacet = function(facet) {
            var addedFacet = angular.copy(facet);
            if(addedFacet.name.trim().length > 0) {
                $scope.facets.push(addedFacet);
                $scope.addedFacets.push(addedFacet);
            }

            facet.name = '';
        };

    });

    module.filter('facetType', function() {
        return function(items, type) {
            return items.filter(function(item) {
                return (item.pivot.type === type);
            });
        };
    });

    /*
     * Releases edit
     */
    module.controller('ReleasesEdit', function($scope, Upload) {

        $scope.releases = null;
        $scope.uploading = [ ];
        $scope.uploadUrl = null;
        $scope.seriesId = null;

        $scope.$watch('uploading', function () {
            $scope.upload($scope.uploading);
        });

        $scope.upload = function (files) {
            if (files && files.length) {
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];

                    file.progressPercentage = 0;

                    Upload.upload({
                        url: $scope.uploadUrl,
                        fields: { series: $scope.seriesId },
                        file: file
                    }).progress(function (evt) {
                        var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                        console.log('progress: ' + progressPercentage + '% ' + evt.config.file.name);

                        evt.config.file.progressPercentage = progressPercentage;
                    }).success(function (data, status, headers, config) {
                        console.log('file ' + config.file.name + 'uploaded. Response: ' + data);
                    }).error(function (data, status, headers, config) {
                        console.log('error status: ' + status, data, headers, config);
                    })
                }
            }
        };

    });

    module.filter('formatFileSize', function() {
        return function(size) {
            if(size == 0) {
                return '0';
            }

            var base = Math.log(size) / Math.log(1024);
            var suffixes = [ '', 'K', 'M', 'G', 'T' ];
            var suffix = suffixes[Math.floor(base)];
            return Math.round(Math.pow(1024, base - Math.floor(base))) + suffix;
        };
    });

    module.filter('formatTimeSpan', function() {
        return function(then, now /* = moment() */, useShort /* = false */) {
            if(!(then instanceof moment.fn.constructor)) {
                then = moment(then);
            }

            if(now === undefined || now === null) {
                now = moment();
            }

            if(useShort === undefined || useShort === null) {
                useShort = false;
            }

            var diff = moment.duration(now.diff(then));

            console.log(diff);

            if(diff.asDays() > 7) {
                /*
                 * More then 7 days have elapsed so just return full date
                 */
                return then.format('D/M/YYYY');
            }
            else {
                /*
                 * We'll return 1 of these formatted units, depending on how much time has passed
                 */
                var steps = {
                    'asDays': {
                        'long': [ '1 day ago', '{val} days ago' ],
                        'short': '{val}d'
                    },
                    'asHours': {
                        'long': [ '1 hour ago', '{val} hours ago' ],
                        'short': '{val}h'
                    },
                    'asMinutes': {
                        'long': [ '1 minute ago', '{val} minutes ago' ],
                        'short': '{val}m'
                    },
                    'asSeconds': {
                        'long': [ '1 second ago', '{val} seconds ago' ],
                        'short': '{val}s'
                    }
                };

                /*
                 * Start at the largest unit (days) and work down
                 */
                for(var step in steps) {
                    var messages = steps[step];

                    var duration = Math.floor(diff[step]());

                    /*
                     * If the unit has passed 1 (i.e 1 day) then return that
                     */
                    if(duration > 0) {
                        if (useShort) {
                            /*
                             * Short form
                             */
                            return messages['short'].replace('{val}', duration);
                        }

                        if (duration === 1) {
                            /*
                             * Long, non-plural
                             */
                            return messages['long'][0];
                        }
                        else {
                            /*
                             * Long, plural
                             */
                            return messages['long'][1].replace('{val}', duration);
                        }
                    }
                }
            }
        };
    });

})(angular.module('app', [ 'ngFileUpload' ]));
