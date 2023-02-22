@extends('parent')
@section('content')
<style>
    #message_submit{
        background:#063b78 !important;
        padding:10px 20px 10px 20px;
        border-radius:2px;
        color:white;
    }
</style>
      <main id="main">
         <!-- ======= Breadcrumbs ======= -->
         <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
               <ol>
                  <li><a href="{{route('avrt.home')}}">Home</a></li>
                  <li>Contact Us</li>
               </ol>
               <h2>Contact Us</h2>
            </div>
         </section>
         <!-- End Breadcrumbs -->
         <!-- ======= Contact Section ======= -->
         <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Get In Touch</h2>
                  <p>Do you have any questions related to addiction recovery? We've got you covered 24/7. Please fill up the form given below to connect with our customer support team. Also, you can call or email us. Thank you!</p>
               </div>
               <div class="row">
                  <div class="col-lg-5 d-flex align-items-stretch">
                     <div class="info">
                        <!--<div class="address">-->
                        <!--   <i class="bi bi-geo-alt"></i>-->
                        <!--   <h4>Location:</h4>-->
                        <!--   <p> Box 800, Lotus CA 95651</p>-->
                        <!--</div>-->
                        <div class="email">
                           <i class="bi bi-envelope"></i>
                           <h4>Email:</h4>
                           <p><a href="mailto:avrt@avrt.com">avrt@avrt.com</a></p>
                        </div>
                        <!--<div class="phone">-->
                        <!--   <i class="bi bi-phone"></i>-->
                        <!--   <h4>Call:</h4>-->
                        <!--   <p><a href="tel:530-621-4374">530-621-4374</a></p>-->
                        <!--</div>-->
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3109.153631726035!2d-120.92424918432718!3d38.80603295992881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809aff962f23c5d3%3A0xdf3dc05312a2aea8!2sCamp%20Lotus!5e0!3m2!1sen!2sin!4v1669725172053!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>-->
                     </div>
                  </div>
                  <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                     <form action="{{route('avrt.contact.store')}}" method="post" role="form" class="php-email-form">
                        <div class="row">
                           <!--<div class="form-group col-md-6">-->
                           <!--   <label for="name">Your Name</label>-->
                           <!--   <input type="text" name="name" class="form-control" id="name" required>-->
                           <!--</div>-->
                           <div class="form-group col-md-12">
                              <label for="name">Your Email</label>
                              <input type="email" class="form-control" name="email" id="email" >
                              <div class="error-messag" id="email_error"><span class="text-danger"></span></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="name">Subject</label>
                           <input type="text" class="form-control" name="subject" id="subject" required>
                            <div class="error-messag" id="subject_error"><span class="text-danger"></span></div>
                        </div>
                        <div class="form-group">
                           <label for="name">Message</label>
                           <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
                           <div class="error-messag" id="msg_error"><span class="text-danger"></span></div>
                        </div>
                        <div class="my-3">
                           @if(Session::has('success'))
                           <div class="text-danger">Your message has been sent. Thank you!</div>
                           @endif
                        </div>
                        <div class="text-center"><button type="button" id="message_submit">Send Message</button></div>
                        @csrf
                     </form>
                  </div>
               </div>
            </div>
         </section>
         <!-- End Contact Section -->
      </main>
@endsection
@section('customScript')
<script>
  $(function(){
      $(document).on('keyup','input',function(){
         $(this).next('div').find('span').text('');
      });
       $(document).on('keyup','textarea',function(){
          $('#msg_error').find('span').text('');
      });
   $('#message_submit').on('click',function(){
let email=$('#email').val();
let message=$('#message').val();
let subject=$('#subject').val();
let regex=/^\b[A-Z0-9._]+@[A-Z0-9]+\.[A-Z]{2,4}\b$/i
error=false;
if(regex.test(email)==false){
error=true;
  $('#email_error').find('span').text('Enter A Valid Email');
}
if(message.length==0){
    error=true;
    $('#msg_error').find('span').text('Enter A valid Message');
}
if(subject.length==0){
    error=true;
    $('#subject_error').find('span').text('Enter A valid Subject');
}
if(error==false){
 $(this).parent().parent().submit();
}
    });
   });
</script>

@endsection
