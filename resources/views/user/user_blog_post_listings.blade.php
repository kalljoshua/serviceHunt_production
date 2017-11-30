@extends('...layouts.userLayout')
@section('title')
    <title>Service Hunt : Blog Posts</title>
@endsection
@section('content')
    @include('user.search')

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach($posts as $post)
                    <div class="blog-post">

                        <div class="post-thumb">
                            <a href="{{route('user.show.posts',['slug'=>$post->slug])}}">
                                <img src="/images/blog/user_810x400/{{$post->image}}" alt=""></a>
                            <div class="hover-wrap">
                            </div>
                        </div>


                        <div class="post-content">
                            <h4 class="post-title">
                                <a href="{{route('user.show.posts',['slug'=>$post->slug])}}">
                                    {{$post->title}}
                                </a></h4>
                            <div class="meta">
                                <span class="meta-part">
                                    <i class="fa fa-user"></i>{{$post->author->username}}</span>
                                <span class="meta-part">
                                    <i class="fa fa-clock-o"></i>
                                    {{ $post->created_at->format('M d, Y \a\t h:i a') }}
                                </span>
                                <span class="meta-part">
                                    <i class="fa fa-comment"></i> Comments {{$post->comments->count()}}
                                </span>
                            </div>
                            <p>{!! str_limit($post->body, $limit = 250, $end = '...') !!}</p>
                            <a href="{{route('user.show.posts',['slug'=>$post->slug])}}"
                               class="btn btn-common btn-rm">Read More</a>
                        </div>

                    </div>
                    @endforeach

                    <div class="pagination-bar">
                        <?php echo $posts->render(); ?>
                    </div>

                </div>

                <aside id="sidebar" class="col-md-4 right-sidebar">

                    <div class="widget widget-popular-posts">
                        <div class="widget-title">
                            <h4>Recent Posts</h4>
                        </div>
                        <ul class="posts-list">
                            <li>
                                <div class="widget-thumb">
                                    <a href="#"><img src="assets/img/post/thumb1.jpg" alt="" /></a>
                                </div>
                                <div class="widget-content">
                                    <a href="#">Goodness Lemur Save Much Alas crud dear</a>
                                    <span><i class="icon-calendar"></i>09 October, 2017</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="widget-thumb">
                                    <a href="#"><img src="assets/img/post/thumb2.jpg" alt="" /></a>
                                </div>
                                <div class="widget-content">
                                    <a href="#">However Much Enor Mous Merrily Jeez</a>
                                    <span><i class="icon-calendar"></i>25 October, 2017</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="widget-thumb">
                                    <a href="#"><img src="assets/img/post/thumb3.jpg" alt="" /></a>
                                </div>
                                <div class="widget-content">
                                    <a href="#">Flinched More Mam Moth This Pompously</a>
                                    <span><i class="icon-calendar"></i>10 October, 2017</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    </div>

                    <div class="widget tag">
                        <div class="widget-title">
                            <h4>Popular Tags</h4>
                        </div>
                        <a href="#"> Fashion</a>
                        <a href="#"> Clothing</a>
                        <a href="#"> Trends</a>
                        <a href="#"> Shoes</a>
                        <a href="#"> Tops</a>
                        <a href="#"> Sell Off</a>
                        <a href="#"> Women Fashion</a>
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
@endsection
