@extends('layout.frontend.main')

@section('title', 'Home')

@section('content')


<div class="col-md-12 grid-margin stretch-card my-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-dark" style="margin-left: 50px; font-weight:800;">Products</h4>
            <div class="container">
                <div class="row">
                    @if ($collaction)
                        @foreach ($collaction as $item)
                            <div class="card" style="width: 18rem; margin:20px;">
                                <a href="{{url('/collactions/single_product' . '/' . $item->id )}}">
                                    <img src="{{asset($item->productImages[0]->images)}}" class="card-img-top" alt="Not Found" width="300px"
                                        height="300px">
                                    <div class="card-body">
                                        <p class="card-text" style="text-decoration: none; text-align:center; font-weight: 500; text-transform:capitalize;">{{ $item->name }}</p>
                                    </div>
                                </a>
                                @php
                                    $dis_price = $item->original_price - $item->selling_price;
                                    $discount = ($dis_price*100)/$item->original_price;
                                @endphp
                                <p class="card-text">
                                    <span style="font-size:16px;font-weight: 500; display:block;">Rs{{$item->selling_price}}
                                    <span style="font-size:16px;font-weight: 500; display:block; float: right; color:red">OFF:-{{$discount}}%</span>
                                    </span>
                                    <span style="font-size:16px;font-weight: 500; display:block; color:rgb(139, 43, 43)">Rs <del>{{$item->original_price}}</del></span>
                                </p>
                               <button type="submit" class="btn btn-success">Add To Cart</button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
