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
            if (scroll <= 950) {
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

    $('.thumbnailHome .captionHome').show();
    $('.thumbnailHome').hover(
        function () {
            $(this).find('.captionHome').fadeOut(300);
            $(this).find('.captionHome2').fadeIn(300);
        },
        function () {
            $(this).find('.captionHome').fadeIn(300);
            $(this).find('.captionHome2').fadeOut(300);

        }
    );

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

});



