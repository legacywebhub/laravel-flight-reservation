@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Notifications
@endsection

@section('content')
<!-- ======================= Start Invoice ===================== -->
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">View Invoice</h3>
            </div>
            <div class="tr-single-body">
                    
                <div class="detail-wrapper padd-top-30 padd-bot-30">
        
                    <div class="row text-center">
                        <div class="col-md-12">
                            <a href="javascript:window.print()" class="btn theme-btn">Print this invoice</a>
                        </div>
                    </div>
                    
                    <div class="row mrg-0">
                        <div class="col-md-6">
                            <div id="logo"><img src="assets/img/logo.png" class="img-responsive" alt=""></div>
                        </div>

                        <div class="col-md-6">	
                            <p id="invoice-info">
                                <strong>Order:</strong> #7075872 <br>
                                <strong>Issued:</strong> 17/10/2017 <br>
                                Due 7 days from date of issue
                            </p>
                        </div>
                        
                    </div>
                    
                    <div class="row  mrg-0 detail-invoice">
                    
                        <div class="col-md-12">
                            <h2>INVOICE</h2>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-7">
                                
                                <h4>Supplier: </h4>
                                <h5>Glovia Ltd</h5>
                                <p>
                                    info@glovia.com<br />
                                    
                                    +91-587-936-5876<br />
                                    
                                    780/77 , Lane Here, Chandigarh,
                                    <br /> India
                                </p>
                                
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                <h4>Client Contact :</h4>
                                <h5>Saurav Singh</h5>
                                <p>
                                    sauravmail87@gmail.com<br />
                                    
                                    +91-587-936-5876<br />
                                    
                                    780/77 , Gurudwara Chauk, Allahabad,
                                    <br /> India
                                </p>
                                </div>
                            </div>
                        </div>
                        <hr />
                        
                        <div class="col-12 col-md-12">
                            <strong>ITEM DESCRIPTION & DETAILS :</strong>
                        </div>
                        <hr>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="invoice-table">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Project</th>
                                                <th>Time</th>
                                                <th>Team</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Front End Design</td>
                                                <td>1 Month</td>
                                                <td>5000 USD</td>
                                                <td>5000 USD</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Software Development</td>
                                                <td>2Month</td>
                                                <td>5000 USD</td>
                                                <td>10000 USD</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div>
                                    <h5>Total : 700 USD </h5>
                                </div>
                                <hr>
                                <div>
                                    <h5>Taxes : 220 USD ( 20 % on Total Bill ) </h5>
                                </div>
                                <hr>
                                <div>
                                    <h4>Bill Amount : 920 USD </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- ======================= End  Invoice===================== -->
@endsection