<div class="x-select2 @if(isset($error) && $error) x-select2-error @endif @if(isset($multiple) && $multiple) x-select2-multiple @endif">
    <x-forms.select.select title="{{$title}}" multiple="{{$multiple}}" required="{{$required}}" name="{{$name}}" hint="{{$hint}}" class="{{$select2Class}}" error="{{$error}}">
        <option value="">---</option>
        {!! $this->renderOptions($options) !!}
    </x-forms.select.select>
</div>
