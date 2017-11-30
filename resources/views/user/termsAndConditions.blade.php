@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : Terms of Use</title>
@endsection
@section('content')

@include('user.search')
<section id="content">
  <div class="container">
    @include('flash::message')
    <div class="row">
      <div class="col-sm-8">
        <h3 class="text-center">Terms of Use</h3>
        <div class="ad-detail-content">
          <p>Welcome, and thank you for your interest in using Service Hunt.
            Service Hunt is a product of Ruraara Tech Empire, LLC. Service Hunt operates the website
            located at http://www.servicehunt.biz and related programming interfaces (API’s), mobile applications and
            online services (the “Website”). The following Terms of Use are a legal contract between you (“You”)
            and Ruraara Tech Empire, LLC (“Service Hunt” or “we” or “us” or “our” or “Company”
            or “Ruraara Tech Empire, LLC”) regarding your use of the website. Visitors and users of the website are
            referred to individually as “User” and collectively as “Users” By signing up for the
            Service Hunt service (“Service”) you are agreeing to be bound by the following terms and
            conditions (“Terms of Service”). The Services offered by Service Hunt under the Terms of
            Service include various services to help you create and advertise your company services online.
            Any new features or tools which are added to the current Service shall be also subject to the Terms of Service.
             You can review the current version of the Terms of Service at any time on service Hunt website.
             Ruraara Tech Empire, LLC reserves the right to update and change the Terms of Service by posting updates and
             changes to the Service Hunt website. You are advised to check the Terms of Service from time to time for any
             updates or changes that may impact you.</p>
            <p>You must read, agree with and accept all of the terms and conditions contained in this Terms of Service agreement
            and Service Hunt’s Privacy Policy before you may become a Service Hunt user.
            Please read the “Terms of Service” for the complete picture of your legal requirements.
            By using Service Hunt or any Service Hunt services, you are agreeing to these terms.
            Be sure to occasionally check back for updates.</p>

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
