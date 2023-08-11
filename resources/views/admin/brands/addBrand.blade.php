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
    <strong>Error</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('slug')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('category_id')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('status')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror





    <div class="container my-3">
        <form  action="{{url('/admin/brand/store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control p-input" name="name" placeholder="Enter Brand Name">
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control p-input" name="slug" placeholder="Slug">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputEmail1">Select Category</label>
                   <select name="category_id" id="category_id" class="form-control">
                    <option value="">select Category</option>
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                   </select>
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">Status </label> <br>
                    <input type="checkbox" name="status" >  checked=hidden & unchecked=visiable
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
