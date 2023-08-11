@extends('layout.admin.main')

@section('content')

@error('name')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('code')
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
                <h4 class="card-title">Update Color</h4>
            </div>
            <div class="col-6">
                <a href="{{ url('/admin/color') }}" class="btn btn-danger" style="float: right">BACK</a>

            </div>

        </div>
        <form  action="{{url('/admin/color/update/'.$color->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control p-input" name="name" value="{{$color->name}}">
                </div>
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">cole</label>
                    <input type="text" class="form-control p-input" name="code" value="{{$color->code}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-5">
                    <label for="exampleInputPassword1">Status </label> <br>
                    <input type="checkbox" name="status" {{$color->status == 1?'checked':''}} >  checked=hidden & unchecked=visiable
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
