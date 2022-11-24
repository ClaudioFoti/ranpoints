<x-site-layout title="Create post">
        @if($has_parent)
        <div class="flex space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="w-10 h-10 text-gray-900 dark:text-white rotate-180 self-end" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
            <div class="space-y-2 w-full">
                <x-child-post :post="$parent_post"/>
            </div>
        </div>
        @endif

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
                        <input type="hidden" name="parent_post_id" value="{{$has_parent ? $parent_post->id : ''}}"/>
                        <x-form-textarea name="body" placeholder="Your post" :errors="$errors" value=""/>

                        <x-form-input name="categories" label="Add tags to your post"
                                      placeholder="Comma separated list of tags" :errors="$errors" value=""/>

                        <x-form-file name="image" label="Describe your post with an image" value=""
                                     :errors="$errors"/>
                    </div>
                </x-form>
            </div>
        </div>
</x-site-layout>
