@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : User Profile</title>
@endsection
@section('content')
@include('user.search')
<div id="content">
  <div class="container">
      @include('flash::message')
    <div class="row">
      @include('user.side_bar')
      <div class="col-sm-9 page-content">
        <div class="inner-box">
          <div class="usearadmin">
            <h3><a href="account-home.html#"><img class="userimg" src="/images/users/profile_330x330/{{$user->image}}" alt=""> {{$user->first_name}} {{$user->last_name}}</a></h3>
          </div>
        </div>
        <div class="inner-box">
          <div class="welcome-msg">
            <h3 class="page-sub-header2 clearfix no-padding">Hello {{$user->first_name}} </h3>
            <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span>
          </div>
          <div id="accordion" class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a href="account-home.html#collapseB1" data-toggle="collapse"> My details </a> </h4>
              </div>
              <div class="panel-collapse collapse in" id="collapseB1">
                <div class="panel-body">
                  <form role="form" action="{{route('user.edit.submit')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label">First Name</label>
                      <input class="form-control" value="{{$user->first_name}}" name="first_name" type="text">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Last name</label>
                      <input class="form-control" value="{{$user->last_name}}" name="last_name" type="text">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Email</label>
                      <input class="form-control" value="{{$user->email}}" name="email" type="email">
                    </div>
                    <div class="form-group">
                      <label for="Phone" class="control-label">Phone</label>
                      <input class="form-control" value="{{$user->phone}}" name="phone" id="Phone" type="text">
                    </div>
                    <div class="form-group hide">
                      <label class="control-label">Facebook account map</label>
                      <div class="form-control"> <a class="link" href="http://demo.graygrids.com/themes/classix-template/fb.com">Jhone.doe</a>
                        <a class=""> <i class="fa fa-minus-circle"></i></a>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-common">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="account-home.html#collapseB2" data-toggle="collapse"> Settings </a> </h4>
              </div>
              <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB2">
                <div class="panel-body">
                  <form role="form" method="post" action="{{route('user.update.submit')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <div class="checkbox">
                        <label><input type="checkbox">Comments are enabled on my ads </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label">New Password</label>
                      <input class="form-control" id="oldpass" name="oldpass" placeholder="Old Password" type="password">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Confirm Password</label>
                      <input class="form-control" id="newpass" name="newpass" placeholder="New Password" type="password">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-common">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="account-home.html#collapseB3" data-toggle="collapse"> Preferences </a> </h4>
              </div>
              <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB3">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <div class="checkbox">
                        <label><input type="checkbox">I want to receive newsletter. </label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox">I want to receive advice on buying and selling. </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
