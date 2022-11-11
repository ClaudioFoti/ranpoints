@props(['name','errors','value'])
<div>
    <label for="{{$name}}">{{ucfirst($name)}}</label>
    <textarea name="{{$name}}" placeholder="Your post"
              class="border border-gray-400 rounded-sm p-1">@error('body'){{old($name, $value)}}@else{{$value}}@enderror</textarea>

    <x-form-error :name="$name" :errors="$errors"/>
</div>
