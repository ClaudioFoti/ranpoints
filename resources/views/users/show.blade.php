<x-site-layout title="{{$user->name}}">

    {{$user->email}}

    <h2 class="font-bold mb-2 mt-5">Posts made</h2>
    <ul class="list-disc pl-5">
        @foreach($user->posts as $post)
            <li>
                <a href="{{route('posts.show', $post->id)}}" class="underline hover:bg-gray-200">
                    {{$post->id}}
                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>
