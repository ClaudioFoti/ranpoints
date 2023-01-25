<div class="space-y-2 mb-2">
    <div class="flex justify-center">
        <div class="max-w-[30rem] self-center">
            @if(count($posts) > 0)
                <x-post wire:key="post-{{$posts->first()->id}}" :post="$posts->first()"/>
            @endif
        </div>
    </div>
    <div class="grid grid-cols-2 pb-6 gap-2">
        @if(count($posts) > 2)
            <x-post wire:key="post-{{$posts->values()->get(1)->id}}" :post="$posts->values()->get(1)"/>
            <x-post wire:key="post-{{$posts->values()->get(2)->id}}" :post="$posts->values()->get(2)"/>
        @endif
    </div>
</div>
<div class="space-y-2">
    @foreach($posts->skip(3) as $post)
        <x-child-post wire:key="child-{{$post->id}}" :post="$post"/>
    @endforeach
</div>
