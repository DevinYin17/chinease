$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = '/job/pic';
    $('.fileupload').fileupload({
        url: url,
        dataType: 'json',
        // limitMultiFileUploads: 1,
        // limitMultiFileUploadSize: 2000,
        done: function (e, data) {
            var id = $(this).data('id')
            $.each(data.result.files, function (index, file) {
                $('#' + id).val(file.url);
                var $img = $('#' + id).parent().find('img');
                if ($img[0]) {
                  $img.attr('src', file.url);
                } else {
                  $('#' + id).after('<img src="' + file.url + '"/>');
                }
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
