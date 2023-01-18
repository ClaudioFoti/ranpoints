@props(['post'])
<div
    class="px-5 py-3 flex text-sm font-medium text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
    <div class="w-full">
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
                <p class="break-all">
                    {!! $post->body !!}
                </p>
            </a>
        </div>
    </div>
    <div class="self-center">
        @if(!$post->media->isEmpty())
            <a href="{{route('posts.show',$post->id)}}">
                <img class="max-w-10 max-h-10" src="{{$post->media->last()?->getUrl('thumbnail')}}">
            </a>
        @endif
    </div>
</div>
