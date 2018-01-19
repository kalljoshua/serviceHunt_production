@extends('...layouts.userLayout')
@section('title')
    <title>Service Hunt : Home</title>
@endsection
@section('content')
    <style>
        .my-list li {
            display: none;
        }

    </style>
    @include('layouts.topSection')
    <div class="wrapper">

        <!-- Featured Listings Start -->
        @if(sizeof($featured_services)>0)
            <section class="featured-lis">
                <div class="container">
                    @include('flash::message')
                    <div class="row">

                        <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                            <h3 class="section-title">Featured Listings</h3>
                            <div id="new-products" class="owl-carousel">
                                @foreach($featured_services as $featured_service)
                                    <div class="item">
                                        <div class="product-item">
                                            <div class="carousel-thumb">
                                                <img src="/images/services/latest_home_and_best_services_355x240/{{$featured_service->image}}"
                                                     alt="{{$featured_service->image}}">
                                                <div class="overlay">
                                                    <a href="/{{$featured_service->slug}}"><i
                                                                class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                            <a href="/{{$featured_service->slug}}" class="item-name">
                                                {{ str_limit($featured_service->name, $limit = 20, $end = '...')}}</a>
                                            <span class="bottom-ratings price">
                                      @for ($k=1; $k <= 5 ; $k++)
                                                    <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                        <span style="color: #FDC600"
                                              class="glyphicon glyphicon-star{{ ($k <= $featured_service->rating) ? '' : '-empty'}}">

                                        </span>
                                            </span>
                                                @endfor
                                                <span style="color: #FDC600">({{$featured_service->rating}})</span>
                                    </span>
                                            <span class="price"
                                                  style="color: #FF1C1C">Views ({{$featured_service->views}})</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    <!-- Featured Listings End -->
        @if(sizeof($most_viewed_services)>0)
            <div class="features-lis">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                            <h3 class="section-title">Most Viewed</h3>
                            <div id="new-product" class="owl-carousel">
                                @foreach($most_viewed_services as $most_viewed_service)
                                    <div class="item">
                                        <div class="product-item">
                                            <div class="carousel-thumb">
                                                <img src="/images/services/latest_home_and_best_services_355x240/{{$most_viewed_service->image}}"
                                                     alt="">
                                                <div class="overlay">
                                                    <a href="/{{$most_viewed_service->slug}}"><i class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                            <a href="/{{$most_viewed_service->slug}}" class="item-name">
                                                {{ str_limit($most_viewed_service->name, $limit = 20, $end = '...')}}</a>
                                            <span class="bottom-ratings price">
                                      @for ($k=1; $k <= 5 ; $k++)
                                                    <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                        <span style="color: #FDC600"
                                              class="glyphicon glyphicon-star{{ ($k <= $most_viewed_service->rating) ? '' : '-empty'}}">

                                        </span>
                                            </span>
                                                @endfor
                                                <span style="color: #FDC600">({{$most_viewed_service->rating}})</span>
                                    </span>
                                            <span class="price"
                                                  style="color: #FF1C1C">Views ({{$most_viewed_service->views}})</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(sizeof($recent_services)>0)
            <div class="features-lis">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                            <h3 class="section-title">Recently Added</h3>
                            <div id="recent-products" class="owl-carousel">
                                @foreach($recent_services as $recent_service)
                                    <div class="item">
                                        <div class="product-item">
                                            <div class="carousel-thumb">
                                                <img src="/images/services/latest_home_and_best_services_355x240/{{$recent_service->image}}"
                                                     alt="">
                                                <div class="overlay">
                                                    <a href="/{{$recent_service->slug}}"><i class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                            <a href="/{{$recent_service->slug}}" class="item-name">
                                                {{ str_limit($recent_service->name, $limit = 20, $end = '...')}}</a>
                                            <span class="bottom-ratings price">
                                      @for ($k=1; $k <= 5 ; $k++)
                                                    <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                        <span style="color: #FDC600"
                                              class="glyphicon glyphicon-star{{ ($k <= $recent_service->rating) ? '' : '-empty'}}">

                                        </span>
                                            </span>
                                                @endfor
                                                <span style="color: #FDC600">({{$recent_service->rating}})</span>
                                    </span>
                                            <span class="price" style="color: #FF1C1C">Views ({{$recent_service->views}}
                                                )</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif

    <!-- Categories Homepage Section Start -->
        <section id="categories-homepage">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Browse Ads from all Categories</h3>
                    </div>
                    @foreach($categories as $category)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="category-box border-1 wow fadeInUpQuick">
                                <div class="icon">
                                    <a href="#"><i class="lnr lnr-tag color-1"></i></a>
                                </div>
                                <div class="category-header">
                                    <a href="#"><h5>{{$category->name}}</h5></a>
                                </div>
                                <div class="category-content">
                                    <ul id="sub-list-{{$category->id}}" class="sub-list-{{$category->id}}">

                                        @foreach(App\SubCategory::where('category_id', $category->id)->orderBy('created_at','DESC')->take(3)->get() as $sub_category)

                                            <li>
                                                <a href="/services/{{$sub_category->id}}/category">{{$sub_category->name}}</a>
                                                <span class="category-counter">({{$sub_category->companies->count()}}
                                                    )</span>
                                            </li>
                                        @endforeach

                                    </ul>

                                    <div align="center" style="padding-top: 10px" class="load-cave-{{$category->id}}">
                                        <button id="load-more-button-{{$category->id}}" data-id="{{$category->id}}"
                                                onclick="loadMoreSubcategories({{$category->id}})"
                                                class="btn btn-primary btn-xs">
                                            Load more
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{--Button loads more categories--}}
            <div class="container atlrd-container">
                <div class="row">
                    <div class="col-md-12 atlrd" align="center" style="padding-top: 20px; padding-bottom: 20px;">
                        <button id="more-categories-button" class="btn btn-danger btn-post" onclick="loadMoreCategories()">More
                            categories
                        </button>
                    </div>

                </div>
            </div>
            {{--Ends button load more categories--}}

            {{--Loads more categories--}}

            <div class="container">
                <div class="row" id="dyno">

                </div>
            </div>

            {{--Ends load more categories--}}
        </section>
        <!-- Categories Homepage Section End -->

        <!-- Counter Section Start -->
        <section id="counter">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="counting wow fadeInDownQuick" data-wow-delay=".5s">
                            <div class="icon">
                      <span>
                        <i class="lnr lnr-tag"></i>
                      </span>
                            </div>
                            <div class="desc">
                                <h3 class="counter"><?php echo App\Company::all()->count(); ?></h3>
                                <p>Total Listings</p>
                            </div>
                        </div>
                    </div>
                    <?php $types_all = App\Type::all(); ?>
                    @foreach($types_all as $type)
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="counting wow fadeInDownQuick" data-wow-delay=".5s">
                                <div class="icon">
                      <span>
                        <i class="lnr lnr-license"></i>
                      </span>
                                </div>
                                <div class="desc">
                                    <h3 class="counter"><?php echo App\Company::where('type_id', $type->id)->count(); ?></h3>
                                    <p><?php $type_name = App\Type::where('id', $type->id)->first(); echo $type_name->name; ?></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="counting wow fadeInDownQuick" data-wow-delay="2s">
                            <div class="icon">
                      <span>
                        <i class="lnr lnr-users"></i>
                      </span>
                            </div>
                            <div class="desc">
                                <h3 class="counter"><?php echo App\User::all()->count(); ?></h3>
                                <p>Registered Users</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Counter Section End -->


        <!-- Location Section Start -->
        <section class="location">
            <div class="container">
                <div class="row localtion-list">
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.5s">
                        <h3 class="title-2"><i class="fa fa-envelope"></i> Subscribe for updates</h3>
                        <form id="subscribe" action="/subscribe-to-newsletter" method="post">
                            {{ csrf_field() }}
                            <p>Join our 10,000+ subscribers to search, sell and rate services online</p>
                            <div class="subscribe">
                                <input class="form-control" name="email" placeholder="Your email here" required=""
                                       type="email">
                                <button class="btn btn-common" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="1s">
                        <h3 class="title-2"><i class="fa fa-search"></i> Popular Searches</h3>
                        <ul class="cat-list col-sm-4">
                            @foreach($searches as $saved)
                                <li><a href="#">{{$saved->keyword}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Location Section End -->
    </div>
    <script src="/client_inc/js/jquery.js"></script>
    <script>


        function loadMoreSubcategories(id) {
            var subCategory = document.getElementById('load-more-button-' + id);
            var categoryId = subCategory.dataset.id;

            var subCategoryList = $("#sub-list-" + id);

            subCategory.style.color = "black";


            console.log(subCategoryList);

            console.log("Howdy world" + subCategory.dataset.id);

            var loader = '<div id="circular3dG" class="sub-loader">' +
                '<div id="circular3d_1G" class="circular3dG"></div>' +
                '<div id="circular3d_2G" class="circular3dG"></div>' +
                '<div id="circular3d_3G" class="circular3dG"></div>' +
                '<div id="circular3d_4G" class="circular3dG"></div>' +
                '<div id="circular3d_5G" class="circular3dG"></div>' +
                '<div id="circular3d_6G" class="circular3dG"></div>' +
                '<div id="circular3d_7G" class="circular3dG"></div>' +
                '<div id="circular3d_8G" class="circular3dG"></div>' +
                '</div>';

            $('.sub-list-'+id).append(loader);

            //Ajax sends get request to server for loading more subcategories
            $.ajax({
                type: 'GET',
                headers: {"cache-control": "no-cache"},
                url: "/load-more-sub-categories",
                async: true,
                cache: false,
                dataType: "json",
                data: 'category_id=' + categoryId,
                processData: false,
                contentType: false,
                success: function (jsonData, textStatus, jqXHR) {

                  $('.sub-loader').css("display", "none");

                    console.log(jsonData);

                    console.log(jsonData.length);

                    var size_li = jsonData.length;

                    for (var x = 0; x < size_li; x++) {
                        subCategoryList.append("<li><a href='/services/" + jsonData[x]["id"] + "/category'>" + jsonData[x]["name"] + "</a>" +
                            "<span class='category-counter'>(" + jsonData[x]["companies"] + ")</span>" +
                            "</li>");
                    }

                    //Scrolls list to bottom after load more
                    /*var objDiv = $(".sub-list-" + id);
                    var h = objDiv.get(0).scrollHeight;
                    objDiv.animate({scrollTop: h});*/

                    $("#sub-list-" + id).addClass('scroll-style');
                    $("#load-more-button-" + id).removeClass('btn-primary');
                    $("#load-more-button-" + id).addClass('btn-inverse');
                    $("#load-more-button-" + id).attr('disabled', 'disabled');
                    $("#load-more-button-" + id).text('Viewing all');

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }


        function loadMoreCategories() {

            var dyno = $("#dyno");
            $('#more-categories-button').css("display", "none");
            //Ajax sends get request to server for loading more subcategories


            var loader = '<div id="circular3dG">' +
                '<div id="circular3d_1G" class="circular3dG"></div>' +
                '<div id="circular3d_2G" class="circular3dG"></div>' +
                '<div id="circular3d_3G" class="circular3dG"></div>' +
                '<div id="circular3d_4G" class="circular3dG"></div>' +
                '<div id="circular3d_5G" class="circular3dG"></div>' +
                '<div id="circular3d_6G" class="circular3dG"></div>' +
                '<div id="circular3d_7G" class="circular3dG"></div>' +
                '<div id="circular3d_8G" class="circular3dG"></div>' +
                '</div>';

            $('.atlrd').append(loader);
            
            $.ajax({
                type: 'GET',
                headers: {"cache-control": "no-cache"},
                url: "/load-more-categories",
                async: true,
                cache: false,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (jsonData, textStatus, jqXHR) {

                    $('.atlrd-container').css("display", "none");

                    console.log(jsonData);

                    var size_li = jsonData.length;

                    for (var i = 0; i < size_li; i++) {

                        var data2 = "";

                        var data = '<div class="col-md-3 col-sm-6 col-xs-12">' +
                            '<div class="category-box border-1 wow fadeInUpQuick">' +
                            '<div class="icon">' +
                            '<a href="#"><i class="lnr lnr-tag color-1"></i></a>' +
                            '</div>' +
                            '<div class="category-header">' +
                            '<a href="#"><h4>' + jsonData[i]["name"] + ' ' + jsonData[i]["id"] + '</h4></a>' +
                            '</div>' +
                            '<div class="category-content">' +
                            '<ul id="sub-list-' + jsonData[i]["id"] + '" class="sub-list-' + jsonData[i]["id"] + '">';

                        for (var j = 0; j < jsonData[i]["sub_categories"].length; j++) {
                            data2 += '<li>' +
                                '<a href="/services/' + jsonData[i]["id"] + '/category">' + jsonData[i]["sub_categories"][j]["name"] + '</a>' +
                                '<span class="category-counter">(' + jsonData[i]["sub_categories"][j]["companies"] +
                                ')</span>' +
                                '</li>';

                        }

                        var data3 = '</ul>';

                        var data4 = '<div align="center" style="padding-top: 10px">' +
                            '<button id="load-more-button-' + jsonData[i]["id"] + '" data-id="' + jsonData[i]["id"] + '"' +
                            'onclick="loadMoreSubcategories(' + jsonData[i]["id"] + ')"' +
                            'class="btn btn-primary btn-xs">' +
                            'Load more' +
                            '</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        var stringBuild = data + data2 + data3 + data4;

                        //console.log(stringBuild);

                        dyno.append(stringBuild);
                    }

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }

    </script>


@endsection
