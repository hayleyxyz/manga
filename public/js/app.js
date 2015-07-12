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

})(angular.module('app', [ ]));