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
                <h5 class="text-info">COUNT</h5>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <span>Update FAQ</span>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('faq.update',['faq'=>$faq->id])}}">
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Enter the question you want to post</label>
                    <input class="form-control" name="question"  value="{{$faq->question}}"/>
                </div>
                 <div class="form-group">
                    <label class="form-label">Enter the answer of above question</label>
                     <textarea name="answer" >
                         {!! $faq->answer !!}
                     </textarea>
                 </div>
                 <div>
                     <label>Select the status of FAQ</label>
                     <select name="status" class="form-control">
                         <option @if($faq->status=='A') selected @endif  value="A">Appropiate</option>
                         <option @if($faq->status=='IN') selected @endif value="IN">InAppropiate</option>
                     </select>
                 </div>
                 <div class="form-group">
                     <input type="submit" class="btn btn-info m-2" value="post"/>
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
       $('select').select2();
    });
</script>
@endsection