@extends('admin.parent')
@section('content')
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
                <small>Users</small>
                <h5 class="text-info">3,458</h5>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Meta Setting Update
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('seo.update',$meta->id)}}">
                @method('PUT')
                <div class="row">
                    <div class="form-group col-6 ">
                <lable class="form-label mb-2">Select Page And Slug To Add Meta</lable>
                
                <select class="form-control" name="slug">
                    <option @if($meta->slug=='home') selected @endif value="home">Home</option>
                    <option @if($meta->slug=='faq') selected @endif value="faq">FAQ</option>
                    <option @if($meta->slug=='background') selected @endif value="background">Background</option>
                    <option @if($meta->slug=='service') selected @endif value="service">Service</option>
                    <option @if($meta->slug=='Who WE ARE') selected @endif value="wwa">Who WE ARE</option>
                    <option @if($meta->slug=='message') selected @endif value="message">Message</option>
                    <option @if($meta->slug=='contact') selected @endif value="contact">Contact</option>
                    <option @if($meta->slug=='registration') selected @endif value="registration">Registration</option>
                    <option @if($meta->slug=='login') selected @endif value="login">Login</option>
                    @forelse($ideas as $post)
                     <option @if($meta->slug==$post->slug) selected @endif value="{{$post->slug}}">{{$post->title}}</option>
                    @empty
                      <option>No Slug Avialable</option>
                    @endforelse
                </select>
                @error('slug')
                <p class="text-bold text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group col-6">
                <label class="form-label">Meta Title</label>
                <input type="text" class="form-control" name="title" placeholder="Meta Title" value="{{$meta->title}}"/>
                @error('title')
                <p class="text-bold text-danger">{{$message}}</p>
                @enderror
               </div>
                </div>
            
            <div class="row">
               
               <div class="form-group col-6">
                <label class"form-label">Meta Description</label>
                <input type="text" class="form-control" name="description" placeholder="Meta Description" value="{{$meta->description}}"/>
                @error('description')
                <p class="text-bold text-danger">{{$message}}</p>
                @enderror
               </div>  
               <div class="form-group col-6">
                <label class="form-label">Meta Keyword</label>
                <input type="text"  class="form-control" name="keywords" Placeholder="Meta Keywords" value="{{$meta->keywords}}"/>
                @error('keywords')
                <p class="text-bold text-danger">{{$message}}</p>
                @enderror
            </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label class="form-label">Open Graph Url</label>
                <input type="text" class="form-control" name="url" palceholder="Open Graph URL[og:url]" value="{{$meta->url}}"/>
              </div>
               <div class="form-group col-6">
                <label class="form-label">Open Graph Image</label>
                <input type="file" class="form-control" name="image" placeholder="Open Graph Image">
               </div>
            </div>
             <div class="row">
            <div class="form-group col-md-4">
                <label class="form-label">Robots</label>
                <select name="robots" class="form-control">
                    <option @if($meta->robots=="index ,follow") selected @endif value="index ,follow">Follow</option>
                    <option @if($meta->robots=="index ,unfollow") selcted @endif value="index ,unfollow">UnFollow</option>
                </select>
            </div>  
             <div class="form-group col-md-4" >
                <label class="form-label">GoogleBots</label>
                 <select name="googlebot" class="form-control">
                    <option @if($meta->googlebots=="index ,follow") selected @endif  value="index ,follow">Follow</option>
                    <option @if($meta->googlebots=="index ,unfollow") selcted @endif value="index ,unfollow">UnFollow</option>
                </select>
            </div>
              <div class="form-group col-md-4" >
                <label class="form-label">Bingbots</label>
                 <select name="bingbot" class="form-control">
                    <option @if($meta->bingbots=="index ,follow") selcted @endif value="index ,follow">Follow</option>
                    <option @if($meta->bingbots=="index ,unfollow") selcted @endif value="index ,unfollow">UnFollow</option>
                </select>
            </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                    <img src="" alt="og:image"/>
                </div>
                <div class="form-group col-6">
                    <input type="submit" class="btn btn-info btn-sm" value="update"/>
                </div>
            </div>
            @csrf
            </form>
        </div>
    </div>
</div>
@endsection