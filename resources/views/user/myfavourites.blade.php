@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : My Favourites</title>
@endsection
@section('content')

@include('user.search')
<div id="content">
  <div class="container">
    @include('flash::message')
    <div class="row">
      @include("user.side_bar")
      <div class="col-sm-9 page-content">
        <div class="inner-box">
          <h2 class="title-2"><i class="fa fa-heart-o"></i> Favourite Ads</h2>
          @if(sizeof($services)>0)
          <div class="table-responsive">
            <div class="adds-wrapper">
              @foreach($services as $service)
              <div class="item-list">
                <div class="col-sm-2 no-padding photobox">
                  <a href="/services/{{$service->id}}/details">
                    <img src="/images/services/service_listing_364x244/{{$service->image}}" alt=""></a>
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
                  <a class="btn btn-warning btn-sm">{{$service->type->name}}</a>
                  <a href="/user/{{$service->id}}/delete-service" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                    <span>Delete</span></a>
                    <a class="btn btn-common btn-sm"> <i class="fa fa-eye"></i> <span>{{$service->views}}</span> </a>
                    <a href="/user/{{$service->id}}/edit-service" class="btn btn-info btn-sm">Edit</a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @else
            <div class="text-center" style="margin-top:50px">
            <h3>No Pending Services available under your account!</h3>
          </div>
            @endif
          </div>
        </div>
        <div class="pagination-bar">
          <ul class="pagination">
            <?php echo $services->render(); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  @endsection
