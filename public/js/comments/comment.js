$(function(){
let post_id=$('#post_id').val();
let email="email";
let searched_param=new URLSearchParams(window.location.search);
console.log(window.location.pathname);
let patharray=window.location.pathname.split('/');
let pathlength=patharray.length-1;
let slug=patharray[pathlength];
console.log(patharray[pathlength]);
console.log(patharray.length);
let strike_one='/arena/checkout/'+slug;
//If User Is Not Login
if(!auth_id){

    $('.strike_reply').on('click',function(e){
        e.preventDefault();
         $('#batter-spinner').css('display','none');
      Swal.fire({
        title:"Welcome To The AVRT® Arena (AA):Where Your Addictive Voice (AV) Meets Your Right Mind",
        text:'You Can Login To Arena With Your Email And New Password,Password Must Be Of Six Character.',
        imageUrl:'',
        imageWidth:400,
        imageHeight:200,
        imageAlt:'Arean Image',
        showCancelButton:true,
        confirmButtonText:'Arena Login'
      }).then((result)=>{
         $('#exampleModal').modal('toggle');
      })
    });
}
//If User Is Login
if(auth_id){
    $(document).on('click','.strike_reply',function(e){
        e.preventDefault();
       window.location.href=strike_one;
    });
}


    $(document).on('keyup','input,textarea',function(){
      $(this).parent().next('p').css('display','none');
       $('#batter-spinner').css('display','none');
    });
    $('#batter_form_btn').on('click',function(){
        $('#batter-spinner').css('display','inline-block');
        $('.c_fields').each(function(){
            if($(this).val()==""){
                error=true;
                $(this).parent().next('p').css('display','block');
            }else{
                error=false;
            }
        });
        let rezex=/^\b[A-Z0-9_.-]+@[A-Z0-9]+\.[A-Z]{2,4}\b$/i
         email=$('#c_email').val();
        let name=$('#c_name').val();
        let comment=$('#comment').val();
        // if(name.length<3){
        //  $('.c_name_error').text('Enter A valid Name');
        //  $('.c_name_error').css('display','block');
        //  error=true;
        // }
                 if(rezex.test(email)==false){
            $('.c_email_error').text('Enter A valid Email');
            $('.c_email_error').css('display','block');
            error=true;
        }else{
             if(comment.length<2){
            $('.c_comment_error').text('Comment Should Be Atleast 2 Character');
            $('.c_comment_error').css('display','block');
            error=true;
             }else{
               error=false;
             }
            }

        console.log(rezex.test(email));


       if(error==false){
        let form=$('#batter_form').serializeArray();

        console.log(form);
        let comment_url=url+"batter/comment";
          $.ajax({
            method:'post',
            url:comment_url,
            data:{
                _token:token,
                data:form,
            },
            success:function(response){
              console.log(response);

              console.log('comment');
              if(response.code=='200'){
                    let count=parseInt($('#strike_t_comment').text());
                       $('#strike_t_comment').text(count+1);
                       console.log(count);
                      console.log(response.data.user);
                 $('#batter-spinner').css('display','none');
                console.log(response.data);
               let ap_comment=` <div id="comment-1" class="comment">
    <div class="d-flex">
         <div class="comment-user-img"><div class="comment-user-img-up"><span><i class="fa fa-upload"></i></span></div><span>${response.img_text}</span></div>
        <div>
            <h5><a href="">${response.name}</a> </h5>
            <time datetime="2020-01-01">${response.date}</time>
            <p>${response.data.content}</p>
            <div class="meta-top">
                <div class="like-rep" id="${response.data.id}" data-comment-value="commnet_ids">
                     <a class="like" ><i
                                        class="fa-solid fa-thumbs-up"></i> <span class="comment_like">0</span> </a>
                                                           <a class="dislike"><i
                                                        class="fa-solid fa-thumbs-down"></i> <span class="comment_dislike">0</span> </a>

                                                    <a  class="strike_reply" ><i
                                                        class="bi bi-reply-fill"></i> Reply</a>

                </div>
            </div>
        </div>
    </div>
</div>`;
              $('#comment_list').append(ap_comment);
              if(response.first===true){
                  window.location.reload();
              }
              }
              if(response.code==='201'){
                  console.log(auth_id);
                  if(!auth_id){
  Swal.fire({
        title:"Welcome To The AVRT® Arena (AA):Where Your Addictive Voice (AV) Meets Your Right Mind",
        text:'You Can Login To Arena With Your Email And New Password,Password Must Be Of Six Character.',
        imageUrl:'',
        imageWidth:400,
        imageHeight:200,
        imageAlt:'Arean Image',
        showCancelButton:true,
        confirmButtonText:'Arena Login'
      }).then((result)=>{
         $('#exampleModal').modal('toggle');
      });
              }
               if(auth_id){
                  console.log(auth_id);
       window.location.href=strike_one;
      }

              }


            },
            error:function(error){
                console.log(error);
            }
          })
       }
    });

    //Event For Comment Is Listen Here.
    window.Echo.channel('strike-one-'+post_id)
    .listen('StrickOneEvent',function(e){
        console.log(Notification);
        // console.log('post'+e);
        // console.log('auth'+auth_id);
        // console.log('user_id'+e.comment.user_id);
        // console.log('idea_id'+e.comment.idea_id);
        // console.log('post_id'+post_id);
     if(auth_id){
      if(e.comment.user_id!=auth_id){
        if(e.comment.idea_id==post_id){
            console.log(e.comment);
              let count=parseInt($('#strike_t_comment').text());
                       $('#strike_t_comment').text(count+1);
               let ar_comment=` <div id="comment-1" class="comment">
    <div class="d-flex">
        <div class="comment-user-img"><div class="comment-user-img-up"><span><i class="fa fa-upload"></i></span></div><span>${e.img_text}</span></div>
        <div>
        <div>
            <h5><a href="">${e.name}</a> </h5>
            <time datetime="2020-01-01">${e.date}</time>
            <p>${e.comment.content}</p>
            <div class="meta-top">
                <div class="like-rep">
                    <a href="javascript:void(0)" class="like-l"><i
                            class="fa-solid fa-thumbs-up"></i> 5 </a>
                    <a href="javascript:void(0)" class="strike_reply"><i
                            class="bi bi-reply-fill"></i> Reply</a>
                </div>
            </div>
        </div>
    </div>
</div>`;
          $('#comment_list').append(ar_comment);
        }
      }}else{
         console.log(e.comment.user.email);
         console.log(email);
        if(e.comment.user.email!=email){
            if(e.comment.idea_id==post_id){
                  let count=parseInt($('#strike_t_comment').text());
                       $('#strike_t_comment').text(count+1);
                         let ar_comment=` <div id="comment-1" class="comment">
    <div class="d-flex">
        <div class="comment-user-img"><div class="comment-user-img-up"><span><i class="fa fa-upload"></i></span></div><span>${e.img_text}</span></div>
        <div>
        <div>
            <h5><a href="">${e.name}</a> </h5>
            <time datetime="2020-01-01">${e.date}</time>
            <p>${e.comment.content}</p>
            <div class="meta-top">
               <div class="like-rep" id="${e.comment.id}" data-comment-value="commnet_ids">
                     <a class="like" ><i
                                        class="fa-solid fa-thumbs-up"></i> <span class="comment_like">0</span> </a>
                                                           <a class="dislike"><i
                                                        class="fa-solid fa-thumbs-down"></i> <span class="comment_dislike">0</span> </a>

                                                    <a  class="strike_reply" ><i
                                                        class="bi bi-reply-fill"></i> Reply</a>
                </div>
            </div>
        </div>
    </div>
</div>`;
          $('#comment_list').append(ar_comment);
            }
        }
      }
     console.log(e);
    });
});

