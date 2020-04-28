@extends('admin::layouts.master')

@section('page_title')
Category
@stop

@section('content-wrapper')
<div class="content full-page">
	<div class="page-header">
		<div class="page-title">
			<h1>Update a Category</h1>
		</div>
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-sm-8">
				<div>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div><br />
					@endif
					<form method="post" action="{{ route('admin.category.update', $category->id) }}">
						@method('PATCH') 
						@csrf
						<div class="form-group">    
							<label for="name">Category Name:</label>
							<input type="text" class="form-control" name="name" value="{{ $category->name }}"/>
						</div>

						<button type="submit" class="btn btn-primary-outline">Update category</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop