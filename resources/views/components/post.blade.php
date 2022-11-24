@props(['post','categories'])
<div class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 w-full h-full">
    <div class="p-4">
        <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
                <a href="{{route('users.show',$post->author->id)}}">
                    <img class="w-8 h-8 rounded-full" src="{{$post->author->profile?->profile_icon}}" alt="">
                </a>
            </div>
            <div class="flex-1 min-w-0">
                <a href="{{route('users.show',$post->author->id)}}">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        {{$post->author->name}}
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        {{$post->created_at->format('H:i · d.m.Y')}}
                    </p>
                </a>
            </div>
            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                <a class="mb-2" href="{{route('posts.create',["parent_post_id" => $post->id])}}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                    </svg>
                </a>
                <span class="ml-1 mr-2 mb-2">
                        {{$post->children->count()}}
                    </span>
                <form method="post"
                      action="{{$post->hasUserLiked() ? route('interactions.destroy',$post->id) : route('interactions.store')}}">
                    @csrf
                    @if($post->hasUserLiked())
                        @method('delete')
                    @endif
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <button type="submit">
                        <svg class="w-6 h-6" fill="none" stroke="{{$post->hasUserLiked() ? "#0E9F6E" : "currentColor"}}"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </button>
                </form>
                <span class="ml-1 mb-2 {{$post->hasUserLiked() ? "text-green-600" : ""}}">
                    {{$post->interactions->sum('weight')}}
                </span>
            </div>
        </div>
    </div>
    <div class="px-4 pb-4">
        <div class="pb-2">
            @foreach($post->categories as $category)
                <span
                    class="mr-2 p-1 rounded {{$tailwindColorHelper->pick()}} dark:text-gray-800">{{$category->name}}</span>
            @endforeach
        </div>
        <a href="{{route('posts.show',$post->id)}}">
            <p class="font-normal text-lg text-gray-700 dark:text-gray-400 break-all">
                {{ $post->body }}
            </p>
            <img class="max-w-xs" src="{{$post->media->last()?->getUrl()}}">
        </a>
    </div>
</div>
