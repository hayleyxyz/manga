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
            title: { pivot: { type: 'title' } }
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
            $scope.facets.push(addedFacet);
            $scope.addedFacets.push(addedFacet);

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

        $scope.uploadUrl = null;
        $scope.seriesId = null;

        $scope.$watch('files', function () {
            $scope.upload($scope.files);
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
                        console.log('error status: ' + status);
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

})(angular.module('app', [ 'ngFileUpload' ]));