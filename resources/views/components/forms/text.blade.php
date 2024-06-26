<div class="mb-6"
     x-data
     wire:ignore
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
})"
>
    @isset($title)
    <label class="block mb-2 text-sm font-medium @if(isset($error) && $error) text-red-700 dark:text-red-500 @else text-gray-900 dark:text-white @endif">{{$title}}</label>
    @endisset
        <textarea
            x-ref="textarea"
            {{$attributes->except('class')}}
            name="{{$name ?? ''}}"
            class="@if(isset($editor) && $editor) sm-editor @endif text-gray-700 border-gray-300 text-sm rounded-lg focus:ring-{{ (isset($error) && $error) ? 'red' : 'blue' }}-500 focus:border-{{ (isset($error) && $error) ? 'red' : 'blue' }}-500 block w-full p-2.5
                  @if(isset($disabled) && $disabled) bg-gray-100 cursor-not-allowed @else bg-gray-50 @endif
                  @if(isset($error) && $error) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @endif"
            placeholder="{{$placeholder ?? ''}}"
            @if(isset($required) && $required) required @endif
            @if(isset($disabled) && $disabled) disabled @endif
            @isset($id) id="{{$id}}" @endisset
            @if(isset($rows) && $rows) rows="{{$rows}}" @else rows="4" @endif
        >{{(isset($value) && $value) ? $value : ''}}</textarea>
    @if(isset($error) && $error)
        <p class="mt-2 text-sm text-red-600">{{$error}}</p>
    @endif
    @isset($hint)
    <p class="mt-[2px] text-sm text-gray-500">{{$hint}}</p>
    @endisset
</div>
