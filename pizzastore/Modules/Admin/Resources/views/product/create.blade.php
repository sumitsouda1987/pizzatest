@extends('admin::layouts.master')

@section('page_title')
Product
@stop

@section('content-wrapper')
<div class="content full-page">
  <div class="page-header">
    <div class="page-title">
      <h1>Add a Product</h1>
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
          <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">    
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"/>
            </div>
            <div class="form-group">    
              <label for="category_id">Category:</label>
              <select class="form-control" name="category_id">
              	<option>Please Select Category</option>
              	<?php
              		if(!empty($categories))
              		foreach($categories as $cat){
              			echo "<option value='".$cat['id']."'>".$cat['name']."</option>";
              		}
              	?>
              </select>
            </div>
            <div class="form-group">    
              <label for="price">Price:</label>
              <input type="text" class="form-control" name="price"/>
            </div>
            <div class="form-group">    
              <label for="filename">Select Image:</label>
              <input type="file" class="form-control" name="filename"/>
            </div>
            <div class="form-group">    
              <label for="status">Status:</label>
              <input type="checkbox" class="form-check" name="status" value='1'/>
            </div>
            <button type="submit" class="btn btn-primary-outline">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop