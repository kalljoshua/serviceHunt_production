<div class="col-sm-3 page-sideabr">
  <aside>
    <div class="inner-box">
      <div class="user-panel-sidebar">
        <div class="collapse-box">
          <h5 class="collapset-title no-border">My Classified
            <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified">
              <i class="fa fa-angle-down"></i></a></h5>
          <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
            <ul class="acc-list">
              <li class="active">
                <a href="{{route('user.profile')}}"><i class="fa fa-home"></i> Personal Home</a>
              </li>
              <?php
              $user_p = App\User::find(Auth::guard('user')->id());
              if($user_p->user_package->count()<0){
              ?>
              <li class="">
                <a href="{{route('user.package')}}"><i class="fa fa-home"></i> Purchase a Package</a>
              </li>
              <?php
              }else{
              ?>
              <li class="">
                <a href="{{route('user.profile')}}"><i class="fa fa-briefcase"></i> Upgrade Package</a>
              </li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
        <div class="collapse-box">
          <h5 class="collapset-title">My Ads <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="account-home.html#myads"><i class="fa fa-angle-down"></i></a></h5>
          <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
            <ul class="acc-list">
              <li>
                <a href="{{route('user.myads',['userId' => Auth::guard('user')->id()])}}">
                  <i class="fa fa-credit-card"></i> My Ads</a>
              </li>
              <li>
                <a href="{{route('user.favourites',['userId' => Auth::guard('user')->id()])}}">
                  <i class="fa fa-heart-o"></i> Favourite Ads</a>
              </li>
              <li>
                <a href="{{route('user.search',['userId' => Auth::guard('user')->id()])}}">
                  <i class="fa fa-star-o"></i> Saved Search </a>
              </li>
              <li>
                <a href="{{route('user.archived',['userId' => Auth::guard('user')->id()])}}">
                  <i class="fa fa-folder-o"></i> Archived Ads</a>
              </li>
              <li>
                <a href="{{route('user.pending',['userId' => Auth::guard('user')->id()])}}">
                  <i class="fa fa-hourglass-o"></i> Pending Approval </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="collapse-box">
          <h5 class="collapset-title">Companies
              <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#close">
                  <i class="fa fa-angle-down"></i></a></h5>
          <div aria-expanded="true" id="close" class="panel-collapse collapse in">
            <ul class="acc-list">
             <?php
             $auth_user_id = Auth::guard('user')->id();
             $companies = App\Company::where('user_id',$auth_user_id)->get();?>
             @foreach($companies as $company)
              <li>
                <a href="/{{$company->slug}}"><i class="fa fa-industry"></i> {{$company->name}}</a>
              </li>
            @endforeach
            <li>
              <a href="{{route('company.create')}}"><i class="fa fa-plus"></i> New Company</a>
            </li>
            </ul>
          </div>
        </div>
        <div class="collapse-box">
          <h5 class="collapset-title">Terminate Account <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="account-home.html#close"><i class="fa fa-angle-down"></i></a></h5>
          <div aria-expanded="true" id="close" class="panel-collapse collapse in">
            <ul class="acc-list">
              <li>
                <a href="{{route('account.close')}}"><i class="fa fa-close"></i> Close Account</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="inner-box">
      <div class="widget-title">
        <h4>Advertisement</h4>
      </div>
      <img src="/client_inc/assets//img/img1.jpg" alt="">
    </div>
  </aside>
</div>
