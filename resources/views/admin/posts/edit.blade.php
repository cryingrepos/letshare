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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
             <div class="card-title">
                <span>Update Post</span>
             </div>
            </div>
            <div class="card-body">
                <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data" >
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Post Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter The Post Title" value="{{$post->title}}" />
                            @error('title')
                               <p class="text-dahger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Post Related Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{$post->slug}}" />
                            @error('image')
                               <p class="text-dahger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                       <div class="col-md-6">
                        <label>Post Prevoius Image</label>
                        <img src="{{asset('storage/'.$post->image)}}" height="200" width="400">
                       </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Post Related Image</label>
                        <input type="file" name="image" class="form-control" />
                        @error('image')
                           <p class="text-dahger">{{$message}}</p>
                        @enderror
                    </div>
                    </div>


                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea name="description" class="form-control">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-info" type="submit" value="update"/>
                    </div>
                    @csrf
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection
