@extends('layout.frontend.main')

@section('title', 'Product')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@section('content')
    <style>
        .cart-btn {
            max-width: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgb(38, 36, 36);
            border-radius: 10px;
            margin-bottom: 20px;
            background: rgb(16, 16, 188);
        }

        .cart-count {
            width: 100px;
            padding: 0px 30px;
            font-size: 22px;
            font-weight: 500;
            color: rgb(240, 233, 233);
            border: none;
            outline: none;
            background: none;
        }

        /* #color{
                                width: 50px;
                                height: 50px;
                                accent-color: red;
                            } */
        /* input[type='checkbox'] {
                            accent-color: red;
                        } */
        .color-main-container {
            width: 100%;
            height: 20%;
            /* border: 2px solid black; */
            display: flex;
            align-items: center;
            margin-bottom: 30px;


        }

        .color-container {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            margin: 0px 10px;
        }
    </style>

    <div class="col-md-12 grid-margin stretch-card my-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark" style="margin-left: 50px; font-weight:800;">{{ $product->category->name }}
                </h4>
                <div class="container">
                    <form action="{{ url('/checkout') . '/' . $product->id }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="card" style="width: 18rem; margin:20px;">
                                <a href="{{ '/collactions/single_product' . '/' . $product->id }}">
                                    <img src="{{ asset($product->productImages[0]->images) }}" class="card-img-top"
                                        alt="Not Found" width="300px" height="300px">
                                    <div class="card-body">
                                        <p class="card-text"
                                            style="text-decoration: none; text-align:center; font-weight: 500; text-transform:capitalize;">
                                            {{ $product->name }}</p>
                                    </div>
                                </a>
                                @php
                                    $dis_price = $product->original_price - $product->selling_price;
                                    $discount = ($dis_price * 100) / $product->original_price;
                                @endphp
                                <p class="card-text">
                                    <span
                                        style="font-size:16px;font-weight: 500; display:block;">Rs{{ $product->selling_price }}
                                        <span
                                            style="font-size:16px;font-weight: 500; display:block; float: right; color:red">OFF:-{{ $discount }}%</span>
                                    </span>
                                    <span style="font-size:16px;font-weight: 500; display:block; color:rgb(139, 43, 43)">Rs
                                        <del>{{ $product->original_price }}</del></span>
                                </p>
                            </div>

                            <div class="col-6 my-5 mx-3">
                                <div class="cart-btn">
                                    <button type="button" class="subCount btn btn-primary">-</button>
                                    <input type="number" class="cart-count" name="quantity" id="quantity" value="1">
                                    <button type="button" class="addCount btn btn-primary">+</button>
                                </div>

                                <div>
                                    <h4>Slect Colors</h4>
                                    <div class="color-main-container">
                                        @foreach ($product->productcolors as $item)
                                            <p class="color-container" style="background: {{ $item->color->code }}">
                                                <input type="checkbox" name="color[{{ $item->color->id }}]" id="color"
                                                    style="accent-color: {{ $item->color->code }};"
                                                    value="{{ $item->color->id }}">
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <p>{{ $product->description }}</p>
                                <button type="button" value="{{ $product->id }}"
                                    class="addtocart btn btn-primary my-2">Add To Cart</button>
                                <button type="submit" class="btn btn-success">Check Out</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {


            // incress quantity
            $(document).on('click', '.addCount', function() {
                var quantity = $(this).closest('.cart-btn').find('.cart-count').val();
                quantity++;
                $('.cart-count').val(quantity);
            });

            //  decress quantity
            $(document).on('click', '.subCount', function() {
                var quantity = $(this).closest('.cart-btn').find('.cart-count').val();
                if (quantity > 1) {
                    quantity--;
                    $('.cart-count').val(quantity);
                } else {
                    $('.cart-count').val(quantity);
                }

            });

        });
    </script>
    <script>
        $(document).ready(function() {
            // add to cart
            $(document).on('click', '.addtocart', function(e) {

                e.preventDefault();
                // console.log('click');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_id = $(this).val();
                var quantity = $(this).closest('.cart-btn').find('.cart-count').val();

                $.ajax({

                    url: "{{ route('addtocart') }}",
                    method: "POST",
                    data: {
                        'quantity': quantity,
                        'product_id': product_id,
                    },
                    success: function(response) {
                        // alertify.set('notifier', 'position', 'top-right');
                        // alertify.success(response);
                        console.log(response);
                    },
                });

            });
        });
    </script>

@endsection
