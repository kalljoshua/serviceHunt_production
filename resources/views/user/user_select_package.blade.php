@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : Select Package</title>
@endsection
@section('content')
@include('user.search')
<div class="page-header" style="background: url(assets/img/banner3.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-title">Pricing Tables</h1>
      </div>
    </div>
  </div>
</div>


<section id="content">

  <section id="pricing-table">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mainHeading">
            <h2 class="section-title">Find a plan that’s right for you.</h2>
          </div>
        </div>
        @foreach($packages as $package)
        <div class="col-sm-3">
          <div class="table">
            <div class="title">
              <h3>{{$package->title}}</h3>
            </div>
            <div class="pricing-header">
              <p class="price-value"> <sup>$</sup>{{$package->price}}/M</p>
              <p class="price-quality">Get Started with ServiceHunt</p>
            </div>
            <ul class="description">
              <li><i class="fa fa-check-square"></i>{{$package->properties}} Free ad posting</li>
              <li><i class="fa fa-check-square"></i>{{$package->featured_listings}}&nbsp;Featured ads availability</li>
              <li><i class="fa fa-check-square"></i>For&nbsp;{{$package->days}}&nbsp;days</li>
              <li><i class="fa fa-check-square"></i>100% Secure!</li>
            </ul>
            <form action="{{route('user.select.package.submit')}}" method="post">
              <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="package_id" value="{{$package->id}}">
                <button class="btn btn-common" type="submit">Purchase Now</button>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

</section>

@endsection
