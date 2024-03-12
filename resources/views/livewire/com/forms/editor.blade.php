<div class="x-editor @if(isset($error) && $error) x-editor-error @endif w-full">
<x-forms.text
    :title="$title"
    :placeholder="$placeholder"
    :name="$name"
    :value="$value"
    :hint="$hint"
    :rows="$rows"
    :required="$required"
    :disabled="$disabled"
    :id="$componentId"
    :error="$error"
/>
</div>
