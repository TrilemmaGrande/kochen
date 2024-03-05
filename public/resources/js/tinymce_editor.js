document.addEventListener('DOMContentLoaded', function () {
    tinymce.init({
        selector: 'textarea#preparationEditor',
        branding: false,
        menubar: false,
        help: false,
        paste_data_images: true,
        image_uploadtab: true,
        file_picker_types: 'image',
        plugins: [
            'advlist', 'autolink', 'lists', 'link','image', 'charmap', 'preview', 'anchor',
            'searchreplace', 'visualblocks', 'code ',
            'insertdatetime', 'media', 'table', 'autolink', 'code', 'wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic underline | forecolor backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist | outdent indent | image | ' +
            'table hr',
        content_style: 'body { font-family: Helvetica, Arial, sans-serif; font-size: 14px }',

        images_upload_handler: function (blobInfo, success, failure) {
       // TODO: Logic
        }
    });
});
