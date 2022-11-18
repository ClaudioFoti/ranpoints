<x-site-layout title="Post {{$post->id}}">
    <div class="mx-auto w-[40rem]">
        <x-post :post="$post" :categories="$post->categories"/>
    </div>
</x-site-layout>
