@props(['authorName','body','categories'])
<div class="card my-4" style="width: 24rem;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
    <div class="card-header">
        <strong>{{$authorName}}</strong>
    </div>
    <div class="card-body">
        <p class="card-title">
            @foreach($categories as $category)
                <x-category name="{{$category->name}}"/>
            @endforeach
        </p>
        <p class="card-text">{{ $body }}</p>
    </div>
</div>
