$(document).ready(function() {
    $('.description').hover(function() {
        var toolTip = $(this).attr('Tooltip');
        $('<span class="tooltip"></span>').text(toolTip)
            .appendTo('body')
            //.css('top', (event.pageY - 10) + 'px')
            //.css('left', (event.pageX + 20) + 'px')
            .fadeIn('slow');
    }, function() {
        $('.tooltip').remove();
    }).mousemove(function(event) {
        $('.tooltip')
        .css('top', (event.pageY - 10) + 'px')
        .css('left', (event.pageX + 20) + 'px');
    });
});

//Sourced by: http://www.jquerybyexample.net/2012/09/tutorial-for-creating-simple-stylized-tooltip-using-jquery.html