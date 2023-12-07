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
				<div class="alert alert-success" role="alert">
				  success
				</div>
				<div class="alert alert-danger" role="alert">
				  fail
				</div>
			<form action="{{url("cpanel/news/$News->id/update")}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('patch')
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">News title</label>
					<input type="text" value="{{$News->name}}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="enter news title">
			
				</div>
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">News content</label>
					<textarea class="form-control"  id="exampleFormControlTextarea1" name="content" rows="3">{{$News->content}}</textarea>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">written by</label>
					  <select class="form-select" name="id_editor" aria-label="Default select example">
						@foreach($allEditors as $editor)
						<option value="{{$editor->id}}"> {{$editor->name}}</option>
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
							<td><img width="50px" height="50px" class="img-thumbnail" src="{{asset('images').'/'.$News->main_image}}"/>
						<label for="formFileSm" class="form-label">main image</label>
						<input class="form-control form-control-sm" id="formFileSm" name="main_image" type="file">
					</div>
					<div class="col-auto">
						<input  type="submit" class="btn btn-sm btn-danger mb-3 " name="updateNews" value="update news" />
					</div>
					
				</form>
@endSection