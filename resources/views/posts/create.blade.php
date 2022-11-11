<x-site-layout title="Create post">
    <x-form method="post" action="{{route('posts.store')}}" title="Create post" submit="Create post">
        <x-form-textarea name="body" :errors="$errors" value=""/>
    </x-form>
</x-site-layout>
