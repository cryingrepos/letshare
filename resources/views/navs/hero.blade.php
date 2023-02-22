<style>
/*    .hero-img {*/
/*    display: block;*/
/*     position: inherit;*/
/*}*/


</style>
<section id="hero" class="d-flex align-items-center">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12 col-12  d-flex flex-column justify-content-center pt-4 pt-lg-0 text-center" data-aos="fade-up" data-aos-delay="200">
             <h1>Addictive Voice Recognition Technique®</h1>
             <h2 class="">The revolutionary approach to overcoming alcohol and drug dependence.</h2>
             <div class="d-flex justify-content-center ">
                @if(Auth::check())
                @if(Auth::user()->role=='3')
                <a href="{{route('dashboard')}}" class="btn-get-started scrollto">{{Auth::user()->name}}</a>
                @else
                <a href="javascript:void(0)" class="btn-get-started scrollto" >{{Auth::user()->name}}</a>
                @endif
                @else
                <a href="javascript:void(0)" class="btn-get-started scrollto"   data-bs-toggle="modal" data-bs-target="#register">Register</a>
                @endif
             </div>
          </div>
          <!--<div class="col-lg-5 col-md-5 col-5  hero-img" data-aos="zoom-in" data-aos-delay="200">-->
          <!--   <img src="{{asset('img/avrt.gif')}}" class="img-fluid">-->
            
          <!--</div>-->
       </div>
    </div>
 </section>
