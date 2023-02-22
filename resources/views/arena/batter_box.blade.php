<div class="reply-form">
    <h4>Leave a Comment</h4>
    <p>Your email address will not be published. Required fields are marked *</p>
    <form action="">
       <div class="row">
       </div>
       <input type="hidden" name="idea_id" id="arena_post_id" value="{{$post->id}}"/>
       <div class="row">
          <div class="col form-group"><textarea name="comment" class="form-control c_fields" id="arena_comment" placeholder="Your Comment*"></textarea></div>
          <p class="text-danger hidden" id="a_comment_error" >Comment Field Is Requird</p>
       </div>
       <button type="button" id="arena_batter_form_btn"  class="btn btn-primary">
           <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Post Comments</button>
    </form>
 </div>
