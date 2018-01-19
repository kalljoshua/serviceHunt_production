@extends('...layouts.userLayout')
@section('title')
    <title>Service Hunt : My Ads</title>
@endsection
@section('content')

    @include('user.search')
    <div id="content">
        <div class="container">
            @include('flash::message')
            <div class="row">
                <div class="col-sm-8 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="fa fa-credit-card"></i> My Ads</h2>
                        @if(sizeof($services)>0)
                            <div class="table-responsive">
                                <div class="adds-wrapper">
                                    @foreach($services as $service)
                                        <div class="item-list">
                                            <div class="col-sm-2 no-padding photobox">
                                                <div class="add-image">
                                                    <a href="/{{$service->slug}}">
                                                        <img src="/images/services/our_location_370x370/{{$service->image}}"
                                                             alt=""></a>
                                                    {{--<span class="photo-count"><i class="fa fa-camera"></i>2</span>--}}
                                                </div>
                                            </div>
                                            <div class="col-sm-7 add-desc-box">
                                                <div class="add-details">
                                                    <h5 class="add-title"><a
                                                                href="/{{$service->slug}}">{{$service->name}}</a>
                                                        <div class="rating">
                                                <span class="bottom-ratings">
                                                  @for ($k=1; $k <= 5 ; $k++)
                                                        <span data-title="Average Rate: 5 / 5"
                                                              class="bottom-ratings tip">
                                                    <span style="color: #FDC600" class="glyphicon glyphicon-star{{ ($k <= $service->rating) ? '' : '-empty'}}"></span>
                                                        </span>
                                                    @endfor
                                                    <span style="color: #FDC600">({{$service->rating}})</span>
                                                </span>

                                                        </div>
                                                    </h5>
                                                    <div class="info">
                  <span class="date">
                    <i class="fa fa-clock"></i>
                      <?php echo date_format($service->created_at, 'G:ia Y-m-d');?>
                  </span> -
                                                        <span class="category">{{$service->sub_category->name}}</span> -
                                                        <span class="item-location"><i
                                                                    class="fa fa-map-marker"></i>{{$service->district}}</span>
                                                    </div>
                                                    <div class="item_desc">
                                                        <a href="/{{$service->slug}}">
                                                            {{ str_limit($service->description, $limit = 70, $end = '...') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 text-right  price-box">
                                                <a class="btn btn-common btn-sm"> <i class="fa fa-eye"></i>
                                                    <span>{{$service->views}}</span> </a>
                                                @if(Auth::guard('user')->user())
                                                    @if(Auth::guard('user')->user()->id==$service->user->id)
                                                        <a href="/company/{{$service->slug}}/edit"
                                                           class="btn text-right btn-info btn-sm">
                                                            Edit</a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="text-center" style="margin-top:50px">
                                <h3>No Services available under your account!</h3>
                            </div>
                        @endif
                    </div>
                    <div class="pagination-bar">
                        <ul class="pagination">
                            <?php echo $services->render(); ?>
                        </ul>
                    </div>
                    <div class="post-promo text-center">
                        <h2> Do you have anything to Advertise ? </h2>
                        <h5>Advertise your products online FOR FREE. It's easier than you think !</h5>
                        <a href="{{route('company.create')}}" class="btn btn-post btn-danger">Sell A Service </a>
                    </div>
                </div>
                <div class="col-sm-4 page-sidebar">
                    @include('user.aside');
                </div>
            </div>
        </div>
    </div>
@endsection
