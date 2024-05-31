@props(['online' => false, 'user' => null])
<div class="user-pic-component" data-id="{{$user->id}}">
    @if($user->photo)
        <div class="relative">
            <img class="w-10 h-10 min-w-10 rounded-full" src="{{$user->photo}}" alt="user-pic">
            <span class="uplabel bottom-0 left-7 absolute w-3.5 h-3.5 border-2 border-white rounded-full @if($online) bg-green-400 @else bg-red-400 @endif"></span>
        </div>
    @else
        <div class="relative inline-flex items-center justify-center w-10 h-10 rounded-full" style="background-color: {{$user->color}}">
            <span class="font-medium text-white">{{$user->initials}}</span>
            <span class="uplabel bottom-0 left-7 absolute w-3.5 h-3.5 border-2 border-white rounded-full @if($online) bg-green-400 @else bg-red-400 @endif"></span>
        </div>
    @endif
</div>
