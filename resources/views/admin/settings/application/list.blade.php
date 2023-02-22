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
    <table class="table table-stripped table-bordered ">
        <thead>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    NAME
                </th>
                <th>
                    EMAIL
                </th>
                <th>
                    PHONE
                </th>
                 <th>
                    ADDRESS
                </th>
                <th>
                    LOGO
                </th>
                <th>
                    FAVICON
                </th>
                <th>
                    POSTALCODE
                </th>
                <th>
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($settings as $setting)
            <tr>
                <td>{{$setting->id}}</td>
                <td>{{$setting->name}}</td>
                <td>{{$setting->email}}</td>
                <td>{{$setting->phone}}</td>
                <td>{{$setting->address}}</td>
                <td><img src="{{asset('storage/'.$setting->logo)}}" alt="applogo" height="50" width="50"/></td>
                <td><img src="{{asset('storage/'.$setting->favicon)}}" height="50" width="50" alt="appfav"/></td>
                <td>{{$setting->postal_code}}</td>
                <td>
                    <a href="{{route('application.edit',$setting->id)}}" class="btn btn-primary" ><i class="fa fa-edit"></i></a>
                    <a href="javascript::void(0)" class="btn btn-info" ><i class="fa fa-eye"></i></a>
                    <form method="post" action="{{route('application.destroy',$setting->id)}}" >
                        @method('DELETE')
                        <button class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                        @csrf
                    </form>
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>

@endsection