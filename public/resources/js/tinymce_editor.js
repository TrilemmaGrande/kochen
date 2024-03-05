document.addEventListener('DOMContentLoaded', function () {
    tinymce.init({
        selector: 'textarea#preparationEditor',
        branding: false,
        menubar: false,
        help: false,
        paste_data_images: true,
        image_uploadtab: true,
        file_picker_types: 'file image media',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
            'searchreplace', 'visualblocks', 'code ',
            'insertdatetime', 'media', 'table', 'autolink', 'code', 'wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic underline | forecolor backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist | outdent indent | image | ' +
            'table hr',
        content_style: 'body { font-family: Helvetica, Arial, sans-serif; font-size: 14px }',

        images_upload_handler: (blobInfo, progress) => new Promise((resolve, reject) => {
            var xhr, imgData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/recipes/save-image', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            xhr.upload.onprogress = (e) => {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = () => {
                if (xhr.status === 403) {
                    reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    reject('HTTP Error: ' + xhr.status);
                    return;
                }

                const json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    reject('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                resolve(json.location);
            };

            xhr.onerror = () => {
                reject('Upload fehlgeschlagen, wenden Sie sich an Ihren persönlichen Programmierer. Code: ' + xhr.status);
            };

            imgData = new FormData();
            imgData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(imgData);
        })
    });
});
