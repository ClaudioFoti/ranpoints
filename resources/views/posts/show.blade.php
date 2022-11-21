<x-site-layout title="Post {{$post->id}}">
    <div class="mx-auto w-[40rem]">
        <x-post :post="$post" :categories="$post->categories"/>
        @if($showChildren)
        @foreach($post->children as $child)
                <x-child-post :post="$child"/>
            @endforeach
        @endif
    </div>
</x-site-layout>
