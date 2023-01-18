<div data-dial-init class="fixed ml-[51rem] group">
    <button type="button" data-dial-toggle="speed-dial-menu-top-left" aria-controls="speed-dial-menu-top-left" aria-expanded="false" class="flex items-center justify-center text-violet-700 dark:text-violet-500 hover:text-white dark:hover:text-gray-900 rounded-full w-14 h-14 hover:bg-violet-700 dark:hover:bg-violet-700 focus:ring-4 focus:ring-violet-300 focus:outline-none dark:focus:ring-violet-800 border border-violet-700 dark:border-violet-500">
        <svg aria-hidden="true" class="w-8 h-8 transition-transform group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        <span class="sr-only">Open actions menu</span>
    </button>
    <div id="speed-dial-menu-top-left" class="flex flex-col items-center hidden mt-4 space-y-2">
        <a href="{{route('posts.create')}}">
            <button type="button" data-tooltip-target="tooltip-share" data-tooltip-placement="right" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-6 h-6 -ml-px " fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"></path>
                </svg>
                <span class="sr-only">Post something</span>
            </button>
        </a>
        <div id="tooltip-share" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Post something
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <a href="{{route('create_quote')}}">
            <button type="button" data-tooltip-target="tooltip-print" data-tooltip-placement="right" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-6 h-6 rotate-90" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                </svg>
                <span class="sr-only">Quote a quote</span>
            </button>
        </a>
        <div id="tooltip-print" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Quote a quote
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
</div>
