<x-site-layout title="Home" :usesLivewire="true">
    <x-post-button/>
    <div class="space-y-4">
    @foreach($posts as $post)
        <x-post wire:key="post-{{$post->id}}" :post="$post" :categories="$post->categories"/>
    @endforeach
    </div>
</x-site-layout>
