@foreach ($options as $item)
    @php
        $categoryname[] = $item['text'];
    @endphp

    <option value="{{ $item['id'] }}">
        {{ trim(implode(' > ', $categoryname), '>') }}
    </option>

    @if (!empty($item['children']))
        @php($options = $item['children'])
        <x-forms.select.options :options="$options" :categoryname="$categoryname"></x-forms.select.options>
    @endif

    @php(array_pop($categoryname))
@endforeach
