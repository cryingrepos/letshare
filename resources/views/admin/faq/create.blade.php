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
                <h5 class="text-info">{{$faqs->count()}}</h5>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <span>Create FAQ</span>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('faq.store')}}">
                <div class="form-group">
                    <label class="form-label">Enter the question you want to post</label>
                    <input class="form-control" name="question" placeholder="Post Question" value="{{old('question')}}"/>
                    @error('question')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                 <div class="form-group">
                    <label class="form-label">Enter the answer of above question</label>
                     <textarea name="answer" >
                         {{old('answer')}}
                     </textarea>
                     @error('answer')
                     <p class="text-danger">{{$message}}</p>
                     @enderror
                 </div>
                 <div class="form-group">
                     <input type="submit" class="btn btn-info" value="Post"/>
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
       $('textarea').summernote(); 
    });
</script>
@endsection