 $(function(){
         let a_post_id=$('#arena_post_id').val();
             console.log(a_post_id);
         $(document).on('click','#arena_batter_form_btn',function(){
             $(this).find('.spinner-border').css('display','inline-block');
             let parent=$(this);
         
             let a_comment=$('#arena_comment').val();
             console.log(a_comment.length);
             let error=false;
             if(a_comment.length<3){
                 $('#a_comment_error').css('display','block');
                $('#a_comment_error').text('Enter A valid Comment');
                error=true
             }
             let arenaData=new FormData();
             arenaData.append('post_id',a_post_id);
             arenaData.append('comment',a_comment);
             arenaData.append('_token',token);
             if(error==false){
                 $.ajax({
                     method:'post',
                     url:url+'arena/comment',
                     data:arenaData,
                     cache:false,
                     contentType:false,
                     processData:false,
                     success:function(response){
                         console.log(response);
                         if(response.code=="200")
                         {
                             let comment=parseInt($('#arena_t_comment').text());
                             $('#arena_t_comment').text(comment+1);
                             
                                       let arena_comment=`
                         <div class="comment">
    <div id="comment-${response.data.id}">
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
                            class="fa-solid fa-thumbs-down"></i> <span>0</span> </a>
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

$('#comment_list').append(arena_comment);  
 parent.find('.spinner-border').css('display','none');
                         }
                         
                         if(response.code=='500'){
                             console.log(response);
                         }
             
                     },
                     error:function(error){
                         
                     }
                 })
             }
             
         });
         
         
         window.Echo.channel('arena_comment-'+a_post_id)
         .listen('ArenaEvent',function(e){
             console.log(e);
             if(e.type=="comment"){
                if(auth_id!=e.comment.user_id){
             if(a_post_id==e.comment.idea_id){
                       let arena_comment=`
                         <div class="comment">
    <div id="comment-${e.comment.id}">
    <div class="d-flex">
        <div class="comment-user-img"><span>${e.img_text}</span></div>
                                                
        <div>
            <h5><a href="">${e.comment.user.name}</a> </h5>
            <time datetime="2020-01-01">${e.date}</time>
            <p>${e.comment.content}</p>
            <div class="meta-top">
                <div class="like-rep">
                    <a href="javascript:void(0)" class="like-l"><i
                            class="fa-solid fa-thumbs-up"></i> <span>0</span> </a>
                               <a href="javascript:void(0)" class="dislike-l"><i
                            class="fa-solid fa-thumbs-down"></i> <span>0</span> </a>
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
$('#comment_list').append(arena_comment);
}
} 
             }
             
         });
 });