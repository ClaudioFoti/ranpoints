@props(['post'])
<div
    class="px-5 py-3 text-sm font-medium text-gray-500 border-t border-gray-200 rounded-b-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 ">
    <div class="flex items-center space-x-2 mb-2">
        <div class="flex-shrink-0">
            <a href="{{route('users.show',$post->author->id)}}">
                <img class="w-5 h-5 rounded-full" src="{{$post->author->profile?->profile_icon}}" alt="">
            </a>
        </div>
        <div class="flex-1 min-w-0">
            <a href="{{route('users.show',$post->author->id)}}">
                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    {{$post->author->name}}
                </p>
            </a>
        </div>
    </div>
    <div class="flex">
        <a href="{{route('posts.show',$post->id)}}">
            <p class="line-clamp-2">{{ $post->body }}</p>
            @if(!$post->media->isEmpty())
                <img class="w-10 h-10" src="{{$post->media->last()?->getUrl('thumbnail')}}">
            @endif
        </a>
    </div>
</div>
