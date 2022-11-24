<x-site-layout title="Top users">
    <x-user-profile id="{{$users->first()->id}}"
                    name="{{$users->first()->name}}"
                    profile_icon="{{$users->first()->profile?->profile_icon}}"
                    posts_count="{{$users->first()->posts->count()}}"
                    likes_count="{{$users->first()->received}}"/>
    <div class="grid grid-cols-2 pb-6">
        <div>
            <x-user-profile id="{{$users->values()->get(1)->id}}"
                            name="{{$users->values()->get(1)->name}}"
                            profile_icon="{{$users->values()->get(1)->profile?->profile_icon}}"
                            posts_count="{{$users->values()->get(1)->posts->count()}}"
                            likes_count="{{$users->values()->get(1)->received}}"/>
        </div>
        <div>
            <x-user-profile id="{{$users->values()->get(2)->id}}"
                            name="{{$users->values()->get(2)->name}}"
                            profile_icon="{{$users->values()->get(2)->profile?->profile_icon}}"
                            posts_count="{{$users->values()->get(2)->posts->count()}}"
                            likes_count="{{$users->values()->get(2)->received}}"/>
        </div>
    </div>
    <div class="space-y-2">
        @foreach($users->skip(3) as $user)
            <div
                class="px-5 py-3 flex font-medium text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <div>
                    <div class="flex items-center space-x-2">
                        <div class="flex-shrink-0">
                            <a href="{{route('users.show',$user->id)}}">
                                <img class="w-5 h-5 rounded-full" src="{{$user->profile?->profile_icon}}" alt="">
                            </a>
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="{{route('users.show',$user->id)}}">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    {{$user->name}}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grow"></div>
                <div class="self-center">
                    <span class="text-gray-500 dark:text-gray-400">{{$user->posts->count()}} post(s) · {{$user->received}} likes</span>
                </div>
            </div>
        @endforeach
    </div>
</x-site-layout>
