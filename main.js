$(document).ready(function(){

    $('#Galeri').owlcarousel({
        loop: true,
        nav: true,
        items: 3,
        dots: false,
        margin: 10,
        navText: [
            '<i class="fas fa-angle-left" aria-hidden="true"><i>',
            '<i class="fas fa-angle-right" aria-hidden="true"><i>'
        ],
        navContainer: '#slider-tools-1',

    });
});