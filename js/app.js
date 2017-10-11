$ = jQuery.noConflict();

$(document).foundation();

$(document).ready(function(){

    var options = {
        animInFromLeft : 'fade-in',
        animInFromRight : 'fade-in',
        animOutToLeft : 'fade-out',
        animOutToRight : 'fade-out'
    };

    var element = $('.orbit');

    var slider = new Foundation.Orbit(element, options);

});