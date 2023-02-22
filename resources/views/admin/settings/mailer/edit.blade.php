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
                   Update Mailer Setting
                </div>
            </div>
               <div class="card-body">
                <form method="post" action="{{route('mailer.update',$mailer->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    <div class="row">
                         <div class="form-group col-md-6">
                         <label for="name" class="form-lable">Transport Type</label>
                         <input type="text" class="form-control" placeholder="Server[smtp,sendmail] " id="transport" name="transport" value="{{$mailer->transport}}" />
                         @error('transport')
                          <p class="text-danger text-bold">{{$message}}</p>
                         @enderror
                     </div>
                     <div class="form-group col-md-6">
                         <label for="email" class="form-label">HOST</label>
                         <input type="text" class="form-control" placeholder=" Mailer HOST" id="host" name="host" value="{{$mailer->host}}"/>
                         @error('host')
                         <p class="text-danger text-bold">{{$message}}</p>
                         @enderror
                     </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12 ">
                            <label for="phone" class="form-label">PORT</label>
                            <input type="text"  placeholder="Mailer Port" class="form-control" id="port" name="port" value="{{$mailer->port}}"/>
                            @error('port')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12 ">
                            <label for="address" class="form-label">ENCRYPTION</label>
                            <input type="text" class="form-control" placehoder="Mailer Encryption" placeholder="Encryption" id="encryption" name="encryption" value="{{$mailer->encryption}}"/>
                            @error('encryption')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12 ">
                        <label class="form-label" for="country">USERNAME</label>
                        <input type="text" class="form-control" id="username" placeholder="Mailer Username" name="username" value="{{$mailer->username}}" />
                        @error('username')
                        <p class="text-danger text-bold">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-12 ">
                            <label class="form-label" for="state">PASSWORD</label>
                            <input type="text" class="form-control" id="password" placeholder="Mailer Password" name="password" value="{{$mailer->password}}"/>
                            @error('password')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12 ">
                        <label class="form-label">Timeout</label>
                        <input type="text" class="form-control" name="timeout" id="timeout" placeholder=" Mailer TimeOut" value="{{$mailer->timeout}}"/>
                        @error('timeout')
                        <p class="text-danger text-bold">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-12 ">
                            <label class="form-label" for="postal_code">From Address</label>
                            <input type="text" class="form-control" id="from_address" name="from_address" placeholder="Mailer Form Address" value="{{$mailer->from_address}}"/>
                            @error('from_address')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit" value="update" >update</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
</div>

@endsection