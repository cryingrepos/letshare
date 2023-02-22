@extends('parent')
@section('content')
<main id="main">
          <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{route('avrt.home')}}">Home</a></li>
          <li>Services</li>
        </ol>
        <h2>Services</h2>

      </div>
    </section><!-- End Breadcrumbs -->


   <section id="services" class="services section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2>Services We Offer</h2>

        </div>

        <div class="row">
          <div class="col-xl-6 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><img src="{{asset('img/Teleconference.jpg')}}" alt="" class="img-fluid"></div>
              <h4><a href="javascript:void(0)">Teleconference</a></h4>
              <p>We provide 24/7 teleconference services to help and support you in your sobriety journey.</p>

              <!--<a class="getstarted scrollto service-btn" href="#about">Read More</a>-->
            </div>
          </div>

          <div class="col-xl-6 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><img src="{{asset('img/Apple-FaceTime-Android-Duo.jpg')}}" alt="" class="img-fluid"></div>
              <h4><a href="javascript:void(0)">Apple-FaceTime/Android-Duo</a></h4>
              <p>We are also available on Apple-FaceTime as well as Android Duo to help you overcome substance addiction.</p>
               <!--<a class="getstarted scrollto service-btn" href="#about">Read More</a>-->
            </div>
          </div>

          <!--<div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">-->
          <!--  <div class="icon-box">-->
          <!--    <div class="icon"><img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid"></div>-->
          <!--    <h4><a href="">Magni Dolores</a></h4>-->
          <!--    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>-->
          <!--  </div>-->
          <!--</div>-->


        </div>

      </div>
    </section>


  </main><!-- End #main -->
@endsection
