@props(['name', 'label', 'errors', 'value'])
<div class="mt-2 mb-4">
    <input name="{{$name}}" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="{{$name}}_help" id="{{$name}}" type="file">
    <p id="{{$name}}_help" class="text-sm text-gray-500 dark:text-gray-400">{{$label}}</p>

    <x-form-error name="{{$name}}" :errors="$errors"/>
</div>
