<x-site-layout title="Posts">
    <x-post-button/>
    <div class="space-y-4">
        @foreach($posts as $post)
            <x-post :post="$post" :categories="$post->categories"/>
        @endforeach
    </div>
</x-site-layout>
