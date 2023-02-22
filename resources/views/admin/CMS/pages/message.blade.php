@extends('admin.parent')
@section('content')
<style>
  
/*    input[type=color] {*/
/* height: 30px;*/
/*    width: 30px;*/
/*    border-radius: 50%;*/
/*    padding: 0px;*/
/*    border: none;*/
/*}*/
</style>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-6">
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
                
            </div>
        </div>
    </div>
</div>

<div style="width:98%;margin:0 auto;">
    <iframe src="https://avrt.com/avrt/message" height="500" width="100%" ></iframe>
</div>

<div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header">
             <div class="card-title">
                <span>Message</span>
             </div>
            </div>
             <div class="card-body">
               <form class="" method="post" action="{{route('cms.message')}}" id="" enctype="multipart/form-data">
                   @if(!empty($message))
                   <input type="hidden" value="{{$message->id}}" name="msg_id"/>
                   @endif
                   <div class="row">
                       <div class="form-feild col-lg-4 mt-4">
                           <label>Banner Title</label>
                           <input type="text" name="banner_title" class="form-control" @if(!empty($message)) value="{{$message->banner_title}}" @else value="{{old('banner_title')}}" @endif />
                       </div>
                        <div class="form-feild col-lg-4 mt-4">
                           <label>Banner Subtitle</label>
                           <input type="text" name="banner_subtitle" class="form-control" @if(!empty($message)) value="{{$message->banner_subtitle}}" @else value="{{old('banner_subtitle')}}" @endif />
                       </div>
                         <div class="form-feild col-lg-4 mt-4">
                           <label>Banner Image</label>
                           <input name="banner_image" type="file" class="form-control" />
                       </div>
                       <!--  <div class="form-feild col-lg-4 mt-4">-->
                       <!--    <label>Description  Heading</label>-->
                       <!--    <input name="description_heading" type="text" name="description_heading" class="form-control" @if(!empty($message)) value="{{$message->banner_subtitle}}" @else value="{{old('banner_subtitle')}}" @endif  />-->
                       <!--</div>-->
                       <div class="form-feild col-lg-12 mt-4">
                           <label>Description Content</label>
                            <textarea name="content_description" class="form-control mt-3" rows="4">  @if(!empty($message)) {{$message->content_description}} @else {{old('content_description')}} @endif  </textarea>
                       </div>
                        <div class="form-feild col-lg-4 mt-4">
                           <label>The AVRT Freedom Rap Title</label>
                           <input type="text" name="rap_title" class="form-control" @if(!empty($message)) value="{{$message->rap_title}}" @else value="{{old('rap_title')}}" @endif >
                       </div>
                        <div class="form-feild col-lg-12 mt-4">
                           <label>The AVRT Freedom Rap</label>
                            
                            <textarea name="rap_content" class="form-control mt-3" rows="4"> @if(!empty($message)) {{$message->rap_content}}" @else {{old('rap_content')}} @endif </textarea>
                       </div>
                       <div class="form-feild col-lg-4 mt-4">
                           <label>Listen title</label>
                           <input name="listen_title" type="text" class="form-control" @if(!empty($message)) value="{{$message->listen_title}}" @else value="{{old('listen_title')}}" @endif>
                       </div>
                        <div class="form-feild col-lg-12 mt-4">
                           <label>Listen Content</label>
                            
                            <textarea class="form-control mt-3" rows="4" name="listen_content">@if(!empty($message)) {{$message->listen_content}} @else {{old('listen_content')}} @endif</textarea>
                       </div>
                         <div class="form-feild col-lg-3 mt-5 ">
                          <button type="submit" class="btn btn-lg btn-primary">Create</button>
                       </div>
                   </div>
                   @csrf
               </form>
            </div>
        </div>
</div>
@endsection