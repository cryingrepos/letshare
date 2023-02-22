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
                  <li>Password Change</li>
               </ol>
               <h2>Password Reset</h2>
            </div>
         </section>
      
         <!-- End Breadcrumbs -->
         <!-- ======= Contact Section ======= -->
         <section id="contact" class="contact">
              @if(Session::has('Success'))
         <div class="row d-flex justify-content-center">
            <div class="col-lg-6 m-4">
             <p class="text-danger alert alert-success"><span class="">{{Session::get('Success')}}</span></p>
           </div>    
         </div>
         @endif
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Reset Your Password</h2>
                  <p>Please fill up the form given below to reset your password.If you facing any issue connect with our customer support team. Also, you can call or email us. Thank you!</p>
               </div>
               <div class="row">
                  <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
                     <form action="{{route('auth.change.password')}}" method="post" role="form" class="php-email-form">
                        <div class="row">
                           <!--<div class="form-group col-md-6">-->
                           <!--   <label for="name">Your Name</label>-->
                           <!--   <input type="text" name="name" class="form-control" id="name" required>-->
                           <!--</div>-->
                           <div class="form-group col-md-12">
                              <label for="name">Your Email</label>
                              <input type="email" class="form-control" name="email" id="email" value="{{$email}}" >
                              <div class="error-messag" id="email_error"><span class="text-danger"></span></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="name">New Password</label>
                           <input type="password" class="form-control" name="password" id="password" >
                            <div class="error-messag" id="password_error"><span class="text-danger"></span></div>
                        </div>
                        <div class="form-group">
                           <label for="name">Confirm Password</label>
                            <input type="text" class="form-control"  id="confirm" >
                           <div class="error-messag" id="confirm_pass_error"><span class="text-danger"></span></div>
                        </div>
                        <div class="my-3">
                           @if(Session::has('success'))
                           <div class="text-danger">Your Password SuccessFully Changed!</div>
                           @endif
                        </div>
                        <div class="text-center"><button type="button" id="message_submit">Change Password</button></div>
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
   $('#message_submit').on('click',function(){
let email=$('#email').val();
let password=$('#password').val();
let confirm=$('#confirm').val();
let regex=/^\b[A-Z0-9._]+@[A-Z0-9]+\.[A-Z]{2,4}\b$/i
error=false;
if(regex.test(email)==false){
error=true;
  $('#email_error').find('span').text('Enter A Valid Email');
}
if(password.length==0 || password.length<6){
    error=true;
    $('#password_error').find('span').text('Enter A valid Password and Length should be six character long');
}
if(confirm!=password){
    error=true;
    $('#confirm_pass_error').find('span').text('Confirm password must be same as password');
}
if(error==false){
 $(this).parent().parent().submit();
}
    });
   });
</script>

@endsection
