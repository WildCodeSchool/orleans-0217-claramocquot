/**
 * Created by julien on 01/04/17.
 */
$(document).ready(function () {
    $('#summernote').summernote({
        lang: 'fr-FR',
        fontNames: ['PT sans'],
        fontNamesIgnoreCheck: ['PT sans'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
            ['font', ['fontname', 'fontsize', 'height']],
            ['insert', ['picture', 'link', 'video', 'table']],
            ['hr', ['hr']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['do', ['undo', 'redo']]
        ],
        placeholder: 'Bonjour Clara ! Faites ici votre mise en page !',
        popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
            video: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
            link: [
                ['link', ['linkDialogShow', 'unlink']]
            ]
        }
    });

});

