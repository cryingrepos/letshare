$(function(){
let a_post_id=$('#arena_post_id').val();
let reply_class;
      console.log(a_post_id);
  $(document).on('click',".reply-b",function(){
      $(".replay-box").find('textarea').val(" ");
      $(".replay-box").css("display", "none");
      $(this).next().next(".replay-box").css("display", "block");
      $(this).next().next(".replay-box").find('textarea').val(" ");
     $(this).next(".replay-box").css("display", "block");
      $(this).next(".replay-box").find('textarea').val(" ");
    
  });
  
  let post_id;
  $(document).on('click','.reply_btn',function(){
        let form_data=$(this).parent().serializeArray();
         $(this).find('.spinner-border').css('display','inline-block');
        console.log(form_data);
        let reply_url=url+"arena/reply";
         $.ajax({
          method:'post',
          url:reply_url,
          data:{data:form_data,_token:token},
          success:function(response){
            console.log(response);
            console.log('reply');
            post_id=response.data.idea_id;
            console.log(post_id);
            if(response.code==200){
              console.log(response.data);
              console.log(response.data.content);
               console.log(response.data.like);
              $(".replay-box").css("display", "none");
              console.log($('#comment-'+response.data.id).length);
              console.log($('#comment-'+response.data.parent_id).parent().attr('class'));
              if($('#comment-'+response.data.parent_id).parent().hasClass('reply-0')==true){
                  reply_class='reply-1';
              }
              if($('#comment-'+response.data.parent_id).parent().hasClass('reply-1')==true){
                  reply_class='reply-2';
              }
              if($('#comment-'+response.data.parent_id).parent().hasClass('reply-2')==true){
                  reply_class='reply-3';
              }
              if($('#comment-'+response.data.parent_id).parent().hasClass('reply-3')==true){
                  reply_class='reply-4';
              }
              if($('#comment-'+response.data.parent_id).parent().hasClass('reply-4')==true){
                  reply_class='reply-5';
              }
              let arena_reply=`
              <div class="comment ${reply_class}">
    <div id="comment-${response.data.id}" class="reply">
    <div class="d-flex">
        <div class="comment-user-img"><span>${response.img_text}</span></div>
        <div>
            <h5><a href="">${response.name}</a> </h5>
            <time datetime="2020-01-01">${response.date}</time>
            <p>${response.data.content}</p>
            <div class="meta-top">
                <div class="like-rep" id="${response.data.id}" data-comment="${response.data.id}">
                    <a href="javascript:void(0)" class="like-l"><i
                            class="fa-solid fa-thumbs-up"></i> <span>0</span> </a>
                    <a href="javascript:void(0)" class="dislike-l"><i
                                                                    class="fa-solid fa-thumbs-down"></i><span>0</span></a>
                    <a href="javascript:void(0)" class="reply-b"><i
                            class="bi bi-reply-fill"></i> Reply</a>
                            <a href="${response.url}" class="reply-d" ><i
                                                            class="bi bi-trash2"></i>Delete</a>
                    <div class="replay-box">
                        <form action="" class="reply-form">
                        <input type="hidden" name="comment_id" value="${response.data.id}">
                            <div class="row m-0 p-0">
                                <div class="col form-group">
                                    <textarea name="comment" class="form-control" placeholder="Add a reply*"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary reply_btn">Reply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>`;
              console.log(arena_reply);
              $('#comment-'+response.data.parent_id).parent().append(arena_reply);
             $(this).find('.spinner-border').css('display','none');
            }
            if(response.code==201){
                console.log(response);
            }
          },
          error:function(error){

          }
         })
    });
      
  window.Echo.channel('arena_comment-'+a_post_id)
  .listen('ArenaEvent',function(e){
      console.log(e);
      console.log(auth_id);
      if(e.type=="reply"){
        if(auth_id!=e.comment.user_id){
             console.log(e);
            
          if(a_post_id==e.comment.idea_id){
               if($('#comment-'+e.comment.parent_id).parent().hasClass('reply-0')==true){
                  reply_class='reply-1';
              }
              if($('#comment-'+e.comment.parent_id).parent().hasClass('reply-1')==true){
                  reply_class='reply-2';
              }
              if($('#comment-'+e.comment.parent_id).parent().hasClass('reply-2')==true){
                  reply_class='reply-3';
              }
              if($('#comment-'+e.comment.parent_id).parent().hasClass('reply-3')==true){
                  reply_class='reply-4';
              }
              if($('#comment-'+e.comment.parent_id).parent().hasClass('reply-4')==true){
                  reply_class='reply-5';
              }
      
        let arena_reply=`
              <div class="comment ${reply_class}">
    <div id="comment-${e.comment.id}" class="reply">
    <div class="d-flex">
         <div class="comment-user-img"><span>${e.img_text}</span></div>
                                            
        <div>
            <h5><a href="">${e.comment.user.name}</a> </h5>
            <time datetime="2020-01-01">${e.date}</time>
            <p>${e.comment.content}</p>
            <div class="meta-top">
                <div class="like-rep" id="${e.comment.id}" data-comment="${e.comment.id}">
                   <a href="javascript:void(0)" class="like-l"><i
                            class="fa-solid fa-thumbs-up"></i> <span>0</span> </a>
                    <a href="javascript:void(0)" class="dislike-l"><i
                                                                    class="fa-solid fa-thumbs-down"></i><span>0</span></a>
                    <a href="javascript:void(0)" class="reply-b"><i
                            class="bi bi-reply-fill"></i> Reply</a>
                            <a href="${e.url}" class="reply-d" ><i
                                                            class="bi bi-trash2"></i>Delete</a>
                    <div class="replay-box">
                        <form action="" class="reply-form">
                        <input type="hidden" name="comment_id" value="${e.comment.id}">
                            <div class="row m-0 p-0">
                                <div class="col form-group">
                                    <textarea name="comment" class="form-control" placeholder="Add a reply*"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary reply_btn">Reply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>`;
     $('#comment-'+e.comment.parent_id).parent().append(arena_reply);
               
          }
      }  
      }
      
  })
  
  $(document).on('click','.like-l',function(){
      let id=$(this).parent().attr('data-comment');
       commentArithm(id,'like',$(this));
  });
  $(document).on('click','.dislike-l',function(){
      let id=$(this).parent().attr('data-comment');
      commentArithm(id,'dislike',$(this));
  });
  
  function commentArithm(cmt_id,type,parent){
      $.ajax({
          type:"post",
          url:"/batter/arithmetic",
          headers:{
              'X-CSRF-TOKEN':token
          },
          data:{comment_id:cmt_id,type:type},
          success:function(response){
              console.log(response);
              if(response.code=="200"){
                  console.log(parent);
                  console.log( parent.find('.like-l'));
                 if(type=="like"){
                    let like_count=parseInt($('#arena_t_like').text());
                        $('#arena_t_like').text(like_count+1);
                    let dis_like_count=parseInt($('#arena_t_dislike').text());
                        $('#arena_t_dislike').text(dis_like_count-1);
                  parent.find('span').text(response.data.like);
                  parent.parent().find('.dislike-l').find('span').text(response.data.dislike);
                }
               if(type=="dislike"){
                    let like_count=parseInt($('#arena_t_like').text());
                        $('#arena_t_like').text(like_count-1);
                    let dis_like_count=parseInt($('#arena_t_dislike').text());
                        $('#arena_t_dislike').text(dis_like_count+1);
                 parent.parent().find('.like-l').find('span').text(response.data.like);
                 parent.find('span').text(response.data.dislike);
               }  
              }
             
          },
          error:function(error){
              console.log(error);
          }
          
      });
  }
  
  window.Echo.channel('comment-arithmetic')
  .listen('CommentArithtmetic',function(e){
      console.log(e);
      console.log(e.comment.id);
      if(e.type=="like"){
          $('#'+e.comment.id).find('.like-l').find('span').text(e.comment.like);
          $('#'+e.comment.id).find('.dislike-l').find('span').text(e.comment.dislike);
      }
      if(e.type=="dislike"){
         $('#'+e.comment.id).find('.dislike-l').find('span').text(e.comment.dislike); 
         $('#'+e.comment.id).find('.like-l').find('span').text(e.comment.like);
      }
  })
  });
