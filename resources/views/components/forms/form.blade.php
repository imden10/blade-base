<form action="{{$action ?? ''}}" method="{{$method ?? 'get'}}">
    @if(isset($method) && $method == 'post')
    @csrf
    @endif
    {{$slot}}
</form>
