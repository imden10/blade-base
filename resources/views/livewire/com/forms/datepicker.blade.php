<div class="x-datepicker @if(isset($error) && $error) x-datepicker-error @endif {{isset($width) ? ('w-['.$width.']') : 'w-full'}}">
    <x-forms.input
        :title="$title"
        :placeholder="$placeholder"
        :name="$name"
        :value="$value"
        :hint="$hint"
        :icon="$icon"
        :width="$width"
        :required="$required"
        :disabled="$disabled"
        :id="$componentId"
    />
</div>
