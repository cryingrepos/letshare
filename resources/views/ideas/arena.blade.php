@extends('parent')
@section('content')
<style>
    .reply-1{
        margin-left: 30px !important;
    }
    .reply-2{
        margin-left: 70px !important;
    }
    .reply-3{
        margin-left: 110px !important;
    }
    .reply-4{
        margin-left: 150px !important;
    }
    .reply-5{
        margin-left: 190px !important;
    }
    .reply-d{
        margin-left: 20px !important;
    }
    .spinner-border{
        color:white;
        display:none;
    }
    .dislike-l{
        margin-left:30px;
    }
button{
    color:white;
}
.comment-user-img{
    height:50px;
    width:50px;
    margin-right:12px;
    border-radius:50%;
    background:#063b78;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
}
.comment-user-img span{
    font-size:20px;
    font-weight:bolder;
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
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="javascript:void(0)">Admin</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="javascript:void(0)"><time datetime="2020-01-01">{{date('d-M-Y',strtotime($post->created_at))}}</time></a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                        href="#comment-b-5"><span id="arena_t_comment">{{$total_comment}}</span> Comments</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-up"></i> <a
                                        href="javascript:void(0)"><span id="arena_t_like">{{$total_like}}</span>Like</a></li>
                                         <li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-down"></i> <a
                                        href="javascript:void(0)"><span id="arena_t_dislike">{{$total_dislike}}</span> Dislike</a></li>
                            </ul>
                        </div>
                        <div class="content">
                          {!! $post->description !!}
                        </div>

                    </article>

                    <div class="comments" id="comment-b-5">
                        <h4 class="comments-count">{{$total_comment}} Comments</h4>
                        <div class="" id="comment_list">
                            @forelse ($comments as $comment)
                                <div class="comment">
                                     <div class="comment reply-0">
                                    <div id="comment-{{$comment->id}}">
                                           <div class="d-flex">
                                            @if(!empty($comment->user->image))
                                            <div class="comment-img"><img src="{{asset('storage/'.$comment->user->image)}}" alt="">
                                            </div>
                                            @else
                                              @php
                                            $text=strtoupper(substr($comment->user->name,0,2));
                                            @endphp
                                             <div class="comment-img"><div class="comment-user-img"><span>{{$text}}</span></div></div>
                                            @endif
                                            <div>
                                                <h5><a href="">{{$comment->user->name}}</a></h5>
                                                <time datetime="2020-01-01">{{date('d M Y H:i',strtotime($comment->created_at))}}</time>
                                                <p>{{$comment->content}}</p>
                                                <div class="meta-top">
                                                    <div class="like-rep" id="{{$comment->id}}" data-comment="{{$comment->id}}">
                                                        <a href="javascript:void(0)" class="like-l"><i
                                                                class="fa-solid fa-thumbs-up"></i><span>{{$comment->like}}</span></a>
                                                                 <a href="javascript:void(0)" class="dislike-l"><i
                                                                class="fa-solid fa-thumbs-down"></i> <span>{{$comment->dislike}}</span></a>
                                                        <a href="javascript:void(0)" class="reply-b" ><i
                                                                class="bi bi-reply-fill"></i> Reply</a>
                                                                @if($comment->user->id==Auth::user()->id)
                                                                <a href="{{route('arena.delete',['reply'=>$comment->id])}}" class="reply-d" ><i
                                                                    class="bi bi-trash2"></i>Delete</a>
                                                                @endif
                                                        <div class="replay-box">
                                                            <form action="" class="reply-form">
                                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                                <div class="row m-0 p-0">
                                                                    <div class="col-md-12 form-group">
                                                                        <textarea name="comment" width="200" class="form-control" placeholder="Add a reply*"></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="reply_btn" class="btn btn-primary">
                                                                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                    Reply</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    @foreach ($comment->reply as $reply)
                                    <div class="comment reply-1">
                                        <div id="comment-{{$reply->id}}">
                                        <div class="d-flex">
                                            @if(!empty($reply->user->image))
                                            <div class="comment-img"><img src="{{asset('storage/'.$reply->user->image)}}" alt="">
                                            </div>
                                            @else
                                            @php
                                            $text=strtoupper(substr($reply->user->name,0,2));
                                            @endphp
                                             <div class="comment-user-img"><span>{{$text}}</span></div>
                                            @endif
                                            <div>
                                                <h5><a href="">{{$reply->user->name}}</a> </h5>
                                                <time datetime="2020-01-01">{{date('d M Y H:i',strtotime($reply->created_at))}}</time>
                                                <p>{{$reply->content}}</p>
                                                <div class="meta-top">
                                                    <div class="like-rep" id="{{$reply->id}}" data-comment="{{$reply->id}}">
                                                        <a href="javascript:void(0)" class="like-l"><i
                                                                class="fa-solid fa-thumbs-up"></i> <span>{{$reply->like}}</span> </a>
                                                                   <a href="javascript:void(0)" class="dislike-l"><i
                                                                class="fa-solid fa-thumbs-down"></i> <span>{{$reply->dislike}}</span> </a>
                                                        <a href="javascript:void(0)" class="reply-b"><i
                                                                class="bi bi-reply-fill"></i> Reply</a>
                                                                @if($reply->user->id==Auth::user()->id)
                                                                <a href="{{route('arena.delete',['reply'=>$reply->id])}}" class="reply-d" ><i
                                                                    class="bi bi-trash2"></i>Delete</a>
                                                                @endif
                                                        <div class="replay-box">
                                                            <form action="" class="reply-form">
                                                                <input type="hidden" name="comment_id" value="{{$reply->id}}">
                                                                <div class="row m-0 p-0">
                                                                    <div class="col-md-12 form-group">
                                                                        <textarea name="comment" width="200" class="form-control" placeholder="Add a reply*"></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="reply_btn" class="btn btn-primary">
                                                                     <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                                                                    Reply</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    @foreach ($reply->reply as $reply1)
                                    <div  class="comment reply-2">
                                        <div id="comment-{{$reply1->id}}">
                                        <div class="d-flex">
                                            @if(!empty($reply1->user->image))
                                            <div class="comment-img"><img src="{{asset('storage/'.$reply1->user->image)}}" alt="">
                                            </div>
                                            @else
                                             @php
                                            $text=strtoupper(substr($reply1->user->name,0,2));
                                            @endphp
                                             <div class="comment-user-img"><span>{{$text}}</span></div>
                                             
                                            @endif
                                            <div>
                                                <h5><a href="">{{$reply1->user->name}}</a> </h5>
                                                <time datetime="2020-01-01">{{date('d M Y H:i',strtotime($reply1->created_at))}}</time>
                                                <p>{{$reply1->content}}</p>
                                                <div class="meta-top">
                                                    <div class="like-rep" id="{{$reply1->id}}"  data-comment="{{$reply1->id}}">
                                                        <a href="javascript:void(0)" class="like-l"><i
                                                                class="fa-solid fa-thumbs-up"></i><span>{{$reply1->like}}</span></a>
                                                        <a href="javascript:void(0)" class="dislike-l"><i
                                                                class="fa-solid fa-thumbs-down"></i><span>{{$reply1->like}}</span></a>
                                                        <a href="javascript:void(0)" class="reply-b" ><i
                                                                class="bi bi-reply-fill"></i> Reply</a>
                                                                   @if($reply1->user->id==Auth::user()->id)
                                                                <a href="{{route('arena.delete',['reply'=>$reply1->id])}}" class="reply-d ml-2" ><i
                                                                    class="bi bi-trash2"></i>Delete</a>
                                                                    @endif
                                                        <div class="replay-box">
                                                            <form action="" class="reply-form">
                                                                <input type="hidden" name="comment_id" value="{{$reply1->id}}">
                                                                <div class="row m-0 p-0">
                                                                    <div class="col-md-12 form-group">
                                                                        <textarea name="comment" width="200" class="form-control" placeholder="Add a reply*"></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="reply_btn" class="btn btn-primary">
                                                                     <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                                                                    Reply</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    @foreach ($reply1->reply as $reply2)
                                    <div class="comment reply-3">
                                        <div id="comment-{{$reply2->id}}">
                                            <div class="d-flex">
                                                @if(!empty($reply2->user->image))
                                                <div class="comment-img"><img src="{{asset('storage/'.$reply2->user->image)}}" alt="">
                                                </div>
                                                @else
                                                 @php
                                                $text=strtoupper(substr($reply2->user->name,0,2));
                                                @endphp
                                                  <div class="comment-user-img"><span>{{$text}}</span></div>
                                                 
                                                @endif
                                                <div>
                                                    <h5><a href="">{{$reply2->user->name}}</a> </h5>
                                                    <time datetime="2020-01-01">{{date('d M Y H:i',strtotime($reply2->created_at))}}</time>
                                                    <p>{{$reply2->content}}</p>
                                                    <div class="meta-top">
                                                        <div class="like-rep" id="{{$reply2->id}}" data-comment="{{$reply2->id}}">
                                                            <a href="javascript:void(0)" class="like-l"><i
                                                                    class="fa-solid fa-thumbs-up"></i> {{$reply2->like}} </a>
                                                                     <a href="javascript:void(0)" class="dislike-l"><i
                                                                    class="fa-solid fa-thumbs-down"></i> {{$reply->dislike}} </a>
                                                            <a href="javascript:void(0)" class="reply-b" ><i
                                                                    class="bi bi-reply-fill"></i> Reply</a>
                                                                    @if($reply2->user->id==Auth::user()->id)
                                                                    <a href="{{route('arena.delete',['reply'=>$reply2->id])}}" class="reply-d" ><i
                                                                        class="bi bi-trash2"></i>Delete</a>
                                                                    @endif
                                                            <div class="replay-box">
                                                                <form action="" class="reply-form">
                                                                    <input type="hidden" name="comment_id" value="{{$reply2->id}}">
                                                                    <div class="row m-0 p-0">
                                                                        <div class="col-md-12 form-group">
                                                                            <textarea name="comment" width="200" class="form-control" placeholder="Add a reply*"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="reply_btn" class="btn btn-primary">
                                                                         <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                                                                        Reply</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($reply2->reply as $reply3)
                                    <div class="comment reply-4">
                                        <div id="comment-{{$reply3->id}}">
                                            <div class="d-flex">
                                                @if(!empty($reply3->user->image))
                                                <div class="comment-img"><img src="{{asset('storage/'.$reply3->user->image)}}" alt="">
                                                </div>
                                                @else
                                                 @php
                                                $text=strtoupper(substr($reply3->user->name,0,2));
                                                @endphp
                                                  <div class="comment-user-img"><span>{{$text}}</span></div>
                                                @endif
                                                <div>
                                                    <h5><a href="">{{$reply3->user->name}}</a> </h5>
                                                    <time datetime="2020-01-01">{{date('d M Y H:i',strtotime($reply3->created_at))}}</time>
                                                    <p>{{$reply3->content}}</p>
                                                    <div class="meta-top">
                                                        <div class="like-rep" id="{{$reply3->id}}" data-comment="{{$reply3->id}}">
                                                            <a href="javascript:void(0)" class="like-l"><i
                                                                    class="fa-solid fa-thumbs-up"></i><span>{{$reply3->like}}</span></a>
                                                                     <a href="javascript:void(0)" class="dislike-l"><i
                                                                    class="fa-solid fa-thumbs-down"></i><span>{{$reply3->dislike}}</span></a>
                                                            <a href="javascript:void(0)" class="reply-b" ><i
                                                                    class="bi bi-reply-fill"></i> Reply</a>
                                                                      @if($reply3->user->id==Auth::user()->id)
                                                                    <a href="{{route('arena.delete',['reply'=>$reply3->id])}}" class="reply-d ml-2" ><i
                                                                        class="bi bi-trash2"></i>Delete</a>
                                                                        @endif
                                                            <div class="replay-box">
                                                                <form action="" class="reply-form">
                                                                    <input type="hidden" name="comment_id" value="{{$reply3->id}}">
                                                                    <div class="row m-0 p-0">
                                                                        <div class="col-md-12 form-group">
                                                                            <textarea name="comment" width="200" class="form-control" placeholder="Add a reply*"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="reply_btn" class="btn btn-primary">
                                                                         <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                                                                        Reply</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @foreach ($reply3->reply as $reply4)
                                    <div class="comment reply-5" >
                                        <div id="comment-{{$reply4->id}}" >
                                            <div class="d-flex">
                                                @if(!empty($reply4->user->image))
                                                <div class="comment-img"><img src="{{asset('storage/'.$reply4->user->image)}}" alt="">
                                                </div>
                                                @else
                                                 @php
                                                $text=strtoupper(substr($reply4->user->name,0,2));
                                                @endphp
                                                  <div class="comment-user-img"><span>{{$text}}</span></div>
                                                 
                                                  @endif
                                                <div>
                                                    <h5><a href="">{{$reply4->user->name}}</a> </h5>
                                                    <time datetime="2020-01-01">{{date('d M Y H:i',strtotime($reply4->created_at))}}</time>
                                                    <p>{{$reply3->content}}</p>
                                                    <div class="meta-top">
                                                        <div class="like-rep" id="{{$reply4->id}}" data-comment="{{$reply4->id}}">
                                                            <a href="javascript:void(0)" class="like-l"><i
                                                                    class="fa-solid fa-thumbs-up"></i> <span>{{$reply4->like}}</span> </a>
                                                                     <a href="javascript:void(0)" class="dislike-l"><i
                                                                    class="fa-solid fa-thumbs-down"></i> <span>{{$reply4->dislike}}</span> </a>
                                                            <a href="javascript:void(0)" class="reply-b" ><i
                                                                    class="bi bi-reply-fill"></i> Reply</a>
                                                                      @if($reply4->user->id==Auth::user()->id)
                                                                    <a href="{{route('arena.delete',['reply'=>$reply4->id])}}" class="reply-d ml-2" ><i
                                                                        class="bi bi-trash2"></i>Delete</a>
                                                                        @endif
                                                            <div class="replay-box">
                                                                <form action="" class="reply-form">
                                                                    <input type="hidden" name="comment_id" value="{{$reply4->id}}">
                                                                    <div class="row m-0 p-0">
                                                                        <div class="col-md-12 form-group">
                                                                            <textarea name="comment" width="200" class="form-control" placeholder="Add a reply*"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="reply_btn" class="btn btn-primary">
                                                                         <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                                                                        Reply</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>


                            @empty
                            <div id="comment-1" class="comment">
                                <div class="d-flex">
                                    <div class="comment-img"><img src="{{asset('img/blog-comment/Dakota.jpg')}}" alt="">
                                    </div>
                                    <div>
                                        <h5><a href="">Marshall </a> </h5>
                                        <time datetime="2020-01-01">18 Nov,2022</time>
                                        <p> The sobriety group helps me deal with temptation and relapsing urge issues.
                                            Please join a sobriety group in your area or online for anyone dealing with a
                                            relapsing urge.</p>
                                        <div class="meta-top">
                                            <div class="like-rep">
                                                <a href="javascript:void(0)" class="like-l"><i
                                                        class="fa-solid fa-thumbs-up"></i> 5 </a>
                                                <a href="javascript:void(0)" class="reply-b"><i
                                                        class="bi bi-reply-fill"></i> Reply</a>
                                                        <a href="javascript:void(0)" class="reply-b" ><i
                                                            class="bi bi-trash2"></i>Delete</a>
                                                <div class="replay-box">
                                                    <form action="" class="reply-form">

                                                        <div class="row m-0 p-0">
                                                            <div class="col form-group">
                                                                <textarea name="comment" class="form-control" placeholder="Add a reply*"></textarea>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">
                                                             <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>Reply</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>

                        @include('arena.batter_box')
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
