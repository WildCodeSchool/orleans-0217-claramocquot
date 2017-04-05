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

// JE N'ARRIVE PAS À INITIALISER LES THUMBNAILS AVEC LE FILTRE TITRE DÉJA PRÉSENT
// (C'est ce que Clara souhaite, come dit dans son second cahier des charges.)
//
// $(document).ready(function () {
//     $("[rel='tooltip']").tooltip();
//
//     $('.thumbnailHome').hover(
//         function () {
//             $(this).find('.captionHome').fadeOut(250)
//         },
//         function () {
//             $(this).find('.captionHome').fadeIn(250)
//         }
//     );
// });