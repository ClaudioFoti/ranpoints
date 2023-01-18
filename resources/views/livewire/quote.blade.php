<div>
    <div class="mb-2">
        <a href="#" class="float-right" wire:click="$refresh">
            <svg class="w-6 h-6 text-gray-900 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"></path>
            </svg>
        </a>
        <p class="text-sm text-gray-500 dark:text-gray-400">You are quoting:</p>
    </div>
    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full">
        <p class="text-2xl">
            ”{{$quote}}„
            <span class="block text-right">— {{$author}}</span>
        </p>
    </div>
    <input name="quote" type="hidden" value="<i>”{{$quote}}„ — {{$author}}</i><br><br>">
</div>
