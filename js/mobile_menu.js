$(document).ready(function ($) {

    $(window).resize(function() {
        // This will fire each time the window is resized:
        if ($(window).width() >= 1030) {
            $('#nav').show();
        }else{
            $('#nav').hide();
        }
    }).resize();

    //toggle opening of menu
    $('#hamburger').click(function () {
        $('#nav').fadeToggle(500);
        $('#content').slideDown(500);
    });
});

