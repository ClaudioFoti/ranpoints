<x-site-layout title="Create post">
    <x-form method="post" action="{{route('posts.store')}}" title="Create post" submit="Create post">
        <input type="hidden" name="parent_post_id" value="{{$parent_post_id ?? ''}}" />
        <x-form-textarea name="body" :errors="$errors" value=""/>
        <x-form-file name="image" label="image" placeholder="Describe your post with an image" value="" :errors="$errors" />
    </x-form>
</x-site-layout>
