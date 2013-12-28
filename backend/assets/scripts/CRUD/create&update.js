$(window).load(function () {
    $('textarea').each(function () {
        $("#" + $(this).attr('id')).ckeditor({
            filebrowserBrowseUrl: baseUrl + '/assets/kcfinder/browse.php?type=files',
            filebrowserImageBrowseUrl: baseUrl + '/assets/kcfinder/browse.php?type=images',
            filebrowserFlashBrowseUrl: baseUrl + '/assets/kcfinder/browse.php?type=flash',
            filebrowserUploadUrl: baseUrl + '/assets/kcfinder/upload.php?type=files',
            filebrowserImageUploadUrl: baseUrl + '/assets/kcfinder/upload.php?type=images',
            filebrowserFlashUploadUrl: baseUrl + '/assets/kcfinder/upload.php?type=flash'

        });
    });

});


jQuery(document).ready(function () {
    App.init();
    $(".create").click(function (e) {
        e.preventDefault();
        OpenInNewTab($(this).data("href"));
        return false;
    })
});

