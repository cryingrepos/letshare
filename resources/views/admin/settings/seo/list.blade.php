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
                Seo Setting List
            </div>
        </div>
        <div class="card-body">
           <table class="table table-striped table-bordered ">
               <thead>
                   <tr>
                       <th>Id</th>
                       <th>Title</th>
                       <th>Description</th>
                       <th>Keywords</th>
                       <th>Url</th>
                       <th>Image</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse($metas as $meta)
                   <tr>
                      <td>{{$meta->id}}</td>
                     <td>{{$meta->title}}</td>
                     <td>{{$meta->description}}</td>
                     <td>{{$meta->keywords}}</td>
                     <td>{{$meta->url}}</td>
                     <td>{{$meta->image}}</td>
                     <td>
                         <a class="btn btn-primary" href="{{route('seo.edit',$meta->id)}}"><i class="fa fa-edit"></i></a>
                         <a class="btn btn-info" href="javascript::void(0)"><i class="fa fa-eye"></i></a>
                         <form action="{{route('seo.destroy',$meta->id)}}" method="post">
                             @method('DELETE')
                             <button class="btn btn-danger" onclick="return confirm('Are You Sure Want To Delete?')"><i class="fa fa-trash"></i></button>
                             @csrf
                         </form>
                     </td>
                   </tr>
                   @empty
                   <tr>No Seo Setting Found</tr>
                   @endforelse
               </tbody>
           </table>
        </div>
    </div>
</div>
@endsection