<x-site-layout title="Posts">

    <ul class="list-disc pl-5">
        @foreach($posts as $post)
            <li>
                <a href="{{route('posts.show', $post->id)}}">
                    {{ Str::limit($post->body, 80)}}
                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>
