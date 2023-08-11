@extends('layout.frontend.main')

@section('title', 'Home')
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .bannerContaner{
        margin: 0%;
        padding: 0%;
        width: 100vw;
        margin-top: -5%;
        margin-left: -4.4%;
    }
    .Contaner{
        margin: 0%;
        padding: 0%;
        width: 100vw;
        margin-left: -4.4%;
    }
</style>
@section('content')
<div class="bannerContaner">
    @include('frontend.home.banner')
</div>
<div class="Contaner">
    @include('frontend.home.category')
</div>

@endsection
