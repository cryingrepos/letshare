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
    <iframe src="https://avrt.com/avrt/who-are-we" height="400" width="100%" ></iframe>
</div>

<div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header">
             <div class="card-title">
                <span>Who are We</span>
             </div>
            </div>
             <div class="card-body">
               <form class="" method="post" action="{{route('cms.who_are_we')}}" id="" enctype="multipart/form-data">
                   @if(!empty($who))
                   <input type="hidden" name="who_id" value="{{$who->id}}" />
                   @endif
                   <div class="row">
                       <div class="form-feild col-lg-6 mt-4">
                           <label>Banner Title</label>
                           <input type="text" name="banner_text" class="form-control" @if(!empty($who)) value="{{$who->banner_text}}" @else value="{{old('banner_text')}}" @endif>
                       </div>
                         <div class="form-feild col-lg-6 mt-4">
                           <label>Banner Image</label>
                           <input type="file" class="form-control" name="banner_image" >
                       </div>
                        <div class="form-feild col-lg-4 mt-4">
                           <label>Description Title</label>
                           <input type="text" class="form-control" name="content_heading" @if(!empty($who)) value="{{$who->content_heading}}" @else value="{{old('content_heading')}}" @endif >
                       </div>
                         <div class="form-feild col-lg-4 mt-4">
                           <label>Description Image</label>
                           <input type="file" class="form-control" name="content_image" >
                       </div>
                       <div class="form-feild col-lg-4 mt-4">
                           <label>Description Background Color</label>
                           <input type="color" class="form-control" name="content_background" @if(!empty($who)) value="{{$who->content_background}}" @else value="{{old('content_background')}}" @endif >
                       </div>
                         <div class="form-feild col-lg-12 mt-4">
                           <label>Description Content</label>
                            <textarea class="form-control mt-3" rows="4" name="content_description" >@if(!empty($who)) {{$who->content_description}} @else {{old('content_description')}} @endif</textarea>
                       </div>
                         <div class="form-feild col-lg-6 mt-4">
                           <label>Background Title</label>
                           <input type="text" class="form-control" name="section_heading"  @if(!empty($who)) value="{{$who->section_heading}}" @else value="{{old('section_heading')}}" @endif >
                       </div>
                       <div class="form-feild col-lg-6 mt-4">
                           <label>Background SubTitle</label>
                           <input type="text" class="form-control" name="section_sub_heading" @if(!empty($who)) value="{{$who->section_sub_heading}}" @else value="{{old('section_sub_heading')}}" @endif >
                       </div>
                         <div class="form-feild col-lg-4 mt-4">
                           <label>Background Image</label>
                           <input type="file" name="section_image" class="form-control" >
                       </div>
                        <div class="form-feild col-lg-4 mt-4">
                           <label>Button Text </label>
                           <input type="text" name="section_button_text" class="form-control" @if(!empty($who)) value="{{$who->section_button_text}}" @else value="{{old('section_button_text')}}" @endif >
                       </div>
                       <div class="form-feild col-lg-4 mt-4">
                           <label>Button Background color </label>
                           <input type="color" class="form-control" name="section_button_color" @if(!empty($who)) value="{{$who->section_button_color}}" @else value="{{old('section_button_color')}}" @endif >
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