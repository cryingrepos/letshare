@extends('admin.parent')
@section('content')
<style>
    .table-img{
        min-width:120px;
        height:80px;
    }
    .table-img img{
        width:100%;
        height:100%;
        object-fit:cover;
    }
    .table{
        overflow-x:scroll !important;
    }
</style>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-6 pb-4">
            <h4 class="page-title">Dashboard</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="col-6">
            <div class="text-right">
                <small>Users</small>
                <h5 class="text-info">3,458</h5>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-between ml-4">
                <div>
                   <button class="btn btn-primary" id="select"><i class="fa fa-check" aria-hidden="true"></i>Selectall</button>
                <button class="btn btn-primary" id="un_select"><i></i>Un-selectall</button>  
                </div>
                <div>
                  <form method="post" action="{{route('comments.deleteAll')}}" id="comment_form">
                      <button type="button" id="delete" class="btn btn-danger mr-4"><i></i>Delete selected</button>
                      @csrf
                  </form>   
                </div>
               
    </div>
</div>
<div class="container-fluid">
        <div class="card">
            <div class="card-header">
             <div class="card-title">
                <span>List Of Comments</span>
             </div>
            </div>
            <div class="card-body">
                <div class="row m-4">
                    <form method="get" action="{{route('comments.index')}}">
                        <div class="row">
                              <div class="form-group col-12 col-md-6 col-6">
                          <label class="form-lable">Comment Related To Post</label>
                        <select class="form-control" name="post_id" id="post">
                             <option value="">Select Post</option>
                            @forelse($posts as $post)
                            <option @if(old('post_id')==$post->id) selected @endif value="{{$post->id}}">{{$post->title}}</option>
                            @empty
                            <option>No Post Avialable</option>
                            @endforelse
                        </select>   
                        </div>
                        <div class="form-group  col-12 col-md-6 col-6">
                            <label>
                                Search With Parent Comment
                            </label>
                             <select class="form-control" name="parent_comment_id" id="parent">
                                 <option value="">Select Parent Comment</option>
                                 @forelse($parents as $parent)
                               <option @if(old('parent_comment_id')==$parent->id) selected @endif value="{{$parent->id}}">{{$parent->content}}</option>
                               @empty
                              <option>No Comments Available</option>
                            @endforelse
                              </select> 
                        </div>
                        </div>
                          <label class="form-label">
                                Serach Comment Between Dates
                            </label>
                         <div class="row">
                            <div class="form-group col-12 col-md-6 col-lg-6">
                                 <input type="date" value="{{old('from_date')}}" name="from_date"  class="form-control "/>
                            </div>
                              <div class="form-group col-12 col-md-6 col-lg-6">
                                 <input type="date" value="{{old('to_date')}}" name="to_date"  class="form-control "/>
                            </div>
                          </div>
                          <button type="submit" name="search" value="search" class="btn btn-info mb-2">Search</button>
                          <a href="{{route('comments.index')}}" name="search" value="search" class="btn btn-primary mb-2">Clear</a>
                    </form>
                </div>
               <table class="table table-bordered table-striped table-responsive ">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>ID</th>
                        <th>Post Image</th>
                        <th>Comment</th>
                        <th>Parent Comment</th>
                        <th>Comment By</th>
                        <th>Commented On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $comment)
                    <tr>
                        <td><input type="checkbox" class="select_val" value="{{$comment->id}}"/></td>
                        <td>{{$comment->id}}</td>
                         <td>
                            <div class="table-img">
                                @if($comment->post)
                              <img src="{{asset('storage/'.$comment->post->image)}}"  alt="post_image">
                              @endif
                            </div>
                            </td>
                        <td>{{$comment->content}}</td>
                          <td>{{$comment->parent_id}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>{{date('dM,y',strtotime($comment->created_at))}}</td>
                        <td class="d-flex">
                            <a href="javascript:void(0)" class="btn btn-primary  ml-1"><i class="fa fa-eye"></i></a>
                            <form method="post" action="{{route('comments.destroy',$comment->id)}}" >
                                @method('DELETE')
                                <button type="submit" onclick="confirm('Are You Sure Want To Delete This Item?')" class="btn btn-danger ml-1"><i class="fa fa-trash"></i></button>
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @empty
                      <tr class="col-12">
                        <td>No Posts Avialable</td>
                      </tr>
                    @endforelse

                </tbody>
               </table>
            </div>
        </div>
</div>
<script>
    $(function(){
      
      $('#select').on('click',function(){
          $('.select_val').each(function(){
               $(this).attr('checked',true)
          });
      });
        $('#un_select').on('click',function(){
          $('.select_val').each(function(){
               $(this).attr('checked',false);
             
          });
         
      });
        $('#delete').on('click',function(){
            if($('.select_val:checked').length==0){
                alert('Please select something to delete');
                return false;
            }
          $('.select_val:checked').each(function(){
              let id_val=$(this).val();
              $('<input>').attr({
                  type:'hidden',
                  name:'ids[]',
                  value:id_val,
              }).appendTo('#comment_form');
          });
         $('#comment_form').submit();
      });
      
      
    });
</script>
@endsection
