<div class="sidebar">
    <!--<div class="sidebar-item search-form">-->
    <!--   <h3 class="sidebar-title">Search</h3>-->
    <!--   <form action="" class="mt-3"> <input type="text"> <button type="submit"><i class="bi bi-search"></i></button></form>-->
    <!--</div>-->

    <div class="sidebar-item recent-posts">
       <h3 class="sidebar-title">Recent Posts</h3>
        <div class="mt-3">
       @forelse($recents as $recent)
      
          <div class="post-item mt-3">
             <img src="{{asset('storage/'.$recent->image)}}" alt="">
             <div>
                <h4><a href="{{route('avrt.idea.slug',['slug'=>$recent->slug])}}">{{$recent->title}}</a></h4>
                <time datetime="2020-01-01">{{date('M d,Y',strtotime($recent->created_at))}}</time>
             </div>
          </div>
       
      
       @empty
        </div>
        <div class="post-item mt-3">
             <img src="{{asset('img/blog-1.jpg')}}" alt="">
             <div>
                <h4><a href="javascript::void(0)">No Recent Post Avialable</a></h4>
                <time datetime="2020-01-01">date('M d,Y')</time>
             </div>
          </div>
       @endforelse
    </div>

 </div>
