<x-site-layout title="Post {{$post->id}}">

    <div class="text-purple-600 mb-6">
        Written by
        <a href="{{route('users.show', $post->author->id)}}" class="underline">
            {{$post->author->name}}
        </a>
        @if($post->parent_post_id !== null)
            Parent post
            <a href="{{route('posts.show', $post->parent_post->id)}}" class="underline">
                {{$post->parent_post->id}}
            </a>
        @endif
    </div>

    {{$post->body}}

</x-site-layout>
