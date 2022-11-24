@props(['id','profile_icon','name','posts_count','likes_count'])
<div class="flex flex-col items-center pb-5">
    <a href="{{route('users.show',$id)}}">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{$profile_icon}}"/>
    </a>
    <a href="{{route('users.show',$id)}}">
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$name}}</h5>
    </a>
    <span class="text-sm text-gray-500 dark:text-gray-400">{{$posts_count}} post(s) · {{$likes_count}} likes</span>
</div>
