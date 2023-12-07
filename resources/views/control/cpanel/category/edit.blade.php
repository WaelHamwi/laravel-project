@extends("template.cpanel.admin")
@section("pageTitle", "test page")
@section("content")
		<h3>Add new category</h3>
		@if($errors->any())
		<div class="alert alert-danger" role="alert">
			{{$errors->first()}}
		</div>
	@elseif(session('message'))
		<div class="alert alert-success" role="alert">
			{{session('message')}}
		</div>
	@endif
<form action="{{url("cpanel/category/$category->id/update")}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('patch')
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Category name</label>
					<input type="text" value="{{$category->name}}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="enter category name">
					</div>
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">managed by</label>
					  <select class="form-select" name="id_manager" aria-label="Default select example">
						
							@foreach($allEditors as $editor)
							@if($category->id_manager==$editor->id)
						<option selected="selected" value="{{$editor->id}}">{{$editor->name}}</option>
							@else
							<option value="{{$editor->id}}">{{$editor->name}}</option>
							@endif
							@endforeach
						</select>
						
					</div>
					<div class="mb-3">
							<td><img width="50px" height="50px" class="img-thumbnail" src="{{asset('images').'/'.$category->main_image}}"/>
						<label for="formFileSm" class="form-label">main image</label>
						<input class="form-control form-control-sm" id="formFileSm" name="main_image" type="file">
					</div>
					<div class="col-auto">
						<input  type="submit" class="btn btn-sm btn-danger mb-3 " name="updateCategory" value="update category" />
					</div>
				</form>
@endSection