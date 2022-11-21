<x-site-layout title="Create post">
    <div class="mx-auto w-[40rem]">
        <div
            class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 w-full my-4">
            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <a href="{{route('users.show',auth()->id())}}">
                            <img class="w-8 h-8 rounded-full" src="{{auth()->user()->profile?->profile_icon}}" alt="">
                        </a>
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="{{route('users.show',auth()->id())}}">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{auth()->user()->name}}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                Now
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="px-5 pb-5">
                <x-form method="post" action="{{route('posts.store')}}" title="Create post">
                    <div class="space-y-4">
                        <input type="hidden" name="parent_post_id" value="{{$parent_post_id ?? ''}}"/>
                        <x-form-textarea name="body" placeholder="Your post" :errors="$errors" value=""/>

                        <x-form-input name="categories" label="Add tags to your post" placeholder="Comma separated list of tags" :errors="$errors" value=""/>

                        <x-form-file name="image" label="Describe your post with an image" value=""
                                     :errors="$errors"/>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
</x-site-layout>
