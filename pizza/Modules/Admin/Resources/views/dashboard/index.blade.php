@extends('admin::layouts.master')

@section('page_title')
Dashboard
@stop

@section('content-wrapper')
<style type="text/css">
	.hiddentablerow{
		padding: 0px 0px !important;
	}
	.accordian-body{
		padding: 30px;
    	background-color: beige;
	}
</style>
<div class="content full-page">
	<div class="page-header">
		<div class="page-title">
			<h1>Orders</h1>
		</div>
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-sm-12">  
				<table class="table">
					<thead>
						<th class="">Customer Name</th>
						<th class="">Customer Email</th>
						<th class="">Customer Phone</th>
						<th class="">Total Quantity</th>
						<th class="">Grand Total</th>
					</thead>

					<tbody>
						@foreach($orders as $order)
							<tr data-toggle="collapse" data-target="#00{{$order->id}}" class="accordion-toggle">
								<td class="">{{$order->user->name}}</td>
								<td class="">{{$order->customer_email}}</td>
								<td class="">{{$order->customer_phone}}</td>
								<td class="">{{$order->total_quantity}}</td>
								<td class="">${{$order->grand_total}}</td>
							</tr>
							<tr>
								<td colspan="5" class="hiddentablerow">
									<div class="accordian-body collapse" id="00{{$order->id}}">
										<div>
											<h5>Delivery Address</h5>
											<label>{{$order->customer_address_title}}</label>
											<span>{{$order->customer_address.', '.$order->customer_state.', '.$order->customer_city.', '.$order->customer_postcode.', Phone No-'.$order->customer_phone}}</span>
										</div>
										<div>
											<h5>Ordered Items</h5>
											<table class="table">
												<thead>
													<th class="">Product Name</th>
													<th class="">Quantity</th>
													<th class="">Price</th>
													<th class="">Total Price</th>
												</thead>
												<tbody>
													@foreach($order->order_items as $items)
														<tr>
															<td>{{$items->product->name}}</td>
															<td>{{$items->quantity}}</td>
															<td>{{$items->price}}</td>
															<td>{{$items->total_price}}</td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</td>
							</tr>
						@endforeach						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.accordion-toggle:first').trigger('click');
</script>
@endsection