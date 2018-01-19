<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Clasified">
    <meta name="generator" content="Wordpress! - Open Source Content Management">
    @yield('title')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" type="text/css" href="/client_inc/bootstrap-fileinput/bootstrap-fileinput.css"/>

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
                    <li>
                        <a class="btn btn-default btn-post" data-toggle="modal"
                           href="#" data-target="#modal-default">Request A Service</a>
                    </li>
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
                            @foreach(App\SubCategory::where('category_id', $category->id)->orderBy('created_at','DESC')->get() as $sub_category)
                               
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{route('submit.request')}}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Request a service</h4>
                </div>
                <div class="modal-body col-md-12">

                    <div class="form-group">
                        <div class="input-icon">
                            <input name="type" value="1" type="hidden">

                            @if(!Auth::guard('user')->user())
                                <input name="name" class="form-control"
                                       placeholder="Add your full Name" type="text" required/>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">

                            @if(!Auth::guard('user')->user())
                                <input name="contact" class="form-control"
                                       placeholder="Enter your phone number" type="text" required/>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">

                            @if(!Auth::guard('user')->user())
                                <input name="email" class="form-control"
                                       placeholder="Add Email Address" type="email" required/>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                                <input name="location" class="form-control"
                                       placeholder="Enter current Address" type="text" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                                            <textarea rows="3" class="form-control" name="details"
                                                      placeholder="Enter request info" type="text">Enter request info....
                                            </textarea>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-sm btn-warning pull-left"
                            data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn-sm btn-primary">Submit request</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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

<script type="text/javascript" src="/client_inc/bootstrap-fileinput/bootstrap-fileinput.js"></script>

<script language="javascript" type="text/javascript" src="/js/starrr.js"></script>
<script language="javascript" type="text/javascript" src="/js/script.js"></script>

<script src="/client_inc/jscript/form-components.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
    //delete product and remove it from list
    $(document).on('click','.delete-product',function(){
        var product_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: '/productajaxCRUD/' + product_id,
            success: function (data) {
                console.log(data);
                $("#product" + product_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function(){
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });
        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });

        $('.delete-post-link').on('click', function(e) {
            e.preventDefault();
            var parentPost = $(this).closest('.post');
            $.ajax({
                method	: 'post',
                url   : $(this).attr('href'),
                data	: {
                    _token	: $(this).data('token')
                },
                success	: function(data) {
                    if(data === 'delete success') {
                        // location.reload();
                        parentPost.slideUp();
                    } else {
                        alert("Could not delete data");
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });

    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

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
    function preview_image2(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image2');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    function preview_image3(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image3');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        //get subcateogries according to sector selection
        $("#property-type").change(function () {
            $.get("/submission/getSubCategories/" + $(this).val(), function (data) {

                $element = $("#subcategory_id");
                $element.removeAttr('disabled');

                $(data).each(function () {
                    $element.append("<option value='" + this.id + "'>" + this.name + "</option>");
                });

            });

        })
    })
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

<script>
    $(document).ready(function () {
        var loop = $("#loop").val();
        var Vid = parseInt($("#c-id").val())-1;
        console.log("the top id is: "+Vid+" and size is "+loop)
        for(var i=1; i<=loop; i++){

            Vid = Vid+1;
            console.log("the results are: "+Vid+" and I is: "+i)
            size_li = $("#myList"+Vid+" li").size();
            x=3;
            $('#myList'+Vid+' li:lt('+x+')').show();
            $('#loadMore').click(function () {
                x= (x+5 <= size_li) ? x+5 : size_li;
                $('#myList'+Vid+' li:lt('+x+')').show();
            });
            $('#showLess').click(function () {
                x=(x-5<0) ? 3 : x-5;
                $('#myList li').not(':lt('+x+')').hide();
            });


        }



    });
</script>

</body>
</html>