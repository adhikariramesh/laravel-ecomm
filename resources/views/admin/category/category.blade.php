@extends('layout.admin.main')

@section('content')
@if (session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@error('name')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('slug')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('meta_title')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('meta_keyword')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('description')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('image')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror



    <div class="container my-3">
        <form class="forms-sample" action="{{url('/admin/category/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control p-input" name="name" placeholder="Enter Category Name">
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control p-input" name="slug" placeholder="Password">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control p-input" name="meta_title" placeholder="Enter Category Name">
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">Meta Keywords</label>
                    <input type="text" class="form-control p-input" name="meta_keyword" placeholder="Password">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleTextarea">Description</label>
                    <textarea class="form-control p-input" id="exampleTextarea" name="description" rows="3"></textarea>
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputFile">Select Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
