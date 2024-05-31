@php
    $componentId = "x_select_" . uniqid(time());
@endphp
<div class="x-select" style="@if(isset($width) && $width) width:{{$width}} @endif">
    <div class="@if(isset($inline) && $inline) x-select-inline @endif">
        @isset($title)
            <label class="@if(isset($inline) && $inline) x-select-inline @endif @if(isset($error) && $error) x-select-error @endif">{{$title}}</label>
        @endisset
        <div class="x-select-select">
            <div class="x-select-element @if(isset($error) && $error) x-select-error @endif">
                <button type="button"
                        @if(!$optOpen) aria-expanded="false" @else aria-expanded="true" @endif
                        onclick="xselectToogleList(event)" wire:click="optOpenToggle">
                    <span>{{$options[$val]['text'] ?? ''}}</span>
                </button>
            </div>
            <div id="{{$componentId}}" class="x-select-dropdown @if(!$optOpen) hidden @endif">
                <div class="x-select-search">
                    <input type="text" id="searchInput" wire:model="optPhrase" wire:input="mySearch">
                </div>
                <div class="x-select-list">
                    @if(isset($options) && count($options))
                        @foreach($options as $id => $item)
                            <label data-text="{{$item['text']}}" class="@if((string)$val === (string)$id) x-select-selected @endif" title="{{$item['text']}}">
                                @if(isset($item['icon']))
                                    <i class="{{$item['icon']}}"></i>
                                @endif
                                <input type="radio" wire:click="optOpenToggle" {{$attributes->except(['class','width','title','inline','searchable','options','val'])}} value="{{$id}}">
                                {{ $item['text'] }}
                            </label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @isset($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
    @endisset
    @isset($hint)
    <p class="mt-[2px] text-sm text-gray-500 dark:text-gray-400">{{$hint}}</p>
    @endisset
</div>
