<div class="mb-6 x-editor @if(isset($error) && $error) x-editor-error @endif"
     x-data="{is_disable:{{(isset($disabled) && $disabled) ? '1' : '0'}}}"
     x-init="$($refs.textarea).summernote({
    lang: 'uk-UA',
    height: 250,
    minHeight: null,
    maxHeight: null,
    toolbar: [
        ['undoredo', ['undo', 'redo']],
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['height', ['height']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['popovers', ['img']],
        ['typography', ['typography']]
    ],
    buttons: {
        img: LFMButton,
        uploadImgButton: LFMButtonChange
    },
    styleTags: [
        'p', { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' }, 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
    ],
    popover: {
        image: [
            ['custom', ['uploadImgButton']],
            ['resize', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']]
        ]
    },
    callbacks: {
        onChange: function (contents, $editable) {
            @this.set('{{$name ?? ''}}', contents);
        }
    }
});
if(is_disable){
    $($refs.textarea).summernote('disable');
}
">
    @isset($title)
    <label class="block mb-2 text-sm font-medium @if(isset($error) && $error) text-red-700 dark:text-red-500 @else text-gray-900 dark:text-white @endif">{{$title}}</label>
    @endisset
    <div wire:ignore>
        <textarea
            x-ref="textarea"
            {{$attributes->except(['class','disabled'])}}
            name="{{$name ?? ''}}"
        >{{(isset($value) && $value) ? $value : ''}}</textarea>
    </div>
    @if(isset($error) && $error)
        <p class="mt-2 text-sm text-red-600">{{$error}}</p>
    @endif
    @isset($hint)
    <p class="mt-[2px] text-sm text-gray-500">{{$hint}}</p>
    @endisset
</div>
