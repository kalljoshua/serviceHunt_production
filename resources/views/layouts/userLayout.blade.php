<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Clasified">
    <meta name="generator" content="Wordpress! - Open Source Content Management">
    @yield('title')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/client_inc/assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/client_inc/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/client_inc/assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/client_inc/assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="/client_inc/assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="/client_inc/assets/css/font-awesome.min.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="/client_inc/assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="/client_inc/assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="/client_inc/assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/client_inc/assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/client_inc/assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="/client_inc/assets/extras/owl.theme.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="/client_inc/assets/css/responsive.css" type="text/css">
    <!-- Slicknav js -->
    <link rel="stylesheet" href="/client_inc/assets/css/slicknav.css" type="text/css">
    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="/client_inc/assets/css/bootstrap-select.min.css">

</head>
<body>
<!-- Header Section Start -->
<div class="header">
    <nav class="navbar navbar-default main-navigation" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand logo" href="/">
                    {{--<h3><span style="color:blue">Service</span><span style="color:red">Hunt</span></h3>--}}
                    <img src="/client_inc/assets/img/logo.png" alt="" style="width: 100%; height: 65%">
                </a>
            </div>
            <!-- brand and toggle menu for mobile End -->

            <!-- Navbar Start -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::guard('user')->user() )
                        <li><a href="{{route('user.profile')}}">My account</a></li>
                        <li><a href="#"
                               onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}</form>
                    @elseif(Auth::guard('admin')->user())
                        <li><a href="{{route('admin.dashboard')}}">Admin</a></li>
                        <li><a href="#"
                               onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}</form>
                    @else
                        <li><a href="{{route('user.login')}}"><i class="lnr lnr-enter"></i> Login</a></li>
                        <li><a href="{{route('user.register')}}"><i class="lnr lnr-user"></i> Signup</a></li>
                    @endif
                    <li class="postadd">
                        <a class="btn btn-danger btn-post" href="{{route('company.create')}}"><span
                                    class="fa fa-plus-circle"></span> Sell A Service</a>
                    </li>
                </ul>
            </div>
            <!-- Navbar End -->
        </div>
    </nav>
    <!-- Off Canvas Navigation -->
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
        <!--- Off Canvas Side Menu -->
        <div class="close" data-toggle="offcanvas" data-target=".navmenu">
            <i class="fa fa-close"></i>
        </div>
        <h3 class="title-menu">I'm Looking For</h3>
        <!--- Menu -->
        <div class="categories-list">
            <ul>
                @foreach(App\Category::all() as $category)
                    @if($category->sub_category->count()>0)
                        <div class="category-header">
                            <a data-toggle="collapse" href="#collapse{{$category->id}}">
                                <i class="fa fa-tags"></i>
                                <?php echo ucfirst(strtolower($category->name));?> 
                            </a>
                        </div>
                        <div id="collapse{{$category->id}}" class="category-content collapse">
                            @foreach(App\SubCategory::where('category_id', $category->id)->orderBy('created_at','DESC')->take(4)->get() as $sub_category)
                               
                                    <li>
                                        <a href="/services/{{$sub_category->id}}/category">{{$sub_category->name}}
                                            <span class="category-counter">({{$sub_category->companies->count()}})</span></a>

                                    </li>
                               
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </ul>
        </div>
        <!--- End Menu -->
    </div> <!--- End Off Canvas Side Menu -->
    <div class="tbtn wow pulse" id="menu" data-wow-iteration="infinite" data-wow-duration="500ms"
         data-toggle="offcanvas" data-target=".navmenu">
        <p>Looking For</p>
    </div>
</div>
<!-- Header Section End -->

@include('layouts.resetPassword')

@yield('content')

<!--start footer section-->

@include('layouts.siteFooter')

<!--end footer section-->

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
    <i class="fa fa-angle-up"></i>
</a>

<!-- Main JS  -->
<script type="text/javascript" src="/client_inc/assets/js/jquery-min.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/material.min.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/material-kit.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/jquery.parallax.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/wow.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/main.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/waypoints.min.js"></script>
<script type="text/javascript" src="/client_inc/assets/js/jasny-bootstrap.min.js"></script>
<script src="/client_inc/assets/js/bootstrap-select.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/starrr.js"></script>
<script language="javascript" type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function(){
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });
        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });
    });

    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>
<script type='text/javascript'>
    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="input-group">'+
                    '<input type="text" name="service[]" placeholder="Enter another Service" class="form-control">'+
                    '<span class="remove_field input-group-btn">'+
                    '<button class="btn btn-danger" type="button"><i class="fa fa-remove"></i></button>'+
                     '</span></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });


</script>
<script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(1500);


    $('#main-slider').owlCarousel({
        loop:true,
        nav: true,
        autoplay:true,
        lazyLoad:true,
        singleItem: true,
        slideSpeed : 300,
        paginationSpeed : 400,
        items : 2,
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false,
        dots: false,
        responsiveClass:true,
        navText: ["←","→"]
    });

    $('#main-brand-slider').owlCarousel({ loop:true,
        margin:10, nav:false, autoplay:true,
        lazyLoad:true, items : 1, itemsDesktop : false,
        itemsDesktopSmall : false, itemsTablet: false,
        itemsMobile : false, dots: false, });
</script>

</body>
</html>