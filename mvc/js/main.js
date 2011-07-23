/**
 * Sets styles for an element.
 * Fixes opacity in IE6-8.
 */
JA.css = function(element, styles){
    if (styles.opacity != null){
        if (typeof element.style.opacity != 'string' && typeof(element.filters) != 'undefined'){
            styles.filter = 'alpha(opacity=' + Math.round(100 * styles.opacity) + ')';
        }
    }
    $.extend(element.style, styles);
};


//////////////////////////////////////////////////////////////////////////////////////////////
// i18n

JA.t = function(key) {
    if (JA.i18n[key]) {
        return JA.i18n[key];
    }
    if (typeof JA.i18n_missing == 'undefined') {
        JA.i18n_missing = [];
    }
    JA.i18n_missing[JA.i18n_missing.length] = key
    return key
}


////////////////////////////////////////////////////////////////////////////////
// Initialization, tie everything together

$(document).ready(function() {
    ////////////////////////////////////////////////////////////////////////////////
    // Confirm deletion

    var buttonz = {}
    buttonz[JA.t('button_delete_submission')] = function() {
        window.location.href = $('.delete_link a').attr('href');
    };
    buttonz[JA.t('button_cancel')] = function() {
        $('#delete_dialog').dialog('close');
    }
    JA.buttons = buttonz;
    $('#delete_dialog').dialog(
        {
            autoOpen: false,
            width: 400,
            modal: true,
            resizable: false,
            buttons: buttonz
        }
    );

    $('.delete_link a').click(function(e) {
        $('#delete_dialog').dialog('open');
        e.preventDefault();
    })


    ////////////////////////////////////////////////////////////////////////////////
    // Do a form submit when changing language, so the filled in values are kept

    $('.testimonial-form .languagebar a').click(function(e) {
        $('#testimonial-form')
            .attr('action', $(this).attr('href'))
            .append('<input type="hidden" name="passthru" value="1" />');
        $('input[type="submit"]').click();
        e.preventDefault();
    })


    ////////////////////////////////////////////////////////////////////////////////
    // Initialize image uploader

    var el = document.getElementById('file-uploader');

    var uploader = new qq.FileUploader({
        element: document.getElementById('file-uploader'),
        action: '/testimonial/uploadImage',
        debug: true
    });

    var el2 = document.getElementById('file-uploader');

});



