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
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <span>Update Applet</span>
            </div>
        </div>
        <div class="card-body">
           <form method="post" action="{{route('applets.update',['applet'=>$applet->id])}}">
               @method('PUT')
               <div class="row">
                   <div class="form-group col-6">
                   <label class="form-label">Enter Applet Name</label>
                   <input type="text" name="applet_name" class="form-control" placeholder="Applet Name" value="{{$applet->applet_name}}"/>
               </div>
                <div class="form-group col-6">
                   <label class="form-label">Enter Applet Slug</label>
                   <input type="text" name="applet_slug" class="form-control" placeholder="Applet Slug" value="{{$applet->applet_slug}}"/>
               </div>
               </div>
               <div class="row">
                  <div class="form-group col-6">
                   <label class="form-label">Select Parent Applet</label>
                   <select class="form-control" name="parent_id">
                    <option @if($applet->parent_id==0) selected @endif value="0">SELF</option>
                   @forelse($applets as $app)
                    <option @if($applet->parent_id==$app->id) selected @endif  value="{{$app->id}}">{{$app->applet_name}}</option>
                   @empty
                    <option>No Applet Available</option>
                   @endforelse
                   </select>
               </div>
                  <div class="form-group col-6">
                   <label class="form-label">Select Type</label>
                   <select class="form-control" name="type">
                       <option value="">Select Type</option>
                       <option  @if($applet->type=="M") selected @endif value="M">FrontNav</option>
                       <option  @if($applet->type=="A") selected @endif value="A">AdminSideBar</option>
                   </select>
               </div>   
               </div>
                <div class="form-group col-6">
                   <label class="form-label">Applet Position</label>
                   <input type="text" name="position" class="form-control" placeholder="Applet Position" value="{{$applet->position}}"/>
               </div>
               <div>
                   <input type="submit" value="update" class="btn btn-info" />
               </div>
               <div>
                   
               </div>
               
               @csrf
           </form>
        </div>
    </div>
</div>
@endsection
@section('customScript')
<script>
    $(function(){
      $('select').select2();   
    });
</script>
@endsection