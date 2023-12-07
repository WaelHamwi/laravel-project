@extends("template.cpanel.admin")
@section("pageTitle", "test page")
@section("content")
    <h3>Statstics</h3>
				<table class="table table-striped table-hover table-bordered table-sm">
				  <thead>
					<tr>
					  <th scope="col">type</th>
					  <th scope="col">value</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>no of editor</th>
						<td>{{$noOfEditors}}</td>
					</tr>
					<tr>
					  <td>no of categories</th>
					  <td>{{$noOfNews}}</td>
					</tr>
					<tr>
					  <td>no of news</th>
					  <td>{{$noOfCategories}}</td>
					</tr>
				  </tbody>
				</table>
@endSection