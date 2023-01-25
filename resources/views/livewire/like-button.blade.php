<div class="inline-flex">
    <button wire:click="{{ $has_user_liked ? "unlike" : "like" }}">
        <svg class="w-6 h-6" fill="none" stroke="{{$has_user_liked ? "#0E9F6E" : "currentColor"}}"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
        </svg>
    </button>
    <span class="ml-1 mb-2 {{$has_user_liked ? "text-green-600" : ""}}">
        {{$likes}}
    </span>
</div>
