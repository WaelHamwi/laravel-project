@extends("template.cpanel.admin")
@section("pageTitle", "test page")
@section("content")
		<h3>{{$pageTitle}}</h3>
		@if($errors->any())
		<div class="alert alert-danger" role="alert">
			{{$errors->first()}}
		</div>
	@elseif(session('message'))
		<div class="alert alert-success" role="alert">
			{{session('message')}}
		</div>
	@endif
				<form action="{{url("cpanel/editor/$editor->id/update")}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('patch')
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Editor name</label>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$editor->name}}">
					</div>
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Editor salary</label>
					<input type="text" name="salary" class="form-control" id="exampleFormControlInput1" value="{{$editor->salary}}">
					</div>
					<div class="mb-3">
							<td><img width="50px" height="50px" class="img-thumbnail" src="{{asset('images').'/'.$editor->main_image}}"/>
						<label for="formFileSm" class="form-label">main image</label>
						<input class="form-control form-control-sm" id="formFileSm" name="main_image" type="file">
					</div>
					<div class="col-auto">
						<input  type="submit" class="btn btn-sm btn-danger mb-3 " name="updateEditor" value="update editor" />
					</div>
				</form>
@endSection