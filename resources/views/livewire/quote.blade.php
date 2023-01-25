<div>
    <div class="mb-6">
        <div class="float-right flex inline">
            <label for="language" class="inline text-sm text-gray-500 dark:text-gray-400">Select a language</label>
            <select wire:model="language" id="language" name="language_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Choose a language</option>
                @foreach($languages as $language)
                    <option value="{{$language['code']}}">{{$language['text']}}</option>
                @endforeach
            </select>

            <a href="#" wire:click="$refresh" class="ml-2 mt-2">
                <svg class="w-6 h-6 text-gray-900 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"></path>
                </svg>
            </a>
        </div>
        <p class="text-md text-gray-500 dark:text-gray-400">You are quoting:</p>
    </div>
    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full">
        <p class="text-2xl">
            ”{{$quote}}„
            <span class="block text-right">— {{$author}}</span>
        </p>
    </div>
    <input name="quote" type="hidden" value="<i>”{{$quote}}„ — {{$author}}</i><br><br>">
</div>
