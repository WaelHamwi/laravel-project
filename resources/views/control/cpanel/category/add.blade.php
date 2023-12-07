@extends("template.cpanel.admin")

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
				<form action="{{url("/cpanel/category/store")}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Category name</label>
					  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="enter category name">
					</div>
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">managed by</label>
					  <select class="form-select" name="id_manager" aria-label="Default select example">
							@foreach($allEditors as $editor)
						<option name="editor" value="{{$editor->id}}">{{$editor->name}}</option>
						  @endforeach
						</select>
					</div>
					<div class="mb-3">
						<label for="formFileSm" class="form-label">main image</label>
						<input class="form-control form-control-sm" id="formFileSm" name="main_image" type="file">
					</div>
					<div class="col-auto">
						<input  type="submit" class="btn btn-sm btn-danger mb-3 " name="addCategory" value="add category" />
					</div>
				</form>
@endSection