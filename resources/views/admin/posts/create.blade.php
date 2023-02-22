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
                <span>Create Post</span>
             </div>
            </div>
            <div class="card-body">
              <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                <div class="row ">
                    <div class="form-group col-md-6">
                        <label class="form-label">Post Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter The Post Title" value="{{old('title')}}" />
                        @error('title')
                           <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Post Related Image</label>
                        <input type="file" name="image" class="form-control" name="title"  />
                        @error('image')
                           <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Post Description</label>
                    <textarea name="content" class="form-control">{{old('description')}}</textarea>
                    @error('content')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="btn btn-info" type="submit" value="create"/>
                </div>
                @csrf
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
