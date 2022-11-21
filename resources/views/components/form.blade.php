<form method="{{$method}}" action="{{$action}}" enctype="multipart/form-data">
    @csrf
    {{$slot}}

    <div class="w-full flex justify-end">
        <button type="submit">
            <svg class="w-6 h-6 rotate-[65deg] stroke-gray-800 dark:stroke-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
            </svg>
        </button>
    </div>
</form>
