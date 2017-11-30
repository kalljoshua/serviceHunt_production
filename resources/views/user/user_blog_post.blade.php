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

                    <div class="blog-post single-post">

                        <div class="post-thumb">
                            <a href="#"><img src="/images/blog/user_810x400/{{$posts->image}}" alt=""></a>
                            <div class="hover-wrap">
                            </div>
                        </div>

                        <div class="post-content">
                            <h4 class="post-title"><a href="#">
                                    {{ $posts->title }}
                                </a></h4>
                            <div class="meta">
                                <span class="meta-part">
                                    <i class="fa fa-user"></i>{{$posts->author->username}}</span>
                                <span class="meta-part">
                                    <i class="fa fa-clock-o"></i>
                                    {{ $posts->created_at->format('M d, Y \a\t h:i a') }}
                                </span>
                                <span class="meta-part">
                                    <i class="fa fa-comment"></i>
                                    Comments {{$posts->comments->count()}}
                                </span>
                            </div>
                            <p>{!! $posts->body!!}</p>
                        </div>

                    </div>


                    <div id="comments">
                        <div class="inner-box">
                            @if ( $comments->count()<1 )
                                <p>No comments added yet!</p>
                            @else
                            <h3>Comments ({{$posts->comments->count()}})</h3>
                            <ol class="comments-list">
                                @foreach($comments as $comment)
                                    <?php $user = App\User::where('id',$comment->user_id)->first();?>
                                <li>
                                    <div class="media">
                                        <div class="thumb-left">
                                            <a href="#">
                                                <img alt=""
                                                     src="/images/users/home_71x71/{{$user->image}}" />
                                            </a>
                                        </div>
                                        <div class="info-body">
                                            <div class="media-heading">
                                                <h4 class="name">
                                                    {{ $user->first_name }} {{ $user->last_name }}
                                                </h4> |
                                                <span class="comment-date">
                                                    {{ $comment->created_at->format('M d, Y \a\t h:i a') }}
                                                </span>
                                            </div>
                                            <p>{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                </li>
                                    @endforeach
                            </ol>
                            @endif
                            <div id="respond">
                                <h2 class="respond-title">Leave A Comment</h2>
                                @if(Auth::guard('user')->check())
                                    <form method="post" action="{{route('user.comment.submit')}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="on_post" value="{{ $posts->id }}">
                                        <input type="hidden" name="slug" value="{{ $posts->slug }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <textarea name = "body"
                                                          placeholder="Your Comments" class="form-control" rows="9"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" id="submit" class="btn btn-common">Post Comment</button>
                                        </div>
                                    </div>
                                </form>
                                @else
                                    <a href="{{route('user.login')}}">
                                        <p style="color: red;">Login to comment on this Post</p>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <aside id="sidebar" class="col-md-4 right-sidebar">

                    @if ( $comments->count()<1 )
                        <p>No comments added yet!</p>
                    @else
                    <div class="widget widget-popular-posts">
                        <div class="widget-title">
                            <h4>Recent Posts</h4>
                        </div>
                        <ul class="posts-list">
                            @foreach($recentComments as $comment)
                                <?php $user = App\User::where('id',$comment->user_id)->first();?>
                            <li>
                                <div class="widget-thumb">
                                    <a href="#">
                                        <img src="/images/users/home_71x71/{{$user->image}}" alt="" /></a>
                                </div>
                                <div class="widget-content">
                                    <a href="#">{{ $comment->body }}</a>
                                    <span>
                                        <i class="icon-calendar"></i>
                                        {{ $comment->created_at->format('M d, Y \a\t h:i a') }}
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                                @endforeach
                        </ul>
                    </div>
                    @endif

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
    </div>
@endsection
