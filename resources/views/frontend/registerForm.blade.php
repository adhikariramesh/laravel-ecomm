@extends('layout.frontend.main')

@section('title', 'register')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error: </strong> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @error('name')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error: </strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('email')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error: </strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('password')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error: </strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('password_confirm')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error: </strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Registration Form</h4>
                        <form class="forms-sample" action="{{ url('/register') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">User Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail2"
                                        placeholder="User Name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="exampleInputUsername2"
                                        placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword2"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re
                                    Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_confirm" class="form-control"
                                        id="exampleInputConfirmPassword2" placeholder="Conform Password">
                                </div>
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-check-input">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ url('/signin') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
