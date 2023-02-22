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
                <span>List Of Posts</span>
             </div>
            </div>
            <div class="card-body">
               <table class="table table-bordered table-striped  ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>
                            <div class="table-img">
                              <img src="{{asset('storage/'.$post->image)}}"  alt="post_image">  
                            </div>
                            </td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td class="d-flex">
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info "><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary  ml-1"><i class="fa fa-eye"></i></a>
                            <form method="post" action="{{route('posts.destroy',$post->id)}}" >
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

@endsection
