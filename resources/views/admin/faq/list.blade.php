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
                <span>List of FAQ</span>
            </div>
        </div>
        <div class="card-body">
           <table class="table table-bordered table-stripped">
               <thead>
                   <tr>
                      <th>SL.NO</th>
                      <th>Qusetion</th>
                      <th>Answer</th>
                      <th>Created Date</th>
                      <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                   @php
                     $count=1;
                   @endphp
                   @forelse($faqs as $fq)
                     <tr>
                         <td>{{$count}}</td>
                         <td>{{$fq->question}}</td>
                         <td>{!! $fq->answer !!}</td>
                         <td>{{date('d-M-Y',strtotime($fq->created_at))}}</td>
                         <td class="d-flex">
                             <a href="{{route('faq.edit',['faq'=>$fq->id])}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                             <form method="post" action="{{route('faq.destroy',['faq'=>$fq->id])}}">
                                 @method('DELETE')
                                 <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure want delete?')"><i class="fa fa-trash"></i></button>
                                 @csrf
                             </form>
                         </td>
                     </tr>
                     @php
                     $count++
                     @endphp
                   @empty
                       <tr>No Data Avaialble</tr>
                   @endforelse
               </tbody>
           </table>
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