 <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo me-auto"><a href="index.php"> AVRT</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="{{route('avrt.home')}}" class="logo me-auto"><img src="{{asset('img/Logo.png')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
           @forelse($frontnavs as $nav)
               <li>
                   <a class="nav-link scrollto @if($nav->applet_name=='home') active @endif" href="{{$nav->applet_slug}}">{{ucfirst($nav->applet_name)}}</a>
              </li>
            @empty
               <li><a class="nav-link scrollto active" href="javascript:void(0)" >Please Create Navs</a></li>
            @endforelse
          <li>
         
          </li>
          <li>
           @if(Auth::check())
           <form action="{{route('auth.logout')}}" method="post">
            <button type="button" class="getstarted scrollto" onclick="this.form.submit()">Logout</button>
            @csrf
           </form>
           @else
           <button type="button" class="getstarted scrollto" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Started</button>
           @endif
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
