import './bootstrap';
import 'flowbite';

import Datepicker from 'flowbite-datepicker/Datepicker';
import DateRangePicker from 'flowbite-datepicker/DateRangePicker';
import uk from "flowbite-datepicker/locales/uk";

document.addEventListener('livewire:navigated', () => {
    console.log('navigated');
    initFlowbite();
});

window.Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
    // Runs immediately before a commit's payload is sent to the server...
    console.log('updating');
    respond(() => {
        // Runs after a response is received but before it's processed...
        console.log('updating after');
    })

    succeed(({ snapshot, effect }) => {
        // Runs after a successful response is received and processed
        // with a new snapshot and list of effects...
        console.log('Runs after a successful response');
        setTimeout(function (){
            // component.el.querySelector("#searchInput").focus(); todo скрив временно
        },1);
        setTimeout(function (){
            initFlowbite();
        },100);
    })

    fail(() => {
        // Runs if some part of the request failed...
    })
});

window.selectedImage = null;

// livewire selelct2 init
window.Livewire.on('x-select-init', (param) => {
    if(param[0].class){
        let params = {
            width: param[0].width,
        }
        if(!param[0].searchable){
            params.minimumResultsForSearch = 'Infinity';
        }

        if(param[0].disabled){
            params.disabled = true;
        }

        if(param[0].ajax_url){
            params = {
                ...params,
                minimumInputLength:  param[0].minimum_input_length,
                ajax: {
                    url: param[0].ajax_url,
                    dataType: "json",
                    type: "GET",
                    data: function (params) {
                        var queryParameters = {
                            term: params.term
                        }
                        return queryParameters;
                    },
                }
            }
        }

        $("." + param[0].class).select2(params);
    }
});

// livewire datepicker init
window.Livewire.on('x-datepicker-init', (param) => {
    if(param[0].id){
        let options = {
            format: param[0].format,
            language: 'uk',
            autohide: true,
            weekStart: 1,
            todayHighlight: true,

        }

        // daysOfWeekDisabled: [0,1],
        // todayBtn: true,
        //     clearBtn: true,
        // minDate : new Date()

        let datepickerEl = document.getElementById(param[0].id);
        Object.assign(Datepicker.locales, uk);
        new Datepicker(datepickerEl, options);
    }
});

// livewire datepicker init
window.Livewire.on('x-daterangepicker-init', (param) => {
    if(param[0].id){
        let options = {
            format: param[0].format,
            language: 'uk',
            autohide: true,
            weekStart: 1,
            todayHighlight: true,
        }

        // daysOfWeekDisabled: [0,1],
        // todayBtn: true,
        //     clearBtn: true,
        // minDate : new Date()

        console.log(param[0]);

        let datepickerEl = document.getElementById(param[0].id);

        // Object.assign(DateRangePicker.locales, uk);
        new DateRangePicker(datepickerEl, options);
    }
});

// livewire image init
window.Livewire.on('x-image-init', (param) => {
    console.log('x-image-init');
    if(param[0].id){
        let imageContainer = $("#" + param[0].id);
        imageContainer.css('width',param[0].width);
        imageContainer.find(".x-image-box").css('width',param[0].width);
        imageContainer.find(".x-image-box").css('height',param[0].height);
    }
});

$(document).on('click','.x-image-component', function (){
    let imageContainer = $(this);
    const media_prefix = imageContainer.data('app-url') + '/storage/media';
    let selectPath = imageContainer.find('.media-input').val();
    let parts = selectPath.split("/");
    let selectFile = parts.pop();
    let selectFolder = parts.join("/");
    let url = '/filemanager?type=image&path=' + encodeURIComponent(selectFolder) + '&select=' + encodeURIComponent(selectFile);

    window.open(url, 'FileManager', 'width=900,height=600');

    window.SetUrl = function(items) {
        const file_path = items.map(function (item) {
            item.url_absolute = item.url;
            item.url = item.url.replace(media_prefix, '');
            return item;
        });

        if (file_path.length > 0) {
            const fullFileUrl = file_path[0].url_absolute;
            const fileUrl = file_path[0].url;

            imageContainer.find('.media-empty-wrapper').addClass("hidden");
            imageContainer.find('.media-image-wrapper').removeClass("hidden");
            imageContainer.find('.media-image-wrapper').addClass("flex");
            imageContainer.find('.x-image-box').removeClass("border-2");
            imageContainer.find('.x-image-box').addClass("border-0");
            imageContainer.find('.media-input').val(fileUrl);
            imageContainer.find('.media-image').attr('src',fullFileUrl);
            imageContainer.find('.media-input-alt').val("");
        }
    }
});

