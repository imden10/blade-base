// Define function to open filemanager window
const lfm = function (options, cb) {
    const route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = cb;
};

function generateRandomId(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for (let i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }

    return result;
}

// Define LFM summernote button
const LFMButton = function (context) {
    const ui = $.summernote.ui;
    const randomId = generateRandomId(10);
    const button = ui.button({
        contents: '<i class="note-icon-picture"></i>' +
            '<div id="tooltip-insert-img-'+randomId+'" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">\n' +
            '    Вставити зображення\n' +
            '    <div class="tooltip-arrow" data-popper-arrow></div>\n' +
            '</div>',
        data:{
            'tooltip-target':'tooltip-insert-img-'+randomId,
            'tooltip-placement':'bottom'
        },
        click: function () {
            lfm({type: 'image', prefix: '/filemanager'}, function (lfmItems, path) {
                lfmItems.forEach(function (lfmItem) {
                    context.invoke('insertImage', lfmItem.url);
                });
            });
        }
    });

    return button.render();
};

const LFMButtonChange = function (context) {
    const ui = $.summernote.ui;
    const randomId = generateRandomId(10);
    const button = ui.button({
        contents: '<i class="note-icon-picture"></i>' +
            '<div id="tooltip-insert-img-'+randomId+'" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">\n' +
            '    Завантажити інше зображення\n' +
            '    <div class="tooltip-arrow" data-popper-arrow></div>\n' +
            '</div>',
        data:{
            'tooltip-target':'tooltip-insert-img-'+randomId,
            'tooltip-placement':'bottom'
        },
        click: function () {
            let $image = window.selectedImage;
            let selectPath = $image.attr('src');
            selectPath = selectPath.substring(selectPath.indexOf('/uploads'));

            let parts = selectPath.split("/");
            let selectFile = parts.pop();
            let selectFolder = parts.join("/");

            let url = '/filemanager?type=image&path=' + encodeURIComponent(selectFolder) + '&select=' + encodeURIComponent(selectFile);

            window.open( url, 'FileManager', 'width=900,height=600');
            window.SetUrl = function (lfmItems){
                $image.attr('src',lfmItems[0].url);
            };
        }
    });

    return button.render();
};
