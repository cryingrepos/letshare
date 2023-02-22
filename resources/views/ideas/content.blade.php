@extends('parent')
@section('content')
<style>
    .reply{
        margin-left: 30px !important;
    }
   li{
        font-weight: bolder;
    }
    .strike_reply{
        margin-left:30px;
    }
    .dislike{
            margin-left: 30px;
    }
    .comment-user-img{
        height:50px;
        width:50px;
        border-radius:50%;
        display:flex;
        justify-content:center;
        align-items:center;
         background:#063b78;
        color:white;
        margin-right:14px;
        padding: 15px;
        position:relative ;
    }
    .comment-user-img span{
       font-size:20px;
       font-weight:30px;
    }
    .comment-user-img-up{
        height:50px;
        width:50px;
        border-radius:50%;
        display:flex;
        justify-content:center;
        align-items:center;
         background:black;
        color:white;
        padding: 15px;
        opacity:1;
        z-index:90;
        display:none;
        position:absolute;
    }
    
    .comment-user-img:hover .comment-user-img-up {
    display: flex !important;
     }
     
</style>
<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{route('avrt.home')}}">Home</a></li>
                <li>Post</li>
            </ol>
            <h2>{{$post->title}}</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <div class="col-lg-8">
                    <article class="blog-details">
                        <div class="post-img"> <img src="{{asset('storage/'.$post->image)}}" alt="" class="img-fluid"></div>
                        <h2 class="title">{{$post->title}}
                        </h2>
                        <div class="meta-top">
                            <ul>
                                <!--<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a-->
                                <!--        href="javascript:void(0)">Admin</a></li>-->
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="javascript:void(0)"><time datetime="2020-01-01">{{date('d M Y',strtotime($post->created_at))}}</time></a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                        href="#comment-b-5"><span id="strike_t_comment">{{$post->comment_total}}</span>Comments</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-up"></i> <a
                                        href="javascript:void(0)"><span id="strike_t_like">{{$post->t_like}}</span>Likes</a></li>
                                          <li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-down"></i> <a
                                        href="javascript:void(0)"><span id="strike_t_dislike">{{$post->t_dislike}}</span>DisLikes</a></li>
                            </ul>
                        </div>
                        <div class="content">
                          {!! $post->description !!}
                        </div>

                    </article>

                    <div class="comments" id="comment-b-5">
                        <h4 class="comments-count">{{$post->comment_total}} Comments</h4>
                        <div class="" id="comment_list">
                            @forelse ($comments as $comment)
                            <div id="comment-{{$comment->id}}" class="comment" >
                                <div class="d-flex">
                                    @php
                                     $text=strtoupper(substr($comment->user->name,0,2));
                                    @endphp
                                    @if(!empty($comment->user->image))
                                    <div class="comment-img"><img src="{{asset('storage/'.$comment->user->image)}}" alt="image"></div>
                                    @else
                                    
                                    <div class="comment-user-img"><div class="comment-user-img-up"><span><i class="fa fa-upload"></i></span></div><span>{{$text}}</span></div>
                                    @endif
                                    <div>
                                        <h5><a href="">{{$comment->user->name}}</a></h5>
                                        <time datetime="2020-01-01" >{{date('d M Y',strtotime($comment->created_at))}}</time>
                                        <p>{!! $comment->content !!}</p>
                                        <div class="meta-top">
                                            <div class="like-rep" id="{{$comment->id}}" data-comment-value="commnet_ids">
                                                <a class="like"><i
                                                        class="fa-solid fa-thumbs-up"></i> <span class="comment_like">{{$comment->like}}</span> </a>
                                                           <a class="dislike"><i
                                                        class="fa-solid fa-thumbs-down"></i> <span class="comment_dislike">{{$comment->dislike}}</span> </a>
                                                    @if(Auth::check())
                                                    <a target="_blank" href="{{route('arean.checkout',['slug'=>$post->slug])}}" class="strike_reply" ><i
                                                        class="bi bi-reply-fill"></i> Reply</a>
                                                    @else
                                                    <a href="#" class="strike_reply"><i
                                                        class="bi bi-reply-fill"></i> Reply</a>
                                                    @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div id="comment-1" class="comment">
                                <div class="d-flex">
                                    <div class="comment-img"><img src="{{asset('img/blog-comment/Dakota.jpg')}}" alt="">
                                    </div>
                                    <div>
                                        <h5><a href="">Welcome </a> </h5>
                                        <time datetime="2020-01-01">{{date('d M y')}}</time>
                                        <p> Addictive Voice Recognition Technique®
                                            The revolutionary approach to overcoming alcohol and drug dependence.
                                            Be First to share your thoughts.
                                        </p>
                                        <div class="meta-top">
                                            <div class="like-rep">
                                        <a href="" class="like"><i class="fa-solid fa-thumbs-up"></i> 0 </a>

                                        <a href="javascript:void(0)" class="reply"><i class="bi bi-reply-fill"></i> No Reply</a>

                                                {{-- <div class="replay-box">
                                                    <form action="" class="reply-form">

                                                        <div class="row m-0 p-0">
                                                            <div class="col form-group">
                                                                <textarea name="comment" class="form-control" placeholder="Add a reply*"></textarea>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Reply</button>
                                                    </form>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>

                        @include('comment.batter_box')
                    </div>

                </div>
                <div class="col-lg-4">
                   @include('ideas.recent')
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
