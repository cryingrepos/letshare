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
                <small>FAQ</small>
                <h5 class="text-info">Applet</h5></h5>
            </div>
        </div>
    </div>
</div>
<div class="conatiner-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-tiitle">
                <span>List of applets</span>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL.NO</th>
                        <th>Applet Name</th>
                        <th>Applet Slug</th>
                        <th>Applet Position</th>
                        <th>Applet Type</th>
                        <th>Parent Applet</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @forelse($applets as $applet)
                       <tr>
                         <td>{{$i}}</td>
                         <td>{{$applet->applet_name}}</td>
                         <td>{{$applet->applet_slug}}</td>
                         <td>{{$applet->position}}</td>
                         <td>{{$applet->type}}</td>
                          <td>@if($applet->parent_id=="0") SELF @else {{$applet->parent_id}} @endif</td>
                          <td>{{date('d-M-Y',strtotime($applet->created_at))}}</td>
                          <td>
                              <a href="{{route('applets.edit',['applet'=>$applet->id])}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                               <form method="post" action="{{route('applets.destroy',['applet'=>$applet->id])}}">
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure Want to delete?')" ><i class="fa fa-trash"></i></button>
                                   @csrf
                               </form>
                          </td>
                     </tr>
                     @php
                     $i++
                     @endphp
                    @empty
                    <tr>No APPLET AVAILBALE</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection