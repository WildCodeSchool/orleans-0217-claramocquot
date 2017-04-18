/**
 * Created by julien on 01/04/17.
 */
$(document).ready(function () {
    var editor = CKEDITOR.replace('editor', {
        defaultlanguage: 'fr',
        extraPlugins: 'autogrow',
        font_names : 'PT sans/"PT sans"',
        autoGrow_minHeight: 400,
        autoGrow_bottomSpace: 50,
        autoGrow_onStartup: true,
        toolbarGroups: [
            {name: 'document', groups: ['mode', 'document', 'doctools']},
            {name: 'clipboard', groups: ['clipboard', 'undo']},
            {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
            {name: 'forms', groups: ['forms']},
            {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
            {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
            '/',
            {name: 'links', groups: ['links']},
            {name: 'insert', groups: ['insert']},
            {name: 'styles', groups: ['styles']},
            {name: 'colors', groups: ['colors']},
            {name: 'tools', groups: ['tools']},
            {name: 'others', groups: ['others']},
            {name: 'about', groups: ['about']}
        ],
        removeButtons: 'Source,Save,Preview,PasteText,PasteFromWord,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,BidiLtr,BidiRtl,Language,Anchor,Flash,PageBreak,Maximize,About',

    });
    CKFinder.setupCKEditor(editor);
});

