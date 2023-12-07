@extends("template.front.master")
@section("pageTitle", "test page")
@section("content")
<h3>{{$pageTitle}}</h3>
<img src="{{asset('images').'/'.$news->main_image}}" width="400px" height="400px" class="" alt="...">
<p>
{{$news->content}}
</p>
@endSection