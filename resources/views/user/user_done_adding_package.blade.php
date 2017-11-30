@extends('...layouts.userLayout')
@section('title')
  <title>Service Hunt : Thank you for your business</title>
@endsection
@section('content')
<!--start section page body-->
    <section id="section-body">
        <div class="container">
            <div class="membership-page-top">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="membership-page-title">
                            <h1 class="page-title"> Complete your order </h1>
                            <p class="page-subtitle"> Please send your payment to complete your upload on the system! </p>
                        </div>
                        <ol class="pay-step-bar">
                            <li class="pay-step-block"><a href="add-new-property.html">1. Listing</a></li>
                            <li class="pay-step-block"><a href="listing-select-package.html">2. <span class="hidden-xs">Select</span> Package</a></li>
                            <li class="pay-step-block"><a href="listing-payment.html">3. Payment</a></li>
                            <li class="pay-step-block active"><span>4. Done</span></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="membership-content-area">
                <div class="membership-done-block white-block">
                    <div class="done-block-inner">
                        <div class="done-icon"><i class="fa fa-check"></i></div>
                        <h2> Thank you for advertising with us! </h2>
                        <p> Hello "". Thank you for adding your property to e-Nyumbani. To have your listing published on the platform, please meke the payment worth the category selected
							to one of the following Mobile Money Numbers: 0775745803-Moses Tindyebwa or 0700137928-Nakana Joshua.</br> 
							NOTE: Please indicate the name of the property as the "REASON" while sending the money.</p>
                        <a href="{{route('user.profile')}}" class="btn btn-primary btn-long"> Go to Dashboard </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section page body-->
@endsection
