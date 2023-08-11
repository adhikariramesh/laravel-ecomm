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
        <div class="row">
            <div class="col-6">
                <h2 class="card-title">Update Category</h2>
            </div>
            <div class="col-6">
               <a href="{{url('/admin/add/category')}}" class="btn btn-danger" style="float: right">BACK</a>
            </div>
        <form class="forms-sample" action="{{url('/admin/category/update/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control p-input" name="name" value="{{$category->name}}">
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control p-input" name="slug" value="{{$category->slug}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control p-input" name="meta_title" value="{{$category->meta_title}}">
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">Meta Keywords</label>
                    <input type="text" class="form-control p-input" name="meta_keyword" value="{{$category->meta_keyword}}">
                </div>
            </div>
            <div class="row">
                <div class=" col-5">
                    <label for="exampleTextarea">Description</label>
                    <textarea class="form-control"  name="description" rows="3">
                        {{$category->description}}
                    </textarea>
                </div>

                <div class="form-group col-5">
                    <label for="exampleInputFile">Select Image</label>
                    <input type="file" class="form-control-file" name="image">
                    <div>
                        <img src="{{asset($category->images)}}" alt="not found" width="50px" height="50px" style="border:1px solid black; margin-top:20px; box-shadow: 1px 1px 1px black">
                    </div>
                </div>


            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
