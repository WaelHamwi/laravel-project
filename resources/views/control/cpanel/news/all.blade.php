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
				<table class="table table-striped table-hover table-bordered table-sm">
				  <thead>
					<tr>
					  <th scope="col">#</th>
						<th scope="col">title</th>
						<th scope="col">main image</th>
						<th scope="col">written by</th>
						<th scope="col">belong to</th>
						<th scope="col">delete</th>
						<th scope="col">edit</th>
					</tr>
				  </thead>
				  <tbody>
						

							@foreach($allNews as $news)
					<tr>
					<th scope="row">{{$news->id}}</th>
						<td>{{$news->name}}</td>

						<!--<td><img class="img-thumbnail" src="https://placehold.jp/60x60.png"/></td>-->
					<td><img width="50px" height="50px" class="img-thumbnail" src="{{asset('images').'/'.$news->main_image}}"/>
						<td>{{$news->belongs_to->name}}</td>
						<td>{{$news->category->name}}</td>
					<td>
							<form action="{{url("cpanel/news/$news->id/delete")}}" method="POST">
								@csrf
								@method('delete')
								<input type="submit" class='btn btn-sm btn-danger' value="delete">
							</form>
					</td>
				
				
						<td><a href="{{url("cpanel/news/$news->id/show")}}" class="btn btn-sm btn-success">edit</a></td>
					</tr>
					@endforeach
				  </tbody>
				</table>
@endSection