@extends("template.front.master")
@section("pageTitle", "test page")
@section("content")
<h3></h3>
@foreach($News as $news) 

<div class="col-md-4">
    <div class="card">
    <img src="{{asset('images').'/'.$news->main_image}}" width="200px" height="300px" class="card-img-top" alt="...">
        <div class="card-body">
                <h5 class="card-title">{{$news->name}}</h5>
                <p class="card-text">{{$news->content}}</p>
                <a href="{{url("front/$news->id/news")}}" class="btn btn-primary">Go news info</a>
        </div>
    </div>
</div>
@endforeach


@endSection