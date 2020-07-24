@extends('layouts.main')
@section('content')

<?php $segment = Request::segments(); ?>


<main class="my-cart">
	<!-- banner start -->
	<div class="banner">
		<div class="container">
		</div>
	</div>
	<!-- banner end -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        
<div class="top-prog-sec top-prog-sec2">		
		<div class="clearfix"></div>
<section class="checkoutSec">
<div class="container">
    <div class="row">
	<div class="invoice-title">
		<h2>  Order # {{$order->id}}</h2>
	</div>
	<hr>
        <div class="for-custom-width">
			
    		<div class="row">
    			<div class="col-md-2 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					{{$order->delivery_first_name}} {{$order->delivery_last_name}}<br>
    					{{$order->delivery_address_1}}
    					{{$order->delivery_address_2}}
							{{$order->delivery_country}} {{$order->delivery_city}}, {{$order->area}}, {{$order->landmark}}
    				</address>
    			</div>
    		</div>
			<div class="row">
					<div class="col-md-10">
						<address>
						@if($order->transaction_id != '')
							<strong>Transaction ID:</strong><br>
							{{$order->transaction_id}}<br>
							@endif
							<strong>Order Email:</strong><br>
							{{$order->order_email}}
						</address>
					</div>
					<div class="col-md-2 text-right">
						<address>
							<strong>Order Date:</strong><br>
							{{date('F d, Y',strtotime($order->created_at))}}<br><br>
						</address>
					</div>
				</div>
			<div class="row">
			
    			<div class="col-md-10">
				<address>
    				<strong>Order Notes:</strong><br>
    				<p>{{$order->order_notes}}</p>
				</address>
    			</div>
    		</div>


    
    	</div>
    </div>	
</div>
</section>
</div>
        <br/>
		<div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed table1">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
								<?php $subtotal  = 0;?>
    							@foreach($order_products as $order_product)
									<tr>
										<td>{{$order_product->order_products_name}}</td>
										<td class="text-center">${{$order_product->order_products_price}}</td>
										<td class="text-center">{{$order_product->order_products_qty}}</td>
										<td class="text-right">${{$order_product->order_products_subtotal}}</td>
									</tr>
									<?php $subtotal+= $order_product->order_products_qty * $order_product->order_products_price; ?>
								@endforeach
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">${{ $subtotal }}</td>
    							</tr>
								
								<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Shipping</strong></td>
    								<td class="thick-line text-right">${{$order->order_shipping}}</td>
    							</tr>
								
								<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Discount</strong></td>
    								<td class="thick-line text-right">${{$order->discount}}</td>
    							</tr>
								
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
									<?php 
										$shipping = $order->order_shipping ;
										
									?>
    								<td class="no-line text-right">${{$order->order_total  + $shipping }}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>


                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    
</main>



@endsection
@section('css')
<style type="text/css">
.invoice-title h2, .invoice-title h3 {
	display: inline-block;
}
.table > tbody > tr > .no-line {
	border-top: none;
}
.table > thead > tr > .no-line {
	border-bottom: none;
}
.table > tbody > tr > .thick-line {
	border-top: 2px solid;
}

address {
    margin-bottom: 20px;
    font-style: normal;
    line-height: 1.42857143;
    text-align: left;
    color: #000;
}
.table1>tbody>tr>td {
    padding: 15px;
    color: #000;
}
.for-custom-width {
    width: 96%;
    margin: 0 auto;
}

	.panel {
    display: block !important;
}
</style>
@endsection
@section('js')

<script type="text/javascript">



</script>

@endsection