@extends('parent')
@section('content')
<style>
    .main-section{
      height: 100%;
      width:100%;
      display: flex;
      flex-direction:column;
      justify-content: space-evenly;
      align-items: center;
    }
    .membership{
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
    }
   
    .method{
        height:80px;
        width:100px;
    }
    .method img{
          height:100%;
        width:100%;
         border:2px solid #ffc107 !important;
    }
    .image img{
          height:100%;
        width:100%;
        border-top:4px solid #ffc107 !important;
    }
    .price{
        color:#ffc107;
    }
    input[type="radio"]{
        border:2px solid #ffc107 !important;
        height:30px;
        width:30px;
    }
</style>
@include('ideas.stripemodal')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
       <div class="container">
          <ol>
             <li><a href="index.php">Home</a></li>
             <li>Checkout</li>
          </ol>
          <h2>Membership</h2>
       </div>
    </section>
   <div class="container-fluid">
    <div class="main-section">
      <h2>Choose A Membership Plan</h2>

      <p>Please Choose A Membership Plan to Proceed Further,To Join The Dicusssion.And Share Your Addictive Voice Through Comments And Reply.</p>

      <div class="container-fluid">
        <form action="">
        <div class="membership">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="image">
                        <img src="{{asset('img/checkout/card-1.jpg')}}" alt="card-1">
                    </div>
                    <div class="d-flex justify-content-center ">
                        <label for="card-1" class="card-label"></label>
                        <input type="radio" class="type" id="card-1" value="weekly" name="membership">
                    </div>
                    <div class="d-flex justify-content-center ">
                        <label for="">Price/Week:</label>
                        <p class="ml-2 price">$150</p>
                    </div>

                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="image">
                        <img src="{{asset('img/checkout/card-2.jpg')}}" alt="card-2">
                    </div>
                    <div class="d-flex justify-content-center ">
                        <label for="card-2" class="card-label"></label>
                        <input type="radio" class="type" id="card-2" value="monthly" name="membership">
                    </div>
                    <div class="d-flex justify-content-center ">
                        <label for="">Price/Month:</label>
                        <p class="ml-1 price">$500</p>
                    </div>
                </div>
                <div class=" col-12 col-lg-4 col-md-6">
                    <div class="image">
                        <img src="{{asset('img/checkout/card-3.jpg')}}" alt="card-3">
                    </div>
                    <div class="d-flex justify-content-center ">
                        <label for="card-3" class="card-label"></label>
                        <input type="radio" class="type" id="card-3" value="yearly" name="membership">
                    </div>
                    <div class="d-flex justify-content-center ">
                        <label for="">Price/Year:</label>
                        <p class="ml-1 price">$5000</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="membership">
            <div class="row">
                <div class="">
                    <div class="form-group">
                        <label class="form-label">Your Name</label>
                        <input class="form-control"  id="check_name" placeholder="Enter Your Name"/>
                         <p class="text-danger hidden"  id="name_error"></p>
                    </div>
                    <div class="form-group">
                       <label class="form-label">Your Email</label>
                       <input class="form-control" id="check_email"   @if(Auth::check()) value="{{Auth::user()->email}}" @else value="" @endif/>
                       <p class="text-danger hidden"  id="payment_method"></p>
                       <p class="text-danger hidden"  id="member_type"></p>
                    </div>
                </div>
                <label class="form-label">Select Payment Method</label>
                <div class=" d-flex justify-content-around">
                    <div class="col-12 col-lg-4 col-md-6 method d-flex flex-column justify-content-center align-items-center">
                        <img  src="{{asset('img/checkout/paypal.jpg')}}"/>
                        <input type="radio" name="payment" class="payment" value="paypal" id="paypal">
                        
                    </div>
                    <div class="col-12 col-lg-4 col-md-6 method d-flex flex-column justify-content-center align-items-center">
                         <img  src="{{asset('img/checkout/visa.jpg')}}"/>
                        <input type="radio" name="payment"  class="payment" value="stripe" id="stripe"/>
                    </div>
                     
                </div>
                <div class="mt-4 pb-2 row">
                    <button type="button" id="checkout" class="btn btn-primary mt-2">Checkout</button>
                </div>
            </div>
        </div>
       </form>
      </div>
    </div>
   </div>

</main>

@endsection
