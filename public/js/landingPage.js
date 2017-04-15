$(function() {

    $(document).on('click', '#title', function(event){
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
    });

    $(document).on('click', '#link', function(event){
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
    });

    function link() {
        var scroll = $(window).scrollTop();
            if (scroll <= 1050) {
                $('#link').addClass('hidden');
            } else {
                $('#link').removeClass('hidden');
            }

    }

    link();

    $(window).scroll(function () {
        link();
    });

    $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(300);
    });

    $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(300);
    });

});



