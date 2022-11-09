<x-site-layout title="Users">

    <ul class="list-disc pl-5">
        @foreach($users as $user)
            <li>
                <span class="font-semibold">{{$user->name}}</span>
                <span class="text-sm">{{$user->email}}</span>
            </li>
        @endforeach
    </ul>

</x-site-layout>
