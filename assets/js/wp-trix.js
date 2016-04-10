jQuery(document).ready(function ($) {
    'use strict';

    $('.trix-dropdown-btn').on('click', function (e) {
        e.preventDefault();

        $(this).next().toggleClass('open');
    });

    // content dropdown
    $('[data-trix-content]').on('click', function (e) {
        e.preventDefault();

        var btn = $(this),
            content = btn.data('trix-content'),
            toolbarId = btn.parents('.trix-toolbar').attr('id'),
            trixEditor = $('trix-editor[toolbar="' + toolbarId + '"]').get(0).editor;

        // insert content into editor
        trixEditor.insertString(content);

        // hide dropdown
        $('.trix-dropdown-list.open').removeClass('open');
    });

    // image uploader
    $('.trix-image-uploader').on('click', function (e) {
        e.preventDefault();

        var toolbarId = $(this).parents('.trix-toolbar').attr('id'),
            trixEditor = $('trix-editor[toolbar="' + toolbarId + '"]').get(0).editor;

        var file_frame, image;

        file_frame = wp.media.frames.file_frame = wp.media({
            frame:    'post',
            state:    'insert',
            multiple: false
        });

        file_frame.on( 'insert', function(e) {
            image = file_frame.state().get( 'selection' ).first().toJSON();

            if ('image' === image.type) {

                var content = '<img src="' + image.url + '" alt="' + image.alt + '" title="' + image.title +'">'

                // trix.js 7073, insert image inside figure element
                // insert content into editor
                trixEditor.insertHTML(content);
            }
        });

        file_frame.open();

    });
});
