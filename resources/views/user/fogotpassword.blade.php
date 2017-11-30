@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : Forgot Password</title>
@endsection
@section('content')

<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
        <div class="page-login-form box">
          <h3>
            Forgot Password
          </h3>
          <form role="form" class="login-form">
            <div class="form-group">
              <div class="input-icon">
                <i class="icon fa fa-user"></i>
                <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
              </div>
            </div>
            <button class="btn btn-common log-btn">Send me my Password</button>
          </form>
          <ul class="form-links">
            <li class="pull-left"><a href="signup.html">Don't have an account?</a></li>
            <li class="pull-right"><a href="login.html">Back to Login</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