$(document).on('click','.x-image-clear-btn', function (e){
    e.stopPropagation();
    let imageContainer = $(this).closest('.x-image-component');

    imageContainer.find('.media-empty-wrapper').removeClass("hidden");
    imageContainer.find('.media-image-wrapper').addClass("hidden");
    imageContainer.find('.media-image-wrapper').removeClass("flex");
    imageContainer.find('.x-image-box').addClass("border-2");
    imageContainer.find('.x-image-box').removeClass("border-0");
    imageContainer.find('.media-input').val("");
    imageContainer.find('.media-image').attr('src',"");
});

$(document).on('click','.x-image-info-btn', function (e){
    e.stopPropagation();
    let imageContainer = $(this).closest('.x-image-component');
    let componentId = imageContainer.attr('id');
    let path = imageContainer.find('.media-input').val();
    let alt_value = imageContainer.find('.media-input-alt').val();
    let $modal = $("#x_image_info_modal");
    $modal.find('.modal-body-container').html("");
    $modal.find('.modal-body-spinner').removeClass('hidden');
    $modal.find('.x-image-info-alt-input input').val('');

    $.ajax({
        url: "/admin/multimedia/get-info",
        type: "get",
        dataType: "json",
        data: {
            path: path,
            alt_value: alt_value
        },
        success: function(res) {
            if (res.success) {
                $modal.find('.modal-body-spinner').addClass('hidden');
                $modal.find('.modal-body-container').html(res.html);
                $modal.find('.x-image-info-alt-input input').val(res.alt_value);
                $modal.find('.x-image-info-clipboard').val(res.full_url);
                $modal.find('.x-image-info-alt-container').data('id',componentId)
            }
        }
    });
});

// livewire x-clipboard init
$(document).on('click','.x-clipboard .copy-btn',function(e) {
    let $clipboardBlock = $(this).closest('.x-clipboard');
    let clipboardId = $clipboardBlock.find('.copy-input').attr('id');

    const tooltip = FlowbiteInstances.getInstance('Tooltip', 'tooltip-copy-' + clipboardId);

    const $defaultIcon = document.getElementById('default-icon-' + clipboardId);
    const $successIcon = document.getElementById('success-icon-' + clipboardId);

    const $defaultTooltipMessage = document.getElementById('default-tooltip-message-' + clipboardId);
    const $successTooltipMessage = document.getElementById('success-tooltip-message-' + clipboardId);

    const showSuccess = () => {
        $defaultIcon.classList.add('hidden');
        $successIcon.classList.remove('hidden');
        $defaultTooltipMessage.classList.add('hidden');
        $successTooltipMessage.classList.remove('hidden');
        tooltip.show();
    }

    const resetToDefault = () => {
        $defaultIcon.classList.remove('hidden');
        $successIcon.classList.add('hidden');
        $defaultTooltipMessage.classList.remove('hidden');
        $successTooltipMessage.classList.add('hidden');
        tooltip.hide();
    }

    e.preventDefault();
    $clipboardBlock.find(".copy-input").attr('disabled',false);
    $clipboardBlock.find(".copy-input").select();
    document.execCommand("copy");
    $clipboardBlock.find(".copy-input").attr('disabled',true);
    window.getSelection().removeAllRanges();

    showSuccess();

    // reset to default state
    setTimeout(() => {
        resetToDefault();
    }, 2000);
});

$(document).on('click','.x-image-info-alt-save-btn',function (){
    let $altContainer = $(this).closest('.x-image-info-alt-container');

    let componentId = $altContainer.closest(".x-image-info-alt-container").data("id");

    let $iconSave = $altContainer.find('.icon-save');
    let $iconSaved = $altContainer.find('.icon-saved');
    let altVal = $altContainer.find('.x-image-info-alt-input input').val();

    $iconSave.addClass('hidden');
    $iconSaved.removeClass('hidden');

    $("#" + componentId).find(".media-input-alt").val(altVal);
});

$(document).on('input','.x-image-info-alt-input input',function (){
    let $altContainer = $(this).closest('.x-image-info-alt-container');
    let $iconSave = $altContainer.find('.icon-save');
    let $iconSaved = $altContainer.find('.icon-saved');

    $iconSaved.addClass('hidden');
    $iconSave.removeClass('hidden');
});

