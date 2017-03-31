$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();

    $('.thumbnailHome').hover(
        function(){
            $(this).find('.captionHome').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.captionHome').slideUp(250); //.fadeOut(205)
        }
    );
});