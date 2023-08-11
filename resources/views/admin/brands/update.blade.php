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
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Update Brand</h4>
            </div>
            <div class="col-6">
                <a href="{{ url('/admin/brand') }}" class="btn btn-danger" style="float: right">BACK</a>
                    {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" --}}
            </div>

        </div>
        <form  action="{{url('/admin/brand/update/'.$brand->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control p-input" name="name" value="{{$brand->name}}">
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control p-input" name="slug"value="{{$brand->slug}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputEmail1">Select Category</label>
                   <select name="category_id" id="category_id" class="form-control">
                    <option selected value="{{$brand->category->id}}" >{{$brand->category->name}}</option>
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                   </select>
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">Status </label> <br>
                    <input type="checkbox" name="status"  {{$brand->status == 1?'checked':''}} >  checked=hidden & unchecked=visiable
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
