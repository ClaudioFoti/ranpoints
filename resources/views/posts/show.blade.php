<x-site-layout title="Post {{$post->id}}">

    <div class="text-purple-600 mb-6">
        Written by
        <a href="{{route('users.show', $post->author->id)}}" class="underline">
            {{$post->author->name}}
        </a>
    </div>

    {{$post->body}}

</x-site-layout>
