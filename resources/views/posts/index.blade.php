<x-site-layout title="Posts">

    <div class="mb-6 flex justify-end">
        <a href="{{route('posts.create')}}" class="p-2 bg-green-500 text-green-50 rounded-lg">Create post</a>
    </div>

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
