<x-site-layout title="Post {{$post->id}}">

    <div class="mb-6 flex justify-end">
        <a href="{{route('posts.edit',$post->id)}}" class="p-2 bg-green-500 text-green-50 rounded-lg">Edit post</a>
    </div>
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
