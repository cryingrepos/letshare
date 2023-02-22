@extends('parent')
@section('content')
    <main id="main">
          <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{route('avrt.home')}}">Home</a></li>
          <li>Who are We</li>
        </ol>
        <h2>Who are We</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Frequently Asked Questions Section ======= -->
 <section id="skills" class="skills">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row align-items-center">
          <div class="col-lg-6 d-flex align-items-center aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
            <img src="{{asset('img/who.jpg')}}" alt="" class="img-fluid">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
            <h3>We Strive To Help You Achieve Addiction Free Days</h3>
            <p class="who-are-we">
           Are you looking to make a big change in your life? You have come to the right place. At AVRT, our mission is to help people overcome substance addiction. Many people want to stop drinking and using drugs but continue. They continued to drink despite the negative consequences. They wanted to quit drinking; on the other hand, they didn't. Addictive Voice Recognition Technique® allows people to recover immediately and entirely from addiction to alcohol or drugs. It is a natural way to recover from substance abuse, alcohol or drug dependence, or addiction.


            </p>



          </div>
        </div>

      </div>
    </section>

 <section id="cta" class="cta">
      <div class="container aos-init aos-animate" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Looking For Support?</h3>
            <p> AVRT has thousands of dedicated members. Join the Forum!</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register">Register</a>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection
