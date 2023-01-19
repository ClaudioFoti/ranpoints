<x-site-layout title="Top posts" :usesLivewire="true">
    <div class="space-y-2 mb-2">
        <div class="flex justify-center">
            <div class="max-w-[30rem] self-center">
                <x-post :post="$posts->first()"/>
            </div>
        </div>
        <div class="grid grid-cols-2 pb-6 gap-2">
                <x-post :post="$posts->values()->get(1)"/>
                <x-post :post="$posts->values()->get(2)"/>
        </div>
    </div>
    <div class="space-y-2">
        @foreach($posts->skip(3) as $post)
            <x-child-post :post="$post"/>
        @endforeach
    </div>
</x-site-layout>
