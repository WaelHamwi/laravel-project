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
            <th scope="col">name</th>
            <th scope="col">manager in</th>
            <th scope="col">No of News</th>
            <th scope="col">image of editor</th>
            <th scope="col">delete</th>
            <th scope="col">edit</th>
        </tr>
    </thead>
    <tbody>
            @foreach($allEditors as $editor)
        <tr>
        <th scope="row">{{$editor->id}}</th>
        <td>{{$editor->name}}</td>
        @foreach($editor->categories as $category)
        <td>{{$category->name}}</td>
          @endforeach
        <td>{{$editor->has_many->count()}}</td>
        
        <td><img width="50px" height="50px" class="img-thumbnail" src="{{asset('images').'/'.$editor->main_image}}"/>
            <td> 
                    <form  action="{{url("cpanel/editor/$editor->id/delete")}}" method="post" value="deleteEditor">
                    <input class="btn btn-sm btn-danger" type="submit" name="deleteEditor" value="delete" />
                @csrf
                @method('delete')
            </form>
        </td>
           
            
            <td><a href="{{url("cpanel/editor/$editor->id/edit")}}" class="btn btn-sm btn-success">edit</a></td>
        </tr>
        @endforeach

    </tbody>
</table>
@endSection