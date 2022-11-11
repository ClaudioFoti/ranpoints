<x-site-layout title="Edit post">
    <x-form method="post" action="{{route('posts.update', $post->id)}}" title="Create post" submit="Update post">
        @method('put')

        <x-form-textarea name="body" :errors="$errors" :value="$post->body"/>
    </x-form>
</x-site-layout>
