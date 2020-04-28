@extends('admin::layouts.master')

@section('page_title')
Category
@stop

@section('content-wrapper')
<div class="content full-page">
	<div class="page-header">
		<div class="page-title">
			<h1>Categories</h1>
		</div>
		<div class="page-action">
			<a href="{{ route('admin.category.create')}}" class="btn btn-lg btn-primary">
				Add Category
			</a>
		</div>
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-sm-12">  
				<table class="table table-striped table-boardered">
					<thead>
						<tr>
							<td>ID</td>
							<td>Name</td>
							<td colspan = 2>Actions</td>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{$category->id}}</td>
							<td>{{$category->name}}</td>
							<td>
								<a href="{{ route('admin.category.edit',$category->id)}}" class="btn btn-primary">Edit</a>
							</td>
							<td>
								<form action="{{ route('admin.category.delete', $category->id)}}" method="post">
									@csrf
									@method('DELETE')
									<button class="btn btn-danger" type="submit">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection