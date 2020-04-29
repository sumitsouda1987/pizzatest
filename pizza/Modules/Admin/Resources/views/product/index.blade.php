@extends('admin::layouts.master')

@section('page_title')
Product
@stop

@section('content-wrapper')
<div class="content full-page">
	<div class="page-header">
		<div class="page-title">
			<h1>Products</h1>
		</div>
		<div class="page-action">
			<a href="{{ route('admin.product.create')}}" class="btn btn-lg btn-primary">
				Add Product
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
							<td>Description</td>
							<td>Category</td>
							<td>Price</td>
							<td>Type</td>
							<td>Status</td>
							<td>Image</td>
							<td colspan = 2>Actions</td>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td>{{$product->id}}</td>
							<td>{{$product->name}}</td>
							<td>{{$product->description}}</td>
							<td>{{$product->categories->name}}</td>
							<td>${{$product->price}}</td>
							<td>{{$product->type}}</td>
							<td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
							<td><img src="{{ asset('uploads/'.$product->filename) }}" style="width: 70px;height: 50px;" /></td>
							<td>
								<a href="{{ route('admin.product.edit',$product->id)}}" class="btn btn-primary">Edit</a>
							</td>
							<td>
								<form action="{{ route('admin.product.delete', $product->id)}}" method="post">
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