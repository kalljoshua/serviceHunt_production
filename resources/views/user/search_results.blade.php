@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : Search Results</title>
@endsection
@section('content')

@include('user.search')
<div class="main-container">
  <div class="container">
    <div class="row">
      @include('user.side_categories')

      <div class="col-sm-9 page-content">

      @if(sizeof($services)>0)
      <div class="product-filter">
        <div class="grid-list-count">
          <a class="list switchToGrid" href="##"><i class="fa fa-list"></i></a>
          <a class="grid switchToList" href="##"><i class="fa fa-th-large"></i></a>
        </div>
        <div class="short-name">
          <span>Short By</span>
          <form class="name-ordering" method="post">
            <label>
              <select name="order" class="orderby">
                <option selected="selected" value="menu-order">Short by</option>
                <option value="popularity">Price: Low to High</option>
                <option value="popularity">Price: High to Low</option>
              </select>
            </label>
          </form>
        </div>
        <div class="Show-item">
          <span>Show Items</span>
          <form class="woocommerce-ordering" method="post">
            <label>
              <select name="order" class="orderby">
                <option selected="selected" value="menu-order">49 items</option>
                <option value="popularity">popularity</option>
                <option value="popularity">Average ration</option>
                <option value="popularity">newness</option>
                <option value="popularity">price</option>
              </select>
            </label>
          </form>
        </div>
      </div>

      <div class="adds-wrapper">
        @foreach($services as $service)
        <div class="item-list">
          <div class="col-sm-2 no-padding photobox">
            <div class="add-image">
              <a href="##"><img src="/client_inc/assets//img/item/img-1.jpg" alt=""></a>
              <span class="photo-count"><i class="fa fa-camera"></i>2</span>
            </div>
          </div>
          <div class="col-sm-7 add-desc-box">
            <div class="add-details">
              <h5 class="add-title"><a href="/services/{{$service->id}}/details">{{$service->title}}</a></h5>
              <div class="info">
                <span class="date">
                  <i class="fa fa-clock"></i>
                  <?php echo date_format($service->created_at, 'G:ia Y-m-d');?>
                </span> -
                <span class="category">{{$service->sub_category->category->name}}</span> -
                <span class="item-location"><i class="fa fa-map-marker"></i>{{$service->district}}</span>
              </div>
              <div class="item_desc">
                <a href="##">
                  {{ str_limit($service->description, $limit = 70, $end = '...') }}
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-3 text-right  price-box">
            <a class="btn btn-danger btn-sm">{{$service->type->name}}</a>
            <a class="btn btn-danger btn-sm"><i class="fa fa-certificate"></i>
              <span>Top Ads</span></a>
              <a class="btn btn-common btn-sm"> <i class="fa fa-eye"></i> <span>{{$service->views}}</span> </a>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <div class="text-center" style="margin-top:50px">
        <h3>No Services match your search details, please narrow down your search!</h3>
      </div>
        @endif


        <div class="pagination-bar">
          <ul class="pagination">
            <?php echo $services->render(); ?>
          </ul>
        </div>

        <div class="post-promo text-center">
          <h2> Do you have anything to Advertise ? </h2>
          <h5>Advertise your products online FOR FREE. It's easier than you think !</h5>
          <a href="{{route('user.select.package')}}" class="btn btn-post btn-danger">Post a Free Ad </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
