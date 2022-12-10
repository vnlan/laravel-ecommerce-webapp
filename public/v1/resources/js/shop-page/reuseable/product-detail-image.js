
$( document ).ready(function() {
    $('.product-gallery-item').on('click', function (e) {
        $('#product-zoom-gallery').find('a').removeClass('active');
        $(this).addClass('active');
        var newSrc = $(this).find('img').attr('src');
        $('#product-zoom').attr('src', newSrc);
        e.preventDefault();
    });

    
});


