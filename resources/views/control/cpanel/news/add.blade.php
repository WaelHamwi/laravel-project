@extends("template.cpanel.admin")
@section("pageTitle", "test page")
@section("content")
   <h3>Add new News</h3>
	 @if($errors->any())
	 <div class="alert alert-danger" role="alert">
		 {{$errors->first()}}
	 </div>
 @elseif(session('message'))
	 <div class="alert alert-success" role="alert">
		 {{session('message')}}
	 </div>
 @endif
			<form action="{{url("cpanel/news/store")}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">News title</label>
					  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="enter news title">
					</div>
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">News content</label>
					  <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">written by</label>
						
					  <select class="form-select" name="id_editor" aria-label="Default select example">
							@foreach($allEditors as $editor)
						<option value="{{$editor->id}}">{{$editor->name}}</option>
						@endforeach 
						</select>
					</div>
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">belong to</label>
					  <select class="form-select" name="id_category" aria-label="Default select example">
							@foreach($allCategories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label for="formFileSm" class="form-label">main image</label>
						<input class="form-control form-control-sm" id="formFileSm" name="main_image" type="file">
					</div>
					<div class="col-auto">
						<input  type="submit" class="btn btn-sm btn-danger mb-3 " name="addNews" value="add news" />
					</div>
					
				</form>
@endSection