@extends('layout.admin.main')

@section('content')
    @if (session('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @error('category_id')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror

    @error('brand')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    @error('name')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    @error('slug')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    @error('meta_title')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    @error('meta_keyword')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror



    @error('status')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror




    <div class="col-lg-12 grid-margin stretch-card my-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Update Products</h4>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/admin/products') }}" class="btn btn-danger" style="float: right">BACK</a>

                    </div>

                </div>
                <form action="{{ url('/admin/products/update/' . $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">HOME</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo-tab-pane"
                                type="button" role="tab" aria-controls="seo-tab-pane" aria-selected="false">SEO
                                TAGS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="detais-tab" data-bs-toggle="tab" data-bs-target="#detais-tab-pane"
                                type="button" role="tab" aria-controls="detais-tab-pane"
                                aria-selected="false">DETAILS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane"
                                type="button" role="tab" aria-controls="image-tab-pane"
                                aria-selected="false">IMAGES</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="colors-tab" data-bs-toggle="tab"
                                data-bs-target="#colors-tab-pane" type="button" role="tab"
                                aria-controls="colors-tab-pane" aria-selected="false">COLORS</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="container my-5">
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="category">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            {{-- <option value="">select Category</option> --}}
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="brand">Brand</label>
                                        <select name="brand" id="brand" class="form-control">
                                            <option value="{{ $product->brand }}">{{ $product->brand }}</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4 ">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" id="name"
                                            value="{{ $product->name }}" class="form-control">
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="name">Product Slug</label>
                                        <input type="text" name="slug" id="slug"
                                            value="{{ $product->slug }}" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3 col-8">
                                    <label for="name">small description (500 words)</label>
                                    <textarea name="small_desc" id="small_desc" class="form-control" rows="2">
                                        {{ $product->small_description }}
                                    </textarea>
                                </div>
                                <div class="mb-3 col-8">
                                    <label for="name">description</label>
                                    <textarea name="desc" id="desc" class="form-control" rows="2">
                                        {{ $product->description }}
                                    </textarea>
                                </div>

                            </div>
                        </div>


                        <div class="tab-pane fade my-5" id="seo-tab-pane" role="tabpanel" aria-labelledby="seo-tab"
                            tabindex="0">
                            <div class="mb-3 col-4">
                                <label for="name">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title"
                                    value="{{ $product->meta_title }}" class="form-control">
                            </div>
                            <div class="mb-3 col-8">
                                <label for="name">Meta Keywords</label>
                                <textarea name="meta_kayword" id="meta_keyword" class="form-control" style="height: 200px"  rows="5">
                                    {{ $product->meta_keyword }}
                                </textarea>
                            </div>
                            <div class="mb-3 col-8">
                                <label for="name">Meta description</label>
                                <textarea name="meta_desc" id="meta_desc" class="form-control" rows="4">
                                    {{ $product->meta_description }}
                                </textarea>
                            </div>

                        </div>


                        <div class="tab-pane fade my-5" id="detais-tab-pane" role="tabpanel"
                            aria-labelledby="detais-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="original_price">Original Price</label>
                                        <input type="number" name="original_price" id="original_price"
                                            class="form-control" value="{{ $product->original_price }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 ">
                                        <label for="selling_price">selling Price</label>
                                        <input type="number" name="selling_price" id="selling_price"
                                            class="form-control" value="{{ $product->selling_price }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control"
                                            value="{{ $product->quantity }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 col-4">
                                        <label for="tranding">Tranding</label>
                                        <input type="checkbox" name="tranding" id="tranding"
                                            {{ $product->tranding == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 col-4">
                                        <label for="status">Status</label>
                                        <input type="checkbox" name="status" id="status"
                                            {{ $product->status == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade my-5" id="colors-tab-pane" role="tabpanel"
                            aria-labelledby="colors-tab" tabindex="0">
                            <div class="row my-5">
                                @forelse ($colors as $item)
                                    <div class="col-md-4">
                                        {{-- <div class="p-3 border mb-3"></div> --}}
                                        color: <input type="checkbox" name="productColor[{{ $item->id }}]"
                                            value="{{ $item->id }}"> {{ $item->name }} <br>
                                        Quentity: <input type="number" name="colorQuantity[{{ $item->id }}]"
                                            style="width:80px; borderd:2px solid black;">
                                    </div>
                                @empty
                                    <div class="mb-3">
                                        <h5>No color found</h5>
                                    </div>
                                @endforelse
                            </div>

                            <table class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Colors Name</td>
                                        <td>Colors Quantity</td>
                                        <td>delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productcolors as $product_colors)
                                        <tr class="tr-color-row">
                                            <td>
                                                @if ($product_colors->color)
                                                    {{ $product_colors->color->name }}
                                                @else
                                                    No colors founds
                                                @endif
                                            </td>
                                            <td>
                                                Quantity: <input type="text" class="colorQuantity form-control-sm "
                                                    value="{{ $product_colors->quantity }}" width="100px">
                                                <button type="button" class="updateColorQuantityBtn btn btn-primary"
                                                    value="{{ $product_colors->id }}">Update</button>
                                            </td>
                                            <td>
                                                <button type="button" class="deleteColorQuantityBtn btn btn-danger"
                                                    value="{{ $product_colors->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade my-5" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">
                            <div class="mb-3 col-4">
                                <label for="image"
                                    style="font-weight: 500; color:rgb(73, 70, 70); margin-bottom:20px;">Upload Product
                                    Images</label>
                                <input type="file" name="image[]" id="image" multiple>
                            </div>
                            <div class="mb-3 col-12">
                                @if ($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $item)
                                            <div class="col-md-2">
                                                <img src="{{ asset($item->images) }}" width="100px" height="100px"
                                                    class="border" alt=""><br>
                                                <a class="deleteImage"
                                                    href="{{ url('admin/product/deleteimage/' . $item->id) }}"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h5>No Image Uploaded</h5>
                                @endif

                            </div>
                        </div>

                    </div>
                    <div>
                        <button type="submit" name="" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click','.updateColorQuantityBtn', function(){
                console.log('click');
                var product_id = "{{$product->id}}";
                var product_color_id = $(this).val();
                var quantity = $(this).closest('.tr-color-row').find('.colorQuantity').val();

                var data = {
                    'product_id': product_id,
                    'product_color_id': product_color_id,
                    'quantity': quantity
                }
                console.log(data);
                $.ajax({
                    type: 'POST',
                    url: "{{route('update_color')}}",
                    date: data,
                    success:function(response){
                        console.log(response);
                    }
            });
            });
        });
    </script>
@endsection
