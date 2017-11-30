<?php //echo $service->company->sub_category_id; exit;?>
@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : Ads-Details</title>
@endsection
@section('content')
@include('user.search')
<div id="content">
  <div class="container">
    <div class="row">
      @include('flash::message')
      <div class="product-info">
        <div class="col-sm-8">
          <div class="inner-box ads-details-wrapper">
            <h2>{{$service->title}}</h2>
            <p class="item-intro"><span class="poster">Advertised by </span>
              <span class="ui-bubble is-member">{{$service->user->first_name}}</span>
              <span class="date"> <?php echo date_format($service->created_at, 'd-M G:ia');?></span> from
              <span class="location">{{$service->town}} </span></p>
          </div>
          <div class="box">
            <h2 class="title-2"><strong>Ad Details</strong></h2>
            <div class="row">
              <div class="ads-details-info col-md-7">
                <p class="mb15">{{$service->description }}</p>

              </div>
              <div class="col-md-5">
                <aside class="panel panel-body panel-details">
                  <ul>
                    <li>
                      <p class=" no-margin "><strong>Company:</strong> {{$service->company->name}}</p>
                    </li>
                    <li>
                      <p class="no-margin"><strong>Sub Category:</strong> <a href="##">{{$service->company->sub_category->name}}</a>, <a href="##">For sale</a></p>
                    </li>
                    <li>
                      <p class="no-margin"><strong>Working Hours:</strong> <a href="##">{{$service->company->opening_time}}</a> to <a href="##">{{$service->company->closing_time}}</a></p>
                    </li>
                    <li>
                      <p class=" no-margin "><strong>Email Address:</strong> {{$service->company->email}}</p>
                    </li>
                    <li>
                      <p class="no-margin"><strong>Type:</strong> <a href="##"> {{$service->company->type->name}}</a></p>
                    </li>
                  </ul>
                </aside>
                <div class="ads-action">
                  <ul class="list-border">
                    <li>
                      <a href="##"> <i class=" fa fa-phone"></i> {{$service->company->telephone}} </a></li>
                    <li>
                    <li>
                      <a href="##">Posted by <i class=" fa fa-user"></i> {{$service->user->first_name}}</a></li>
                    <li>
                      <a href="##"> <i class=" fa fa-heart"></i> Save ad</a></li>
                    <li>
                      <a href="##"> <i class="fa fa-share-alt"></i> Share </a>
                      <div class="social-link">
                        <a class="twitter" target="_blank" data-original-title="twitter" href="##" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
                        <a class="facebook" target="_blank" data-original-title="facebook" href="##" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
                        <a class="google" target="_blank" data-original-title="google-plus" href="##" data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
                        <a class="linkedin" target="_blank" data-original-title="linkedin" href="##" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="clr"><br></div>
          <div class="box">
            <h2 class="title-2"><strong>Company Reviews and Comments</strong></h2>
            <div class="row">

              <div id="contact-info" class="detail-contact detail-block target-block">
                @foreach(App\Review::where('company_id', $service->company->id)->orderBy('created_at','DESC')->take(4)->get() as $reviews)
                  <div class="media-left">
                    <a href="#">
                      <img src="/client_inc/assets/img/user.jpg" class="media-object" alt="image" width="74" height="74">
                    </a>
                  </div>
                  <div class="media-body">
                    <ul>
                      <li><i class="fa fa-user"></i> {{$reviews->user->first_name}} {{$reviews->user->last_name}}</li>

                      <li>
                        <div class="rating">
                                    <span class="bottom-ratings">
                                      @for ($k=1; $k <= 5 ; $k++)
                                        <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                        <span class="glyphicon glyphicon-star{{ ($k <= $service->company->rating) ? '' : '-empty'}}">
                                        </span>
                                        </span>
                                    </span>
                          @endfor
                        </div>
                      </li>
                      <li>
                        <p>{{$reviews->review}}</p>
                      </li>
                    </ul>
                  </div>
                @endforeach
              </div>




            </div>
          </div>
        </div>

        @include('user.right_bar')
      </div>
    </div>
  </div>


  <section class="featured-lis mb30">
    <div class="container">
      <div class="row">
        <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
          <h3 class="section-title">Related Products</h3>
          <div id="new-products" class="owl-carousel">

            @foreach(App\Company::where('sub_category_id', $service->company->sub_category_id)->orderBy('created_at','DESC')->take(5)->get() as $related)
              <div class="item">
                <div class="product-item">
                  <div class="carousel-thumb">
                    <img src="/images/services/latest_home_and_best_services_355x240/{{$service->company->image}}" alt="">
                    <div class="overlay">
                      <a href="/services/{{$related->id}}/details"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                  <a href="/services/{{$related->id}}/details" class="item-name">{{$related->name}}</a>
                  <div class="rating">
                                    <span class="bottom-ratings">
                                      @for ($k=1; $k <= 5 ; $k++)
                                        <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                        <span class="glyphicon glyphicon-star{{ ($k <= $related->rating) ? '' : '-empty'}}"></span>
                                            </span>
                                    </span>
                    @endfor
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
