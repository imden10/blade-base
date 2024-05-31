@props([
    'sortable' => null,
    'direction' => null
])

@php
    $inner_class = "px-3 py-3";

    if($sortable){
        $inner_class .= " sorting";

        if($direction === 'asc'){
            $inner_class .= " sorting_asc";
        } elseif($direction === 'desc'){
            $inner_class .= " sorting_desc";
        }
    }
@endphp

<th {{$attributes->merge(['class' => $inner_class])->only(['class','width'])}}>
@unless($sortable)
    <span class="text-left text-xl leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">{{$slot}}</span>
@else
    <button {{$attributes->except('class')}} class="flex items-center space-x-1 text-left text-xs leading-4 font-medium">
        <span>{{$slot}}</span>
    </button>
@endunless
</th>
