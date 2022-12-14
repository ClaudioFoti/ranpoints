<footer
    class="bottom-0 left-0 z-20 p-4 w-full bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">RanPoints™</a>. All Rights Reserved.
    </span>
    @if(auth()->user()?->is_admin)
        <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
            @foreach($menu as $item)
                <li>
                    <a href="{{$item['url']}}" class="mr-4 hover:underline md:mr-6 ">{{$item['title']}}</a>
                </li>
            @endforeach
        </ul>
    @endif
</footer>
