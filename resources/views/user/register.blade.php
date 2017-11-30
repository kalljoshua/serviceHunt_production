@extends('...layouts.userLayout')
@section('title')
    <title>Service Hunt : Register</title>
@endsection
@section('content')

    <!-- Page Header Start -->
    <div class="page-header" style="background: url(/client_inc/assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="page-title">Join Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Content section Start -->
    <section id="content">
        @include('flash::message')
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="page-login-form box">
                        <h3>
                            Register
                        </h3>
                        <form role="form" class="login-form" action="{{route('user.submit')}}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="icon fa fa-user"></i>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="icon fa fa-user"></i>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="icon fa fa-user"></i>
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="icon fa fa-phone"></i>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Contact">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="icon fa fa-envelope"></i>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="icon fa fa-unlock-alt"></i>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input type="file" name="photo" class="form-control"
                                       placeholder="Browse to select image">
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="remember" name="rememberme" value="forever"
                                       style="float: left;">
                                <label for="remember">By creating account you agree to our Terms & Conditions</label>
                            </div>
                            <button class="btn btn-common log-btn">Register</button>
                        </form>
                    </div>
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->
    </section>
    <!-- Content section End -->
@endsection
