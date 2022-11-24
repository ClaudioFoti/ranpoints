<a href="{{route('posts.create')}}">
    <button data-tooltip-target="tooltip-no-arrow"
            data-tooltip-placement="right"
            type="button"
            class="fixed ml-[51rem]
            text-violet-700 border border-violet-700
            hover:bg-violet-700 hover:text-white
            focus:ring-4 focus:outline-none focus:ring-violet-300
            font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center
            dark:border-violet-500 dark:text-violet-500 dark:hover:text-gray-900 dark:focus:ring-violet-800">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
    </button>
    <div id="tooltip-no-arrow" role="tooltip"
         class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white dark:text-gray-900 bg-violet-700 rounded-lg shadow-sm opacity-0 duration-300 tooltip dark:bg-violet-700">
        Post something
    </div>
</a>
