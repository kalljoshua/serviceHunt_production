<?php
$user = App\User::find($company->user_id);
//$id = Auth::guard('user')->user()->id;
//echo $id;
//$url = Request::url();
//echo Request::url();;
//exit;

?>

@extends('...layouts.userLayout')
@section('title')
    <title>Service Hunt : {{$company->name}}-Details</title>
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
                            <h2>{{$company->name}}</h2>

                            <span class="bottom-ratings">
                                                        Rating:
                                @for ($k=1; $k <= 5 ; $k++)
                                    <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $company->rating) ? '' : '-empty'}} text-orange"></span>
                                                            </span>
                                @endfor
                                                    </span>
                            &nbsp;&nbsp;
                            Views: ({{$company->views}})
                            &nbsp;&nbsp;
                            @if(Auth::guard('user')->user())
                                @if(Auth::guard('user')->user()->id==$user->id)
                                    <a href="/company/{{$company->slug}}/edit" class="btn text-right btn-info btn-sm">Edit</a>
                                @endif
                            @endif
                            &nbsp;&nbsp;
                            <p class="item-intro"><span class="poster">For sale by</span>

                                <span class="ui-bubble is-member">{{$user->first_name}}</span>
                                <span class="date"> <?php echo date_format($company->created_at, 'd-M G:ia');?></span>
                                from
                                <span class="location">{{$company->district}} </span></p>

                            <div id="owl-demo" class="owl-carousel owl-theme">
                                <div class="item">
                                    <img src="/images/services/latest_home_and_best_services_355x240/{{$company->image}}"
                                         alt="">
                                </div>
                                <div class="item">
                                    <img src="/images/services/latest_home_and_best_services_355x240/{{$company->image}}"
                                         alt="">
                                </div>
                                <div class="item">
                                    <img src="/images/services/latest_home_and_best_services_355x240/{{$company->image}}"
                                         alt="">
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <h2 class="title-2"><strong>Company Details</strong>

                            </h2>

                            <div class="row">
                                <div class="ads-details-info col-md-7">
                                    <p class="mb15">{{$company->description }}</p>
                                    <h4>Services</h4>
                                    <ul class="list-circle">
                                        @foreach($company->services as $service)
                                            <li><i class="fa fa-check-circle"></i>
                                                <a href="/services/{{$service->id}}/details">{{$service->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-5">
                                    <aside class="panel panel-body panel-details">
                                        <ul>

                                            <li>
                                                <p class="no-margin"><strong>Phone Number:</strong>
                                                    <a href="#"> {{$company->telephone}} </a></p></li>
                                            <li>
                                            <li>
                                                <p class="no-margin"><strong>Working Hours:</strong>
                                                    <a href="#">{{$company->opening_time}}</a> to <a
                                                            href="#">{{$company->closing_time}}</a></p>
                                            </li>
                                            <li>
                                                <p class=" no-margin "><strong>Email
                                                        Address:</strong> {{$company->email}}</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Location:</strong>
                                                    <a href="#"> {{$company->district}}</a></p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <li>
                                                <a href="#"> <i
                                                            class=" fa fa-phone"></i> {{$user->phone}} </a></li>
                                            <li>
                                            <li>
                                                <a href="#">Posted by <i class=" fa fa-user"></i> {{$user->first_name}}
                                                </a></li>
                                            <li>
                                                <a href="#"> <i class=" fa fa-heart"></i> Save ad</a></li>
                                            <li>
                                                <a href="#"> <i class="fa fa-share-alt"></i> Share </a>
                                                <div class="social-link">
                                                    <a class="twitter" target="_blank" data-original-title="twitter"
                                                       href="https://twitter.com/intent/tweet?url={{Request::url()}}"
                                                       data-toggle="tooltip" data-placement="top"><i
                                                                class="fa fa-twitter"></i></a>
                                                    <a class="facebook" target="_blank" data-original-title="facebook"
                                                       href="https://www.facebook.com/sharer.php?u={{Request::url()}}"
                                                       data-toggle="tooltip" data-placement="top"><i
                                                                class="fa fa-facebook"></i></a>
                                                    <a class="google" target="_blank" data-original-title="google-plus"
                                                       href="https://plus.google.com/share?url={{Request::url()}}"
                                                       data-toggle="tooltip" data-placement="top"><i
                                                                class="fa fa-google"></i></a>
                                                    <a class="linkedin" target="_blank" data-original-title="linkedin"
                                                       href="https://www.linkedin.com/shareArticle?url={{Request::url()}}&title={{$company->name}}"
                                                       data-toggle="tooltip" data-placement="top"><i
                                                                class="fa fa-linkedin"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clr"><br></div>
                        <div class="box">
                            <h2 class="title-2"><strong>Reviews and Comments</strong></h2>
                            <div class="row">
                                <div id="contact-info" class="detail-contact detail-block target-block">
                                    @foreach(App\Review::where('company_id', $company->id)->orderBy('created_at','DESC')->take(4)->get() as $reviews)
                                        <div class="media-left">
                                            <a href="#">
                                                <img src="/client_inc/assets/img/user.jpg" class="media-object"
                                                     alt="image" width="74" height="74">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-user"></i>
                                                    @if(sizeof($reviews->user)>0)
                                                        {{$reviews->user->first_name}} {{$reviews->user->last_name}}
                                                    @else
                                                        Anonymous
                                                    @endif
                                                </li>

                                                <li>
                                                    <div class="rating">
                                                    <span class="bottom-ratings">
                                                      @for ($k=1; $k <= 5 ; $k++)
                                                            <span data-title="Average Rate: 5 / 5"
                                                                  class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $reviews->company->rating) ? '' : '-empty'}}"></span>
                                                            </span>
                                                        @endfor
                                                    </span>

                                                    </div>
                                                </li>
                                                <li>
                                                    <p>{{$reviews->review}}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>

                                <form method="post" action="{{route('user.review.submit')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="company_id" value="{{ $company->id }}">

                                    <div class="row" style="padding-left:15px;">
                                        <div class="col-sm-8 col-xs-10">
                                            <div class="range-advanced-main">
                                                <div class="range-text">
                                                    <label><span class="range-title">Rate:</span></label>
                                                    {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
                                                    <div class="text-left">
                                                        <div class="stars starrr"></div>
                                                        <a href="#" class="btn btn-danger btn-sm" id="close-review-box"
                                                           style="display:none; margin-right:10px;">
                                                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-xs-10">
                                            <div class="form-group">
                                                <label><span class="range-title">Review:</span></label>
                                                <textarea class="form-control" name="review" rows="5"
                                                          placeholder="Your review"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        &nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-common">submit review</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    @include('user.right_bar')
                </div>
            </div>
        </div>


        <div class="featured-lis mb30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                        <h3 class="section-title">Related Products</h3>
                        <div id="new-products" class="owl-carousel">
                            @foreach(App\Company::where('sub_category_id', $company->sub_category_id)
                            ->where('id','!=',$company->id)
                            ->orderBy('created_at','DESC')->take(5)->get() as $related)
                                <div class="item">
                                    <div class="product-item">
                                        <div class="carousel-thumb">
                                            <img src="/images/services/latest_home_and_best_services_355x240/{{$related->image}}"
                                                 alt="">
                                            <div class="overlay">
                                                <a href="/services/{{$related->id}}/details"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                        <a href="/services/{{$related->id}}/details"
                                           class="item-name">{{$related->name}}</a>
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
        </div>
    </div>
@endsection
