@extends("template.front.master")
@section("pageTitle", "test page")
@section("content")
@if($news)
@foreach ($news as $news1)
<div class="col-md-4">
    <div class="card">
        <img width="300px" height="300px" src="{{asset('images').'/'.$news1->main_image}}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title" style="text-align:center">{{ $news1->name }}</h5>
        <p class="card-text" style="text-align:center">{{$news1->content}}</p>
        <p class="card-text" style="text-align:center">{{$news1->created_at->diffForHumans()}}</p>
        
        
        </div>
    </div>
</div>

@endforeach
@else 
<div>
    <h2>No news found</h2>
</div>
@endif
@endSection