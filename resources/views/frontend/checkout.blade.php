@extends('layout.frontend.main')

@section('title', 'Check Out')

@section('content')


    <div class="col-md-12 grid-margin stretch-card my-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark" style="margin-left: 50px; font-weight:800;">Payment</h4>
                <div class="container">
                    <form action="{{ url('/checkout')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$quantity}}" name="quantity">
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <div class="row">
                            <div class="card" style="width: 18rem; margin:20px;">
                                <a href="{{ '/collactions/single_product'}}">
                                    <img src="{{asset('payment_logo/esewa.png')}}" class="card-img-top" alt="Not Found" width="300px" height="300px">
                                    <div class="card-body">
                                        <p class="card-text btn " style="background: rgb(82, 169, 82); color:rgb(203, 204, 204)">Pay with Esewa</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card" style="width: 18rem; margin:20px;">
                                <a href="{{ '/collactions/single_product'}}">
                                    <img src="{{asset('payment_logo/khalti.png')}}" class="card-img-top" alt="Not Found" width="300px" height="300px">
                                    <div class="card-body">
                                        <p class="card-text btn" style="background: rgb(145, 35, 192); color:rgb(203, 204, 204)">Pay with Khalti</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card" style="width: 18rem; margin:20px;">
                                <a href="{{ '/collactions/single_product'}}">
                                    <img src="{{asset('payment_logo/paytm.png')}}" class="card-img-top" alt="Not Found" width="300px" height="300px">
                                    <div class="card-body">
                                        <p class="card-text btn btn-success">Pay with Paytm</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>


    @endsection
