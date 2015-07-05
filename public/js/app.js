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
                for(var i = 0; i < $scope.facets.length; i++) {
                    if($scope.facets[i].id === facet.id
                        && $scope.facets[i].pivot.type === facet.pivot.type) {
                        $scope.facets.splice(i, 1);
                        $scope.removedFacets.push(facet);
                        i--;
                    }
                }
            }
            else {
                console.log(facet);
            }
        };

        $scope.addFacet = function(facet) {
            var addedFacet = angular.copy(facet);
            $scope.facets.push(addedFacet);

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