// livewire file init
window.Livewire.on('x-file-init', (param) => {
    if(param[0].id){
        let fileContainer = $("#" + param[0].id);
        fileContainer.css('width',param[0].width);
        fileContainer.find(".x-file-box").css('width',param[0].width);
        fileContainer.find(".x-file-box").css('height',param[0].height);
    }
});

$(document).on('click','.x-file-component', function (){
    let fileContainer = $(this);
    const media_prefix = fileContainer.data('app-url') + '/storage/files';
    let selectPath = fileContainer.find('.file-input').val();
    let parts = selectPath.split("/");
    let selectFile = parts.pop();
    let selectFolder = parts.join("/");
    let url = '/filemanager?type=file&path=' + encodeURIComponent(selectFolder) + '&select=' + encodeURIComponent(selectFile);

    window.open(url, 'FileManager', 'width=900,height=600');

    window.SetUrl = function(items) {
        const file_path = items.map(function (item) {
            item.url_absolute = item.url;
            item.url = item.url.replace(media_prefix, '');
            return item;
        });

        if (file_path.length > 0) {
            const fileUrl = file_path[0].url;
            const extension = fileUrl.split('.').pop();

            fileContainer.find('.file-empty-wrapper').addClass("hidden");
            fileContainer.find('.media-file-wrapper').removeClass("hidden");
            fileContainer.find('.media-file-wrapper').addClass("flex");
            fileContainer.find('.x-file-box').removeClass("border-2");
            fileContainer.find('.x-file-box').addClass("border-0");
            fileContainer.find('.file-input').val(fileUrl);
            fileContainer.find('.media-file').attr('src',"/img/file-ext/"+extension+".png");
        }
    }
});

$(document).on('click','.x-file-clear-btn', function (e){
    e.stopPropagation();
    let fileContainer = $(this).closest('.x-file-component');

    fileContainer.find('.file-empty-wrapper').removeClass("hidden");
    fileContainer.find('.media-file-wrapper').addClass("hidden");
    fileContainer.find('.media-file-wrapper').removeClass("flex");
    fileContainer.find('.x-file-box').addClass("border-2");
    fileContainer.find('.x-file-box').removeClass("border-0");
    fileContainer.find('.file-input').val("");
    fileContainer.find('.file-image').attr('src',"");
});

$(document).on('click','.x-file-info-btn', function (e){
    e.stopPropagation();
    let fileContainer = $(this).closest('.x-file-component');
    let path = fileContainer.find('.file-input').val();
    let $modal = $("#x_file_info_modal");
    $modal.find('.modal-body-container').html("");
    $modal.find('.modal-body-spinner').removeClass('hidden');

    $.ajax({
        url: "/admin/multimedia/get-info-file",
        type: "get",
        dataType: "json",
        data: {
            path: path
        },
        success: function(res) {
            if (res.success) {
                console.log(res)
                $modal.find('.modal-body-spinner').addClass('hidden');
                $modal.find('.modal-body-container').html(res.html);
                $modal.find('.x-file-info-clipboard').val(res.full_url);
            }
        }
    });
});

$(document).on('click', '.note-editing-area img', function(event) {
    console.log('Картинка була натиснута:', $(this));
    // Тут ви можете викликати функцію або виконати інші дії для обробки натискання на картинку
});

// grid table functions ************************************************************************************************
$('.check-all').on('change', function () {
    if ($(this).prop('checked')) {
        $('.checkbox-item').prop('checked', true);
    } else {
        $('.checkbox-item').prop('checked', false);
    }

    if($(this).closest('.x-grid').find('.group-actions-btn')){
        if($('.checkbox-item:checked').length){
            $(this).closest('.x-grid').find('.group-actions-btn').prop('disabled',false);
        } else {
            $(this).closest('.x-grid').find('.group-actions-btn').prop('disabled',true);
        }
    }
});

$('.checkbox-item').on('change', function () {
    let checked = 0;
    $('.checkbox-item').each(function () {
        if ($(this).prop('checked')) {
            checked++;
        }
    });

    if ($('.checkbox-item').length === checked) {
        $('.check-all').prop('checked', true)
    } else {
        $('.check-all').prop('checked', false)
    }

    if($(this).closest('.x-grid').find('.group-actions-btn')){
        if($('.checkbox-item:checked').length){
            $(this).closest('.x-grid').find('.group-actions-btn').prop('disabled',false);
        } else {
            $(this).closest('.x-grid').find('.group-actions-btn').prop('disabled',true);
        }
    }
});
