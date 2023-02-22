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
                Meta Setting Create
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('seo.store')}}">
                <div class="row">
                     <div class="form-group col-6">
                <lable class="form-label mb-2">Select Page And Slug To Add Meta</lable>
                <select class="form-control" name="slug">
                    <option value="home">Home</option>
                    <option value="faq">FAQ</option>
                    <option value="background">Background</option>
                    <option value="service">Service</option>
                    <option value="message">Message</option>
                    <option value="wwa">Who WE ARE</option>
                    <option value="contact">Contact</option>
                    <option value="registration">Registration</option>
                    <option value="login">Login</option>
                    @forelse($ideas as $post)
                     <option value="{{$post->slug}}">{{$post->title}}</option>
                    @empty
                      <option>No Slug Avialable</option>
                    @endforelse
                </select>
                @error('slug')
                <p class="text-bold text-danger">{{$message}}</p>
                @enderror
            </div>
              <div class="form-group col-md-6">
                <label class="form-label">Meta Title</label>
                <input type="text" class="form-control" name="title" placeholder="Meta Title" value="{{old('title')}}"/>
                @error('title')
                <p class="text-bold text-danger">{{$message}}</p>
                @enderror
            </div>
                </div>
               
            <div class="row">
             <div class="form-group col-md-6">
                <label class="form-label">Meta Keyword</label>
                <input type="text" class="form-control" name="keywords" Placeholder="Meta Keywords" value="{{old('keywords')}}"/>
                @error('keywords')
                <p class="text-bold text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class"form-label">Meta Description</label>
                <input type="text" class="form-control" name="description" placeholder="Meta Description" value="{{old('description')}}"/>
                @error('description')
                <p class="text-bold text-danger">{{$message}}</p>
                @enderror
            </div>   
            </div>
            <div class="row">
            <div class="form-group col-md-6">
                <label class="form-label">Open Graph Url</label>
                <input type="text" class="form-control" name="url" placeholder="Open Graph URL" value="{{old('url')}}"/>
            </div>  
             <div class="form-group col-md-6">
                <label class="form-label">Open Graph Image</label>
                <input type="file" class="form-control" name="image" placeholder="Open Graph Image">
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-4">
                <label class="form-label">Robots</label>
                <select class="form-control" name="robots">
                    <option value="index ,follow">Follow</option>
                    <option value="index ,unfollow">UnFollow</option>
                </select>
            </div>  
             <div class="form-group col-md-4">
                <label class="form-label">GoogleBots</label>
                 <select class="form-control" name="googlebot">
                    <option value="index ,follow">Follow</option>
                    <option value="index ,unfollow">UnFollow</option>
                </select>
            </div>
              <div class="form-group col-md-4">
                <label class="form-label">Bingbots</label>
                 <select class="form-control" name="bingbot">
                    <option value="index ,follow">Follow</option>
                    <option value="index ,unfollow">UnFollow</option>
                </select>
            </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="create" />
            </div>
            @csrf
            </form>
            
        </div>
    </div>
</div>
@endsection