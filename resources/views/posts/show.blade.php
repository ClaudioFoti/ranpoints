<x-site-layout title="Post from {{$post->author->name}}" :usesLivewire="true">
    <div class="space-y-4">
        @if($post->parent_post_id !== null)
            <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="w-10 h-10 text-gray-900 dark:text-white rotate-180 self-end" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
                <div class="space-y-2 w-full">
                    <x-child-post :post="$post->parent_post"/>
                </div>
            </div>
        @endif
        <x-post :post="$post" :categories="$post->categories"/>
        @if(!$post->children->isEmpty())
            <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     class="w-10 h-10 text-gray-900 dark:text-white" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                </svg>
                <div class="space-y-2 w-full">
                    @foreach($post->children as $child)
                        <x-child-post :post="$child"/>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-site-layout>
