@extends("template.cpanel.admin")
@section("content")
		<h3>Show all categories</h3>
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
						<th scope="col">image</th>
						<th scope="col">name</th>
						<th scope="col">managed by</th>
						<th scope="col">time created</th>
						<th scope="col">no of news</th>
						<th scope="col">delete</th>
						<th scope="col">edit</th>
					</tr>
				  </thead>
				  <tbody>
						@foreach($allCategories as $category)
					<tr>
					<th scope="row">{{$category->id}}</th>
					<td><img width="50px" height="50px" class="img-thumbnail" src="{{asset('images').'/'.$category->main_image}}"/>
					<td>{{$category->name}}</td>
					<td>{{$category->id_manager}}</td>
					<td>{{$category->created_at->diffForHumans()}}</td>
					<td>{{$category->news->count()}}</td>
											 <td>
													<form  action="{{url("cpanel/category/$category->id/delete")}}" method="post" value="delete">
														@csrf
														@method('delete')
														<input class="btn btn-sm btn-danger" type="submit"  value="delete" >
													</form> 
											 </td>
					
											<td><a href="{{url("cpanel/category/$category->id/edit")}}" class="btn btn-sm btn-success">edit</a></td>
					</tr>
					@endforeach
					
				  </tbody>
				</table>
@endSection