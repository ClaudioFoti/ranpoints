<x-site-layout title="{{$user->name}}">
    <div class="flex flex-col items-center pb-5">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{$user->profile?->profile_icon}}"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$user->name}}</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{$user->posts->count()}} post(s)</span>
    </div>
    <div class="mx-auto w-[50rem] space-y-2">
        @foreach($user->posts->sortByDesc('created_at') as $post)
            <x-child-post :post="$post"/>
        @endforeach
    </div>
</x-site-layout>
