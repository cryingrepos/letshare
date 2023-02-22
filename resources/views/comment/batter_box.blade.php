<style>
  #batter-spinner{
      display:none;
  }
</style>
<div class="reply-form">
    <h4>Leave a Comment</h4>
    <p>Your email address will not be published. Required fields are marked *</p>
    <form action="" id="batter_form">

       <div class="row">
        <!--<div class="col-md-6">-->
        <!--    <div class="col-md-12 form-group c_fields"> <input name="name" id="c_name" type="text" class="form-control" placeholder="Your Name*"></div>-->
        <!--    <p class="text-danger c_name_error hidden" >Please Enter Your Name</p>-->
        <!--</div>-->
        <div class="col-md-12">
            <div class="col-md-12 form-group c_fields"> <input name="email" id="c_email" type="text" id="email" class="form-control" @if(Auth::check()) value="{{Auth::user()->email}}" @endif placeholder="Your Email*"></div>
            <p class="text-danger c_email_error hidden" >Please Enter Your Email</p>
        </div>
       </div>
       <input type="hidden" name="idea_id" id="post_id" value="{{$post->id}}"/>
       <div class="row">
          <div class="col form-group"><textarea name="comment" class="form-control c_fields" id="comment" placeholder="Your Comment*"></textarea></div>
          <p class="text-danger c_comment_error hidden" >Comment Field Is Requird</p>
       </div>
       <button   type="button" id="batter_form_btn" data-style="expand-right"  class="btn btn-primary batter_submit">
           Post Comment
            <span class="spinner-border spinner-border-sm" id="batter-spinner" role="status" aria-hidden="true"></span>
        </button>
    
    </form>
 </div>
