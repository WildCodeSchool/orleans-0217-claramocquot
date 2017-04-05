
$(document).ready(function () {
    $('.thumbnailHome .captionHome').show();
    $('.thumbnailHome').hover(
        function () {
            $(this).find('.captionHome').fadeOut(250);
        },
        function () {
            $(this).find('.captionHome').fadeIn(250);
        }
    );
});