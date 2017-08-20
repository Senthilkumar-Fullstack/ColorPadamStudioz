$(document).ready(function(){

    $('#home-slider').owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        lazyLoad: true,
        autoplay: true,
        animateOut: 'fadeOut',
    });

    $("#header-menu ul li a[href^='#']").on('click', function(e) {

       // prevent default anchor click behavior
       e.preventDefault();

       // store hash
       var hash = this.hash;

       // animate
       $('html, body').animate({
           scrollTop: $(hash).offset().top
         }, 300, function(){

           // when done, add hash to url
           // (default click behaviour)
           window.location.hash = hash;
         });

    });
       
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
});