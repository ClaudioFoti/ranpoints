<x-site-layout title="Posts">
    <div class="mx-auto" style="width: 24rem;">
        @foreach($posts as $post)
            <x-post authorName="{{$post->author->name}}" body="{{$post->body}}" :categories="$post->categories"/>
        @endforeach
    </div>
</x-site-layout>
