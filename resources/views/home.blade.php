<x-site-layout title="Posts">

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

</x-site-layout>
