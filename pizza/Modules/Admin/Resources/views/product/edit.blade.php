@extends('admin::layouts.master')

@section('page_title')
Product
@stop

@section('content-wrapper')
<div class="content full-page">
	<div class="page-header">
		<div class="page-title">
			<h1>Update a Product</h1>
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
					<form method="post" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
						@method('PATCH') 
						@csrf
						<div class="form-group">    
							<label for="name">Name:</label>
							<input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
						</div>
						<div class="form-group">    
							<label for="description">Description:</label>
							<input type="text" class="form-control" name="description" value="{{ $product->description }}"/>
						</div>
						<div class="form-group">    
							<label for="price">Price:</label>
							<input type="text" class="form-control" name="price" value="{{ $product->price }}"/>
						</div>
						<div class="form-group">    
							<label for="price">Type:</label>
							<select class="form-control" name="type">
				              	<option>Please Select Type</option>
				              	<option value="Veg" {{($product->type=='Veg')?'selected':''}}>Veg</option>
				              	<option value="Non-Veg" {{($product->type=='Non-Veg')?'selected':''}}>Non-Veg</option>
			              	</select>
						</div>
						<div class="form-group">    
			              <label for="filename">Select Image:</label>
			              <input type="file" class="form-control" name="filename"/>
			            </div>
						<div class="form-group">    
			              <label for="status">Status:</label>
			              <input type="checkbox" class="form-check" name="status" value='{{$product->status}}' {{ $product->status == 1 ? 'checked' : '' }}/>
			            </div>

						<button type="submit" class="btn btn-primary-outline">Update Product</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop