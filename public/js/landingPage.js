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
            if (scroll <= 900) {
                $('#link').addClass('hidden');
            } else {
                $('#link').removeClass('hidden');
            }

    }

    link();

    $(window).scroll(function () {
        link();
    });


});



