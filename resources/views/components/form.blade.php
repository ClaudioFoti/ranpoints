<form method="{{$method}}" action="{{$action}}">
    @csrf
    {{$slot}}

    <button type="submit" class="p-2 bg-green-500 text-green-50 rounded-lg">{{$submit}}</button>
</form>