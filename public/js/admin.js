/**
 * Created by julien on 01/04/17.
 */
$(document).ready(function () {
    var editor = CKEDITOR.replace( 'editor', {
        height: 260,
    });
    CKFinder.setupCKEditor( editor );
});

