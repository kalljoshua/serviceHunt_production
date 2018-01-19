@extends('...layouts.userLayout')
@section('title')
    <title>Service Hunt : Privacy</title>
@endsection
@section('content')

    @include('user.search')
    <section id="content">
        <div class="container">
            @include('flash::message')
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="text-center">About Service Hunt</h3>
                    <div class="ad-detail-content">
                        <div class="page-main">
                            <div class="article-detail">
                                <p>
                                    Service Hunt is an Online Service Directory that surfaces the Best Service Providers every day.
                                    You can easily locate best service providers in your current location
                                    in shortest time possible on your PC or Mobile Phone.
                                    Service Hunt is a Product of Ruraara Tech Empire LLC .
                                </p>
                                <hr>
                                <h3 class="text-center">Meet our team</h3>
                                    <p>&nbsp;&nbsp;</p>
                                <div class="about-team-main">
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-3">
                                            <div class="about-team-block">
                                                <figure>
                                                    <img class="aligncenter" src="/images/Nakana.png" alt="Nakana"
                                                         style="width: 300px; height: 180px;">
                                                    <div>
                                                        <strong>Nakana Joshua</strong><br>
                                                        Director
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3">
                                            <div class="about-team-block">
                                                <figure>
                                                    <img class="aligncenter" src="/images/Moses.png" alt="Moses"
                                                         style="width: 300px; height: 180px;">
                                                    <div>
                                                        <strong>Moses Ruraara</strong><br>
                                                        Founder/C.E.O
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3">
                                            <div class="about-team-block">
                                                <figure>
                                                    <img class="aligncenter" src="/images/Nabuka.png" alt="Nabuka"
                                                         style="width: 300px; height: 180px;">
                                                    <div>
                                                        <strong>Nabuka Joshua</strong><br>
                                                        Lead Developer/C.T.O
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3">
                                            <div class="about-team-block">
                                                <figure>
                                                    <img class="aligncenter" src="/images/Akena.png" alt="Akena"
                                                         style="width: 300px; height: 180px;">
                                                    <div>
                                                        <strong>Akena Kenedy</strong><br>
                                                        Lead Developer/H.Q.A
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 page-sidebar">
                    @include('user.aside');
                </div>

            </div>
        </div>
    </section>

@endsection
