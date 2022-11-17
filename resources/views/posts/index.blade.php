<x-site-layout title="Posts">
    <div class="mx-auto w-[40rem]">
        @foreach($posts as $post)
            <x-post :post="$post" :categories="$post->categories"/>
        @endforeach
    </div>
</x-site-layout>
