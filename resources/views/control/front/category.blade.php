@extends("template.front.master")
@section("pageTitle", "test page")
@section("content")
<h3>{{$pageTitle}}</h3>
<form action="{{url("cpanel/category/search")}}">
        <div class="form-group">
          <label for="exampleInputEmail1">search for news</label>
          <input type="text" name="search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your search">
          <small id="emailHelp" class="form-text text-muted">searching</small>
        </div>  
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@foreach($allCategories as $category)
<div class="col-md-4">
    <div class="card">
        <img src="{{asset('images').'/'.$category->main_image}}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 style="text-align:center" class="card-title">{{$category->name}}</h5>
        <p class="card-text" style="text-align:center">{{$category->id_manager}}</p>
        <p class="card-text" style="text-align:center">{{$category->created_at->diffForHumans()}}</p>
        <a href="{{url("front/$category->id/category")}}" style="margin-left:70px" class="btn btn-primary">Go to news category</a>
        </div>
    </div>
</div>
@endforeach
@endSection