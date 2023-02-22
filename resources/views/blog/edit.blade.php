@extends('parent')
@section('content')
<style>
    .image{
        height:200px;
        width:200px;
    }
      .image img{
        height:100%;
        width:100%;
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
                  <h2>Lets Present Your Tought Via Blog</h2>
                  <p>Do you have any questions related to addiction recovery? We've got you covered 24/7. Please fill up the form given below to connect with our customer support team. Also, you can call or email us. Thank you!</p>
               </div>
               <div class="row">
                  <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
                     <form action="{{route('avrt.blog.update')}}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
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
                         <input type="hidden" name="blog_slug" class="form-control" value="{{$blog->slug}}" >
                        <div class="row">
                               <div class="form-group col-12 col-lg-6">
                           <label for="name">Blog Title</label>
                           <input type="text" class="form-control" name="title" id="title" value="{{$blog->title}}">
                            <div class="error-messag" id="title_error"><span class="text-danger"></span></div>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                           <label for="name">Blog Image</label>
                           <input type="file" class="form-control" name="image" id="image"  >
                            <div class="error-messag" id="image_error"><span class="text-danger"></span></div>
                        </div> 
                        
                        </div>
                        <div class="image">
                             <img src="{{asset('storage/'.$blog->image)}}" />
                        </div>
                    
                        <div class="form-group">
                           <label for="name">Blog Content</label>
                           <textarea class="form-control" name="message" id="message" rows="10" required>{{$blog->description}}</textarea>
                           <div class="error-messag" id="content_error"><span class="text-danger"></span></div>
                        </div>
                        <div class="my-3">
                           @if(Session::has('success'))
                           <div class="text-danger">Your message has been sent. Thank you!</div>
                           @endif
                        </div>
                        <div class="text-center"><button type="button" class="btn btn-primary" id="message_submit">Update Blog</button></div>
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
    
    $('#content_error').find('span').text('Enter A valid Contnet');
    error=true;
}


if(error==false){
 $(this).parent().parent().submit();
}
    });
   });
</script>

@endsection
