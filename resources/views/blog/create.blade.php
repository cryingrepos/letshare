@extends('parent')

@section('content')
<style>
    .create_button{
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
                  <li>Blog</li>
               </ol>
               <h2>Blog Create</h2>
            </div>
         </section>
         <!-- End Breadcrumbs -->
         <!-- ======= Contact Section ======= -->
         <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Blog Create</h2>
                  <p>Blog topic must related to addiction recovery? Please fill up the form given below to create blog. Thank you!</p>
               </div>
               <div class="row">
                  <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
                     <form action="{{route('avrt.blog.store')}}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                        <!--<div class="row">-->
                        <!--   <div class="form-group col-md-6">-->
                        <!--      <label for="name">Your Name</label>-->
                        <!--      <input type="text" name="name" class="form-control" id="name" required>-->
                        <!--   </div>-->
                        <!--   <div class="form-group col-md-6">-->
                        <!--      <label for="name">Your Email</label>-->
                        <!--      <input type="email" class="form-control" name="email" id="email" >-->
                        <!--      <div class="error-messag" id="email_error"><span class="text-danger"></span></div>-->
                        <!--   </div>-->
                        <!--</div>-->
                        <div class="row">
                               <div class="form-group col-12 col-lg-6">
                           <label for="name">Blog Title</label>
                           <input type="text" class="form-control" name="title" id="title" required>
                            <div class="error-messag" id="title_error"><span class="text-danger"></span></div>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                           <label for="name">Blog Image</label>
                           <input type="file" class="form-control" name="image" id="image"  required>
                            <div class="error-messag" id="image_error"><span class="text-danger"></span></div>
                        </div> 
                            
                        </div>
                    
                        <div class="form-group">
                           <label for="name">Blog Content</label>
                           <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
                           <div class="error-messag" id="content_error"><span class="text-danger"></span></div>
                        </div>
                        <div class="my-3">
                           @if(Session::has('success'))
                           <div class="text-danger">Your message has been sent. Thank you!</div>
                           @endif
                        </div>
                        <div class="text-center"><button type="button" class="create_button" id="message_submit">Create Blog</button></div>
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
      $('textarea').summernote({
          height:200
      });
      $(document).on('keyup','input',function(){
          $(this).next('div').find('span').text('');
      });
        $(document).on('keyup','.note-editable',function(){
          $('#content_error').find('span').text('');
      });
        $(document).on('change','input',function(){
          $(this).next('div').find('span').text('');
      });
   $('#message_submit').on('click',function(){

let content=$('#message').val();
let title=$('#title').val();
let error=false;
if(title.length==0){
    $('#title_error').find('span').text('Enter A Valid Title');
    error=true;
}
if(content.length==0){
    
    $('#content_error').find('span').text('Enter A valid Content');
    error=true;
}
if($('#image').get(0).files.length==0){
   
   $('#image_error').find('span').text('Blog Image Required');
    error=true;
}

if(error==false){
 $(this).parent().parent().submit();
}
    });
   });
</script>

@endsection
