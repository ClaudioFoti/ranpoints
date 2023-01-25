<x-site-layout title="Posts" :usesLivewire="true">
    <x-post-button/>
    <div class="space-y-4">
        @forelse($posts as $post)
            <x-post wire:key="post-{{$post->id}}" :post="$post" :categories="$post->categories"/>
        @empty
            No posts yet. Come back later or create a post!
        @endforelse

    </div>
</x-site-layout>
