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
                    Application Setting
                </div>
            </div>
               <div class="card-body">
                <form method="post" action="{{route('application.store')}}" enctype="multipart/form-data">
                    <div class="row">
                         <div class="form-group col-md-6">
                         <label for="name" class="form-lable">Name</label>
                         <input type="text" class="form-control" placeholder="Application Name" id="name" name="name" value="{{old('name')}}" />
                         @error('name')
                          <p class="text-danger text-bold">{{$message}}</p>
                         @enderror
                     </div>
                     <div class="form-group col-md-6">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" class="form-control" placeholder="Application Email" id="email" name="email" value="{{old('email')}}"/>
                         @error('email')
                         <p class="text-danger text-bold">{{$message}}</p>
                         @enderror
                     </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12 ">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" maxlength="10" minlength="10" placeholder="Contact Info" class="form-control" id="phone" name="phone" value="{{old('phone')}}"/>
                            @error('phone')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12 ">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" placehoder="Enter The Address" placeholder="Address" id="address" name="address" value="{{old('address')}}"/>
                            @error('address')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12 ">
                        <label class="form-label" for="country">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="Country Name" name="country" value="{{old('country')}}" />
                        @error('country')
                        <p class="text-danger text-bold">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-12 ">
                            <label class="form-label" for="state">State</label>
                            <input type="text" class="form-control" id="state" placeholder="State Name" name="state" value="{{old('state')}}"/>
                            @error('state')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12 ">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="City Name" value="{{old('city')}}"/>
                        @error('city')
                        <p class="text-danger text-bold">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-12 ">
                            <label class="form-label" for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="PostalCode" value="{{old('postal_code')}}"/>
                            @error('postal_code')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12 ">
                        <label class="form-label">Latitude</label>
                        <input type="text" id="lat" name="lat" class="form-control" Placeholder="Latitude" value="{{old('lat')}}"/>
                        @error('lat')
                        <p class="text-danger text-bold">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-12 ">
                            <label class="form-label">Longitude</label>
                            <input type="text" id="lng" name="lng" class="form-control" placeholder="Longitude" value="{{old('lng')}}">
                            @error('lng')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12 ">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" />
                            @error('logo')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12 ">
                            <label class="form-label">Favicon</label>
                            <input type="file" name="favicon" id="favicon" class="form-control" />
                            @error('favicon')
                            <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label class="form-label" for="lang">Application Language</label>
                            <input type="text" name="language" id="lang" class="form-control" placeholder="Application Language"/>
                             @error('language')
                             <p class="text-danger text-bold">{{$message}}</p>
                            @enderror
                        </div>
                     
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit" value="create" >Create</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
</div>

@endsection