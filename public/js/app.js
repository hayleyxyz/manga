$(document).ready(function() {

    /*
     * Dismiss Semantic UI messages
     */
    $('.message .close').on('click', function() {
        $(this).closest('.message').fadeOut();
    });

});