@props(['name', 'label', 'placeholder', 'errors', 'value'])
<div class="mt-2 mb-4">

    <input type="text" value="{{ old($name, $value) }}" id="{{$name}}" name="{{$name}}" aria-describedby="{{$name}}_help" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{$placeholder}}">
    <p id="{{$name}}_help" class="text-sm text-gray-500 dark:text-gray-400">{{$label}}</p>

    <x-form-error name="{{$name}}" :errors="$errors"/>
</div>
