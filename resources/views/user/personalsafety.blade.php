@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : Personal-Safety</title>
@endsection
@section('content')

@include('user.search')
<section id="content">
  <div class="container">
    @include('flash::message')
    <div class="row">
      <div class="col-sm-8">
        <h3 class="text-center">Personal-Safety</h3>
        <div class="ad-detail-content">
          <p> The overwhelming majority of Service Hunt users are trustworthy and well-intentioned.
            With billions of human interactions facilitated, the incidence of violent crime is extremely low.
            However, please take common sense precautions online as you would offline.</p>
            <p><strong>When meeting someone for the first time, please remember to:</strong></p>
            <ul>
              <li><p>Insist on a public meeting place like a café or office</p></li>
              <li><p>Do not meet in a secluded place, or invite strangers into your home.<p></li>
              <li><p>Be especially careful buying/selling highly personalized services.<p></li>
              <li><p>Consider making high-value exchanges at your local police station or in the lawyer’s presence<p></li>
              <li><p>Tell a friend or family member where you're going.<p></li>
              <li><p>Take your cell phone along if you have one.<p></li>
              <li><p>Consider having a friend accompany you.<p></li>
              <li><p>Trust your instincts.<p></li>
            </ul>
            <p>Taking these simple precautions helps make Service Hunt safer for everyone.
              For any frauds and spam incidents, please contact us at
              <a href="mailto:info@servicehunt.biz">info@servicehunt.biz</a>
              For more information about personal safety online, check out these resources:
            </p>
            <ul>
              <li><a href="http://www.staysafeonline.org/">http://www.staysafeonline.org/</a></li>
              <li><a href="http://www.onguardonline.gov/">http://www.onguardonline.gov/</a></li>
              <li><a href="http://getsafeonline.org/">http://getsafeonline.org</a></li>
              <li><a href="http://wiredsafety.org/">http://wiredsafety.org</a></li>
              </ul>
              <p><strong>Enjoy the Safer Service Hunting!</strong></p>
          </div>
        </div>
        <div class="col-sm-4 page-sidebar">
          <aside>
            <div class="inner-box">
              <div class="categories">
                <div class="widget-title">
                  <i class="fa fa-align-justify"></i>
                  <h4>All Categories</h4>
                </div>
                <div class="categories-list">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="fa fa-desktop"></i>
                        Electronics <span class="category-counter">(9)</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-wrench"></i>
                        Services <span class="category-counter">(8)</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-github-alt"></i>
                        Pets <span class="category-counter">(2)</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-leaf"></i>
                        Fashion <span class="category-counter">(3)</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-home"></i>
                        Real Estate <span class="category-counter">(4)</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-black-tie"></i>
                        Jobs <span class="category-counter">(5)</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-cutlery"></i>
                        Hotel & Travels <span class="category-counter">(5)</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="inner-box">
              <div class="widget-title">
                <h4>Premium Ads</h4>
              </div>
              <div class="advimg">
                <ul class="featured-list">
                  <li>
                    <img alt="" src="assets/img/featured/img1.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img2.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img3.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="inner-box">
              <div class="widget-title">
                <h4>Advertisement</h4>
              </div>
              <img src="assets/img/img1.jpg" alt="">
            </div>
          </aside>
        </div>


      </div>
    </div>
  </section>

  @endsection
