@extends('parent')

@section('content')
@include('navs.hero')
<style>

.discriptions{
    max-height:118px;
    overflow:hidden;
}
.discriptions p{
   
}

.admin-text p{
    font-size:16px;
    font-weight:bold;
}

#header.header-scrolled .logo img {
    filter: brightness(1) !important;
}
#header .logo img {
    filter: brightness(999999) !important;
}
.navbar a, .navbar a:focus {
  
    color: #f7f7f7;
 
}
  .navbar a, .navbar .active {
  
    color: #f7f7f7;
  
}
.header-scrolled .mobile-nav-toggle {
    color: #000 !important;
}
.mobile-nav-toggle {
    color: #fff !important;
}
 #header .navbar.navbar-mobile a{
    color:#000 !important;
}
.navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover > a {
  color: #ff6d6d !important;
}
.col-lg-8.col-md-12.blog-list-sec .row {
  display: flex;
  flex-direction: column-reverse;
}
.user-img{
    height:50px;
    width:50px;
    border-radius:50%;
    background:#063b78;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-right:14px;
}
.user-img .name_char{
    font-size:20px;
    font-weight:30px;
}
</style>
<main id="main" class="">
    <!--<section id="trending" class="trending-Media">-->
    <!--   <div class="container">-->
    <!--      <div class="row">-->
    <!--         <div class="col-12 trending-head">-->
    <!--            <h4><span><i class="fa-solid fa-arrow-trend-up"></i></span>TRENDING ON AVRT</h4>-->
    <!--         </div>-->
    <!--         <div class="col-lg-4 col-md-6 col-12 pt-3">-->
    <!--            <div class="list-trending">-->
    <!--               <ul>-->
    <!--                  <li class="number-trending"><span>01</span></li>-->
    <!--                  <li class="content-trending">-->
    <!--                     <div class="admin-blog">-->
    <!--                        <div class="admin-img"><img src="{{asset('img/admin/6.jpg')}}" class="img-fluid" alt=""></div>-->
    <!--                        <div class="admin-text">-->
    <!--                           <p>Admin</p>-->
    <!--                        </div>-->
    <!--                     </div>-->
    <!--                     <div class="admin-head">-->
    <!--                        <a href="https://avrt.com/avrt/post/coming-presently.">-->
    <!--                           <h5>Coming Presently.</h5>-->
    <!--                        </a>-->
    <!--                        <ul>-->
    <!--                           <li>Jan 30</li>-->
    <!--                           <li>.</li>-->
    <!--                           <li>10 min read</li>-->
    <!--                        </ul>-->
    <!--                     </div>-->
    <!--                  </li>-->
    <!--               </ul>-->
    <!--            </div>-->
    <!--         </div>-->
             
             
             <!-- <div class="col-lg-6 col-md-6 col-12 pt-3">-->
             <!--   <div class="list-trending">-->
             <!--      <ul>-->
             <!--         <li class="number-trending"><span>02</span></li>-->
             <!--         <li class="content-trending">-->
             <!--            <div class="admin-blog">-->
             <!--               <div class="admin-img"><img src="{{asset('img/admin/6.jpg')}}" class="img-fluid" alt=""></div>-->
             <!--               <div class="admin-text">-->
             <!--                  <p>Admin</p>-->
             <!--               </div>-->
             <!--            </div>-->
             <!--            <div class="admin-head">-->
             <!--               <a href="https://avrt.com/avrt/post/come-on-lets-get-normal-again-in-great-america">-->
             <!--                  <h5>Come on! Let's Get Normal Again in Great America</h5>-->
             <!--               </a>-->
             <!--               <ul>-->
             <!--                  <li>Jan 19</li>-->
             <!--                  <li>.</li>-->
             <!--                  <li>10 min read</li>-->
             <!--               </ul>-->
             <!--            </div>-->
             <!--         </li>-->
             <!--      </ul>-->
             <!--   </div>-->
             <!--</div>-->
             <!--<div class="col-lg-4 col-md-6 col-12 pt-3" >-->
             <!--   <div class="list-trending">-->
             <!--      <ul>-->
             <!--         <li class="number-trending"><span>02</span></li>-->
             <!--         <li class="content-trending">-->
                        
             <!--            <div class="admin-head">-->
             <!--               <a href="javascript::void(0)">-->
             <!--                  <h5>What Is Behavioral Addiction? How Should One Handle Them?</h5>-->
             <!--               </a>-->
             <!--               <ul>-->
             <!--                  <li>UPCOMING BLOG</li>-->
             <!--                  </ul>-->
             <!--            </div>-->
             <!--         </li>-->
             <!--      </ul>-->
             <!--   </div>-->
             <!--</div>-->
    <!--         <div class="col-lg-4 col-md-6 col-12 pt-3">-->
    <!--            <div class="list-trending">-->
    <!--               <ul>-->
    <!--                  <li class="number-trending"><span>03</span></li>-->
    <!--                  <li class="content-trending">-->
                         
    <!--                     <div class="admin-head">-->
    <!--                        <a href="javascript::void(0)">-->
    <!--                           <h5>What Is Substance Addiction? How Should One Handle Them?</h5>-->
    <!--                        </a>-->
    <!--                        <ul>-->
    <!--                           <li>UPCOMING BLOG</li>-->
    <!--                        </ul>-->
    <!--                     </div>-->
    <!--                  </li>-->
    <!--               </ul>-->
    <!--            </div>-->
    <!--         </div>-->
    <!--      </div>-->
    <!--   </div>-->
    <!--</section>-->
    <section class="blog-section py-4">
       <div class="container">
          <div class="row">
             <div class="col-lg-8 col-md-12 blog-list-sec">
                <div class="row">
                    @forelse($posts as $post)
                   <div class="col-12 mt-3">
                      <div class="list-trending">
                         <ul>
                            <li class="content-trending">
                               <div class="admin-blog">
                                  @if(!empty($post->user->image))
                                   <div class="user-img"><img src="{{asset('storage/'.$post->user->image)}}" class="img-fluid" alt=""></div>
                                  @else
                                  @php
                                   $text=substr($post->user->name,0,2);
                                   $name_char=strtoupper($text);
                                  @endphp
                                  <div class="user-img"><span class="name_char">{{$name_char}}</span></div>
                                  @endif
                                  <div class="admin-text">
                                     <p class="">{{$post->user->name}}</p>
                                  </div>
                               </div>
                               <div class="admin-head">
                                  <a href="{{route('avrt.idea.slug',['slug'=>$post->slug])}}">
                                     <h5>{{$post->title}}</h5>
                                  </a>
                                  <div class="discriptions">{!! $post->description !!}</div>
                                  <ul>
                                     <li>{{date('d M y',strtotime($post->created_at))}}</li>
                                     <li>.</li>
                                     <li> 10 min read</li>
                                     <li><a href="{{route('avrt.idea.slug',$post->slug)}}">@if(!empty($post->comments)){{$post->comments->count()}} Comments @else 0 Comments @endif</a></li>
                                  </ul>
                               </div>
                            </li>
                            <li class="number-trending">
                               <a href="{{route('avrt.idea.slug',$post->slug)}}"><img src="{{asset('storage/'.$post->image)}}" class="img-fluid" alt=""></a>
                            </li>
                         </ul>
                      </div>
                   </div>
                    @empty
                    
                    
                    
                         <div class="col-12 mt-3">
                      <div class="list-trending">
                         <ul>
                            <li class="content-trending">
                               <div class="admin-blog">
                                  <div class="admin-img"><img src="{{asset('img/admin/2.jpg')}}" class="img-fluid" alt=""></div>
                                  <div class="admin-text">
                                     <p>Admin </p>
                                  </div>
                               </div>
                               <div class="admin-head">
                                  <a href="what-are-the-top-life-changing-benefits-of-a-sober-life.php">
                                     <h5>What Are The Top Life-changing Benefits Of A Sober Life</h5>
                                  </a>
                                  <P>When you decide to become sober, you might think your life will become boring. Whether you’re new to sober or sober curious, living a sober life may feel scary and intimidating. However...</P>
                                  <ul>
                                     <li>Nov 24  </li>
                                     <li>.</li>
                                     <li> 5 min read</li>
                                     <li><a href="what-are-the-top-life-changing-benefits-of-a-sober-life.php#comment-b-2">2 Comments</a></li>
                                  </ul>
                               </div>
                            </li>
                            <li class="number-trending">
                               <a href="what-are-the-top-life-changing-benefits-of-a-sober-life.php"><img src="{{asset('img/blog-2.jpg')}}" class="img-fluid" alt=""></a>
                            </li>
                         </ul>
                         
                         
                      </div>
                   </div>
                    @endforelse
                </div>
             </div>
             <div class="col-lg-4 col-md-12 ps-4 right-side-blog-list">
                <!--<div class="mt-4">-->
                <!--   <a href="https://www.amazon.com/Rational-Recovery-Cure-Substance%20Addiction/dp/0671528580/ref=sr_1_1?s=books&ie=UTF8&qid=1343163824&sr=1-%201&keywords=Rational+Recovery" target="_blank">-->
                <!--   <img src="{{asset('img/book-avrt.jpg')}}" class="img-fluid" alt="">-->
                <!--   </a>-->
                <!--</div>-->
                <!--<h4 class="mt-4"> CATEGORIES</h4>-->
                <!--<ul>-->
                <!--   <li>“Will you use, ever again?”   </li>-->
                <!--   <li>Essential AVRT® Concepts/Jargon </li>-->
                <!--   <li>AVRTips </li>-->
                <!--   <li>AVRTheology </li>-->
                <!--   <li>Pharmakeia </li>-->
                <!--   <li>Occult Sobriety Disorder </li>-->
                <!--   <li>Family Politics </li>-->
                <!--   <li>Lois Remembers </li>-->
                <!--   <li>Prohibition Two and Social Policy </li>-->
                <!--   <li>Life After Sobriety </li>-->
                <!--</ul>-->
             </div>
          </div>
       </div>
    </section>
    <!--<section id="why-us" class="why-us section-bg">-->
    <!--   <div class="container aos-init aos-animate" data-aos="fade-up">-->
    <!--      <div class="row justify-content-center">-->
    <!--         <div class="col-lg-9 col-md-12   ">-->
    <!--            <div class="content text-center">-->
    <!--               <h3><strong>The AVRT® Arena (AA) </strong></h3>-->
    <!--            </div>-->
    <!--            <div class="question mt-5">-->
    <!--               <h3 class="">If I smoke cannabis but don't drink or use drugs, can I still call myself "sober"?</h3>-->
    <!--               <p><strong>Answer: </strong> When trying to quit cannabis after long-term usage causes withdrawal symptoms like anxiety, cravings, decreased appetite, sleeplessness, etc., it puts cannabis into the intoxicating drug category and, therefore, smoking cannabis alone won't put you in the sober category.</p>-->
    <!--            </div>-->
    <!--            <div class="question mt-4">-->
    <!--               <h3 class="">How many times must I go through rehab to stay sober?</h3>-->
    <!--               <p><strong>Answer: </strong>  It depends on the spectrum of the severity of the addiction. Accordingly, some people take 2 to 3 attempts, while others make many attempts to overcome the addiction.</p>-->
    <!--            </div>-->
    <!--            <div class="question mt-4">-->
    <!--               <h3 class="">How can I reduce the effect of alcohol immediately after its consumption?</h3>-->
    <!--               <p><strong>Answer: </strong>  If you want to reduce the effect of alcohol immediately after its consumption, try puking or triggering yourself to throw up. When you throw up, the alcohol is ejected out of your system, therefore decreasing its effects on the body. Eating something along with boozing also helps in the dilution of the impact.</p>-->
    <!--            </div>-->
    <!--            <div class="question mt-4">-->
    <!--               <h3 class="">If my body gets detoxified of the substances in the first step, why do I need to complete the rehab process?</h3>-->
    <!--               <p><strong>Answer: </strong>  Depending on the drug, your body starts showing withdrawal symptoms when you go through the natural detox process. As a result, you may need various therapy sessions or treatment programs to address the root cause of substance abuse. Rehab centers already run these programs, and they also provide you with new coping mechanisms and alternative programs to prevent relapse and provide holistic treatment.</p>-->
    <!--            </div>-->
    <!--            <div class="question mt-4">-->
    <!--               <h3 class="">How does meditation help in staying on the course of sobriety resolution?</h3>-->
    <!--               <p><strong>Answer: </strong> Meditation is a breathing technique that controls your breath and increases awareness. It trains your mind to stay calm and thus regulates your emotions and anxiety associated with withdrawal symptoms.</p>-->
    <!--            </div>-->
    <!--         </div>-->
    <!--      </div>-->
    <!--   </div>-->
    <!--</section>-->
 </main>
@endsection
