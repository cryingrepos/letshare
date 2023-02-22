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
                        Mailer Setting List
                    </div>
                </div>
                <div class="card-body">
                     <table class="table table-striped table-bordered table-responsive">
        <thead>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    TRANSPORT
                </th>
                <th>
                    HOST
                </th>
                <th>
                    PORT
                </th>
                 <th>
                    ENCRYPTION
                </th>
                <th>
                    TIMEOUT
                </th>
                <th>
                    FROMADDRESS
                </th>
                <th>
                    FROMNAME
                </th>
                <th>
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($mailers as $mailer)
            <tr>
                <td>{{$mailer->id}}</td>
                <td>{{$mailer->transport}}</td>
                <td>{{$mailer->host}}</td>
                <td>{{$mailer->port}}</td>
                <td>{{$mailer->encryption}}</td>
                 <td>{{$mailer->timeout}}</td>
                <td>{{$mailer->from_address}}</td>
                <td>{{$mailer->from_name}}</td>
                <td>
                    <a href="{{route('mailer.edit',$mailer->id)}}" class="btn btn-primary" ><i class="fa fa-edit"></i></a>
                    <a href="javascript::void(0)" class="btn btn-info" ><i class="fa fa-eye"></i></a>
                    <form method="post" action="{{route('mailer.destroy',$mailer->id)}}" >
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are You Sure Want To DELETE?')"> <i class="fa fa-trash"></i></button>
                        @csrf
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>No Mailer Setting Available</td>
            </tr>
            @endforelse
        </tbody>
    </table>
                </div>
            </div>
   
    </div>
    </div>
</div>

@endsection