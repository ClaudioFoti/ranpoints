<x-site-layout title="{{Auth::check() ? 'Posts' : 'Welcome'}}">
    @auth
        @foreach($posts as $post)
            <div class="border-solid border-2 border-gray-800 mt-2 mb-2 p-2">
                {{ $post->body }}
                <span class="text-red-400">
                {{ $post->likes }}
            </span>
                <span class="text-sm text-gray-400">
                {{ $post->category_id }}
            </span>
            </div>
        @endforeach
    @else
        You are not logged in. Please log in to view the posts feed.
    @endauth
</x-site-layout>
