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

});