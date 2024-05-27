@extends('landing.layout') 

@section('title')
{{ $company->name }} | Invoice
@endsection

@section('content')		  
<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Booking Invoice			
				</h1>	
				<p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="javascript:void(0);"> Invoice</a></p>
			</div>	
		</div>
	</div>
</section>
<!-- End banner Area -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Invoice</h2><h3 class="float-right">Order # 12345</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Billed To:</strong><br>
                        John Smith<br>
                        1234 Main<br>
                        Apt. 4B<br>
                        Springfield, ST 54321
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Shipped To:</strong><br>
                        Jane Smith<br>
                        1234 Main<br>
                        Apt. 4B<br>
                        Springfield, ST 54321
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** 4242<br>
                        john@example.com
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        March 7, 2024<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Order summary</strong></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Flight Ticket</td>
                                    <td class="text-center">$400.00</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right">$400.00</td>
                                </tr>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">$400.00</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Tax</strong></td>
                                    <td class="no-line text-right">$32.00</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">$432.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection