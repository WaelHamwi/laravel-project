@extends("template.cpanel.admin")
@section("pageTitle", "{$pageTitle}")
@section("content")
		<h3>Add new editor</h3>
		@if($errors->any())
			<div class="alert alert-danger" role="alert">
				{{$errors->first()}}
			</div>
		@elseif(session('message'))
			<div class="alert alert-success" role="alert">
				{{session('message')}}
			</div>
		@endif
		
				<form action="{{url('cpanel/editor/store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Editor name</label>
					  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="enter editor name">
					</div>
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Editor salary</label>
					  <input type="text" name="salary" class="form-control" id="exampleFormControlInput1" placeholder="enter editor salary">
					</div>
					<div class="mb-3">
						<label for="formFileSm" class="form-label">main image</label>
						<input class="form-control form-control-sm" id="formFileSm" name="main_image" type="file">
					</div>
					<div class="col-auto">
						<input  type="submit" class="btn btn-sm btn-danger mb-3 " name="addEditor" value="add editor" />
					</div>
				</form>
@endSection