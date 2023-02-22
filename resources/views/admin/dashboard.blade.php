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
                <h5 class="text-info">{{$t_users}}</h5>
            </div>
        </div>
    </div>
</div>
<style>
    .sidebar .logo {
        width:100% !important;
        height:100px !important;
    }
    .post-img{
          width:100% !important;
        height:100% !important;
        border-radius:50% !important;
    }
    
</style>

<div class="container-fluid">
    <div class="row">
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mr-4">
                            <small>Total Posts</small>
                            <h4 class="mb-0">{{$counts}}</h4>
                        </div>
                        <div class="chart ml-auto">
                           {{date('d-M-Y')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover bg-red">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mr-4">
                            <small>Total Comments</small>
                            <h4 class="mb-0">{{$idea->total_comments}}</h4>
                        </div>
                        <div class="chart ml-auto">
                            {{date('d-M-Y')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover bg-green">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mr-4">
                            <small>Total Users That Subscribed For Arena</small>
                            <h4 class="mb-0">{{ $total_member}}</h4>
                        </div>
                        <div class="chart ml-auto">
                            {{date('d-M-Y')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Trending Posts On AVRT</h4>
                            <p class="card-subtitle">Most Commented Posts</p>
                        </div>
                        <!--<div class="ml-auto">-->
                        <!--    <div class="dl">-->
                        <!--        <select class="custom-select">-->
                        <!--            <option value="0" selected="">Monthly</option>-->
                        <!--            <option value="1">Daily</option>-->
                        <!--            <option value="2">Weekly</option>-->
                        <!--            <option value="3">Yearly</option>-->
                        <!--        </select>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <!-- title -->
                </div>
                <div class="table-responsive">
                    <table class="table v-middle">
                        <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Posts</th>
                                <th class="border-top-0">Created BY</th>
                                <th class="border-top-0">Created At</th>
                                <th class="border-top-0">Topic</th>
                                <th class="border-top-0">Comments</th>
                                <th class="border-top-0">Likes</th>
                                <th class="border-top-0">Membership</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($trending_post as $post)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a
                                                class="btn btn-circle btn-info text-white"><img class="post-img" src="{{asset('storage/'.$post->image)}}" alt="image"/></a></div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">{{$post->title}}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$post->name}}</td>
                                <td>{{date('d-M-Y',strtotime($post->created_at))}}</td>
                                
                                <td>
                                    <label class="label label-danger">Posts</label>
                                </td>
                                <td>{{$post->total_comment}}</td>
                                <td>5</td>
                                <td>
                                    <h5 class="m-b-0">1</h5>
                                </td>
                            </tr>
                            @empty
                                 <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a
                                                class="btn btn-circle btn-info text-white">EA</a></div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Elite Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="label label-danger">Angular</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card card-hover">
                <div class="card-body">
                    <h4 class="card-title">Recent Memberships</h4>
                    <table
                        class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="font-w700">Type</th>
                                <th class="d-none d-sm-table-cell font-w700">Start Date</th>
                                <th class="font-w700">End Date</th>
                                <th class="d-none d-sm-table-cell font-w700 text-right"
                                    style="width: 120px;">Price</th>
                                <th class="font-w700 text-center" style="width: 60px;">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($memberships as $membership )
                            <tr>
                                <td>
                                    <span class="font-w600">{{$membership->type}}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{date('d-M-Y',strtotime($membership->created_at))}}</span>
                                </td>
                                <td>
                                    @php
                                   if($membership->type=="yearly"){
                                    $till='+1 year';
                                   }
                                      if($membership->type=="weekly"){
                                    $till='+1 week';
                                   }
                                      if($membership->type=="monthly"){
                                    $till='+1 month';
                                   }
                                   
                                  @endphp
                                    <span class="font-w600 text-warning">{{date('d-M-Y',strtotime($till,strtotime($membership->created_at)))}}</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    {{$membership->payment_amount}}
                                </td>
                                <td class="text-center">
                                  {{$membership->name}} 
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    <span class="font-w600">Membership Not Avialable</span>
                                </td>
                              
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">File Tree</h4>
                    <div class="tree">
                        <ul>
                            <li><i class="fa fa-folder-open"></i> Project
                                <ul>
                                    <li><i class="fa fa-folder-open"></i> Opened Folder <span>-
                                            15kb</span>
                                        <ul>
                                            <li><i class="fa fa-folder-open"></i> css
                                                <ul>
                                                    <li><i class="fa fa-code"></i> CSS Files <span>-
                                                            3kb</span>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li><i class="fa fa-folder"></i> Folder close <span>-
                                                    10kb</span>
                                            </li>
                                            <li><i class="fab fa-html5"></i> index.html</li>
                                            <li><i class="fa fa-picture-o"></i> favicon.ico</li>
                                        </ul>
                                    </li>
                                    <li><i class="fa fa-folder"></i> Folder close <span>- 420kb</span>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-6">
            <div class="card has-shadow">
                <div class="card-body border-top">
                    <h4 class="card-title">AVRT Users</h4>
                    <table class="table mb-0">
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="color-green">{{date('d-M-Y',strtotime($user->created_at))}}</td>
                            </tr>
                            @empty
                             <tr>
                                <td>APPL</td>
                                <td>$ 9,500</td>
                                <td class="color-green">+ 458</td>
                            </tr>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Five Admin Activity</h4>
                    <!--<table class="table">-->
                    <!--    <thead>-->
                    <!--        <tr>-->
                    <!--            <th>Image</th>-->
                    <!--            <th>Product</th>-->
                    <!--            <th>Customer</th>-->
                    <!--            <th>Purchased On</th>-->
                    <!--            <th>Status</th>-->
                    <!--            <th>Tracking No#</th>-->
                    <!--        </tr>-->
                    <!--    </thead>-->
                    <!--    <tbody>-->
                    <!--        <tr>-->
                    <!--            <td>-->
                    <!--                <img src="https://bootadmin.org/images/icons/lulu/Desktop.png"-->
                    <!--                    style="width:50px" alt="iMac">-->
                    <!--            </td>-->
                    <!--            <td>iMac</td>-->
                    <!--            <td>Russell</td>-->
                    <!--            <td>22/08/2018</td>-->
                    <!--            <td>-->
                    <!--                <span class="badge badge-success font-weight-100">Paid</span>-->
                    <!--            </td>-->
                    <!--            <td>#98BC85SD84</td>-->
                    <!--        </tr>-->
                    <!--        <tr>-->
                    <!--            <td>-->
                    <!--                <img src="https://bootadmin.org/images/icons/lulu/Mobile.png"-->
                    <!--                    style="width:50px" alt="iPhone">-->
                    <!--            </td>-->
                    <!--            <td>iPhone</td>-->
                    <!--            <td>Carol</td>-->
                    <!--            <td>15/07/2018</td>-->
                    <!--            <td>-->
                    <!--                <span class="badge badge-warning font-weight-100">Pending</span>-->
                    <!--            </td>-->
                    <!--            <td>#98SA3C9SC</td>-->
                    <!--        </tr>-->
                    <!--        <tr>-->
                    <!--            <td>-->
                    <!--                <img src="https://bootadmin.org/images/icons/lulu/Clock.png"-->
                    <!--                    style="width:50px" alt="apple_watch">-->
                    <!--            </td>-->
                    <!--            <td>Apple Watch</td>-->
                    <!--            <td>Austin Pena</td>-->
                    <!--            <td>10/07/2018</td>-->
                    <!--            <td>-->
                    <!--                <span class="badge badge-success font-weight-100">Paid</span>-->
                    <!--            </td>-->
                    <!--            <td>#98BC85SD84</td>-->
                    <!--        </tr>-->
                    <!--        <tr>-->
                    <!--            <td>-->
                    <!--                <img src="https://bootadmin.org/images/icons/lulu/Headphones.png"-->
                    <!--                    style="width:50px" alt="mac_mouse">-->
                    <!--            </td>-->
                    <!--            <td>Headphones</td>-->
                    <!--            <td>Randy</td>-->
                    <!--            <td>22/04/2018</td>-->
                    <!--            <td>-->
                    <!--                <span class="badge badge-default font-weight-100">Failed</span>-->
                    <!--            </td>-->
                    <!--            <td>#98SA3C9SC</td>-->
                    <!--        </tr>-->
                    <!--    </tbody>-->
                    <!--</table>-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
