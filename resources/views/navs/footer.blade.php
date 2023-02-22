 <footer id="footer">

     <div class="footer-top">
         <div class="container">
             <div class="row">

                 <div class="col-lg-5 col-md-6 footer-contact">
                     <img src="{{asset('img/Logo.png')}}" alt="" class="img-fluid">
                     <!--<p>Addictive Voice Recognition Technique® allows people to recover immediately and entirely from-->
                     <!--    addiction to alcohol or drugs. It is a natural way to recover from substance abuse, alcohol or-->
                     <!--    drug dependence, or addiction.</p>-->
                     <p>
                         <!--<strong>Address: </strong> Box 800, Lotus CA 95651 <br>-->
                         <strong>Email: </strong> <a href="mailto:avrt@avrt.com">avrt@avrt.com</a><br>
                     </p>
                 </div>

                 <div class="col-lg-3 col-md-6 footer-links">
                     <h4>Useful Links</h4>
                     <ul>
                         <li><i class="bx bx-chevron-right"></i> <a href="{{ route('avrt.home') }}">Home</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="{{ route('avrt.faq') }}">FAQ</a></li>
                         <!--<li><i class="bx bx-chevron-right"></i> <a href="{{route('avrt.idea.slug',['slug'=>'come-on-lets-get-normal-again-in-great-america'])}}">Come on! Let's Get Normal Again in Great America</a></li>-->
                         <!--<li><i class="bx bx-chevron-right"></i> <a href="{{route('avrt.idea.slug',['slug'=>'coming-presently.'])}}">Coming Presently</a></li>-->
                         <li><i class="bx bx-chevron-right"></i> <a href="{{ route('avrt.service') }}">Services</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="{{ route('avrt.contact') }}">Contact Info</a>
                          <li><i class="bx bx-download"></i> <a href="{{ asset('pdf/whoweare.pdf') }}" download>Who Are We</a></li>
                          <li><i class='bx bx-download'></i><a href="https://www.xml-sitemaps.com/download/avrt.com-3d8d4e9b5/sitemap.xml?view=1" download>Sitemap</a></li>
                         </li>
                     </ul>
                 </div>

                 <!--<div class="col-lg-3 col-md-6 footer-links">-->
                 <!--    <h4>Our Services</h4>-->
                 <!--    <ul>-->
                 <!--        <li><i class="bx bx-chevron-right"></i> <a-->
                 <!--                href="{{ route('avrt.service') }}">Teleconference</a></li>-->
                 <!--        <li><i class="bx bx-chevron-right"></i> <a-->
                 <!--                href="{{ route('avrt.service') }}">Apple-FaceTime/Android-Duo</a></li>-->

                 <!--    </ul>-->
                 <!--</div>-->

                 <div class="col-lg-4 col-md-6 footer-links">
                     <h4>Stay In Touch</h4>
                     <p>Follow us on our social networks.</p>
                     <div class="social-links mt-3">
                         <a href="https://twitter.com/i/flow/login" target="_blank" class="twitter"><i
                                 class="bx bxl-twitter"></i></a>
                         <a href="https://www.facebook.com/login/" target="_blank" class="facebook"><i
                                 class="bx bxl-facebook"></i></a>
                         <a href="https://www.instagram.com/accounts/login/" target="_blank" class="instagram"><i
                                 class="bx bxl-instagram"></i></a>
                         <a href="https://www.linkedin.com/" target="_blank" class="linkedin"><i
                                 class="bx bxl-linkedin"></i></a>
                     </div>
                 </div>

             </div>
         </div>
     </div>

     <div class="container footer-bottom clearfix">
         <div class="copyright">
             &copy; Copyright <strong><span>AVRT</span></strong>. All Rights Reserved
         </div>
         <div class="credits">

             Designed by <a href="https://zonewebsites.us/"> Zonewebsites</a>
         </div>
     </div>
 </footer><!-- End Footer -->

 <!-----Model poup------------------>
 @include('auth.login')
 @include('auth.register')
 <!-----Model poup End------------------>


 <div id="preloader"></div>
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
         class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
 <script src="{{ asset('js/vendor/aos/aos.js') }}"></script>
 <!-- JavaScript Bundle with Popper -->
 <script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('js/vendor/glightbox/js/glightbox.min.js') }}"></script>
 <script src="{{asset('js/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
 <script src="{{ asset('js/vendor/swiper/swiper-bundle.min.js') }}"></script>
 <!--<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>-->
 <!-- font 6 -->
 <!--<script src="https://kit.fontawesome.com/50d5e6a1ea.js" crossorigin="anonymous"></script>-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <!-- Template Main JS File -->
 <script src="{{ asset('js/main.js') }}"></script>
 <script src="{{ asset('js/auth/signin.js') }}"></script>
 <script src="{{ asset('js/auth/signup.js') }}"></script>
 <script src="{{ asset('js/comments/comment.js') }}"></script>
 <script src="{{asset('js/arena/arena.js')}}"></script>
 <script src="{{asset('js/arena/comment.js')}}"></script>
 <script src="{{asset('js/membership/checkout.js')}}"></script>
 <script src="{{asset('build/assets/app.js')}}"></script>
 
 <script>
     let token = "{{ csrf_token() }}";
     let auth_id = null;
     let url="https://avrt.com/";
     @if (Auth::Check())
         auth_id = `{{ Auth::user()->id }}`;
     @endif
     let user_type="";
 </script>
 <script>
     $(function(){
         $(document).on('click','#forget_password',function(){
             $('#exampleModal').modal('hide');
             $('#passwordModel').modal('toggle');
             
         });
     });
     $(function(){
         $(document).on('click','#password_submit_btn',function(){
             let error=false;
             let email=$('#password_mail').val();
             let regex=/^\b[A-Z0-9._]+@[A-Z0-9]+\.[A-Z]{2,4}\b$/i
             console.log(regex.test(email));
             if(regex.test(email)==false){
                 error=true
               
                 $('#p_email_error').text('Enter a Valid Email');
                   $('#p_email_error').css('display','block');
             }
             if(error==false){
                 $.ajax({
                     method:'get',
                     url:"{{route('auth.password.link')}}",
                     data:{email:email},
                     success:function(response){
                         console.log(response);
                         if(response.code=="200"){
                              $('#p_email_error').text(response.message);
                                $('#p_email_error').css('display','block');
                         }
                         if(response.code=="201")
                         {
                            $('#p_email_error').text(response.message);
                              $('#p_email_error').css('display','block');
                         }
                     }
                 })
             }
         })
     })
 </script>
 <script>
  if(auth_id){
     $(function(){
         $(document).on('click','.like',function(){
             let cmt_id=$(this).parent("[data-comment-value]").attr('id');
             console.log(cmt_id);
             let count=$(this).find('span').text();
              let likecount=parseInt(count)+1;
              console.log(likecount);
             let parent=$(this).parent();
             $.ajax({
                type:'post',
                url:"{{route('comment.arithmetic')}}",
                headers:{
                    'X-CSRF-TOKEN':"{{csrf_token()}}"
                },
                data:{count:likecount,type:"like",comment_id:cmt_id},
                success:function(response){
                    console.log(response);
                      user_type="current";
                       let l_count=parseInt($('#strike_t_like').text());
                       $('#strike_t_like').text(l_count+1);
                      let d_count=parseInt($('#strike_t_dislike').text());
                      $('#strike_t_dislike').text(d_count-1);
                      parent.find('.like').find('span').text(response.data.like);
                     parent.find('.dislike').find('span').text(response.data.dislike);
                      console.log(parent.find('.dislike').find('span').length)
                    console.log(response);
                },
                error:function(error){
                   console.log(error);
                }
             })
         });
         
          $(document).on('click','.dislike',function(){
             let cmt_id=$(this).parent("[data-comment-value]").attr('id');
             let count=$(this).find('span').text();
             let dislikecount=parseInt(count)+1;
             let parent=$(this).parent();
                console.log($(this).parent());
             $.ajax({
                type:'post',
                url:"{{route('comment.arithmetic')}}",
                headers:{
                    'X-CSRF-TOKEN':"{{csrf_token()}}"
                },
                data:{count:dislikecount,type:"dislike",comment_id:cmt_id},
                success:function(response){
                    console.log(response);
                     $(this).find('span').text(response.data.dislike);
                       $('#stike_t_comment').text(count+1);
                       let l_count=parseInt($('#strike_t_like').text());
                       $('#strike_t_like').text(l_count-1);
                      let d_count=parseInt($('#strike_t_dislike').text());
                      $('#strike_t_dislike').text(d_count+1);
                     parent.find('.like').find('span').text(response.data.like);
                     parent.find('.dislike').find('span').text(response.data.dislike);
                     console.log(parent.find('.dislike').find('span').length)
                     user_type="current";
                },
                error:function(error){
                   console.log(error);
                }
             })
         });
     }); 
   }
 </script>
 <script>
     $(function(){
         console.log(window.Echo);
         window.Echo.channel('comment-arithmetic')
         .listen('CommentArithtmetic',function(e){
             console.log(e);
             let count=parseInt($('#comment-'+e.comment_id).find('.comment_like').text());
             console.log($('#comment-'+e.comment.id).find('.comment_like').length);
                console.log($('#comment-'+e.comment.id).find('.comment_dislike').length);
             if(e.type=="like"){
                       let l_count=parseInt($('#strike_t_like').text());
                       $('#strike_t_like').text(l_count+1);
                      let d_count=parseInt($('#strike_t_dislike').text());
                      $('#strike_t_dislike').text(d_count-1);
                 $('#'+e.comment.id).find('.comment_like').text(e.comment.like);
                  $('#'+e.comment.id).find('.comment_dislike').text(e.comment.dislike);
             }
              if(e.type=="dislike"){
                       let l_count=parseInt($('#strike_t_like').text());
                       $('#strike_t_like').text(l_count-1);
                      let d_count=parseInt($('#strike_t_dislike').text());
                      $('#strike_t_dislike').text(d_count+1);
                 $('#'+e.comment.id).find('.comment_dislike').text(e.comment.dislike);
                 $('#'+e.comment.id).find('.comment_like').text(e.comment.like);
             }
         });
     });
 </script>


