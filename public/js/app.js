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

        $scope.loadFacets = function(data) {
            data.every(function(row) {
                // Create array if this is the first of it's type
                if(!(row.pivot.type in $scope.facets)) {
                    $scope.facets[row.pivot.type] = [ ];
                }

                // Add
                $scope.facets[row.pivot.type].push(row);

                // Continue looping
                return true;
            });
        };

        $scope.removeFacet = function(facet) {
            console.log(facet);
        };

    });

})(angular.module('app', [ ]));