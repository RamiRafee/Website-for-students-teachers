@extends('home.index')
@section('title','User')
@section('header')
<div class="container px-lg-5">
    <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
        <div class="m-4 m-lg-5">
            <h1 class="display-5 fw-bold">A warm welcome For The User! </h1>
            @guest
            <p class="fs-4">Want To LogIN?</p>
            <a class="btn btn-primary btn-lg" href="{{route('auth.login')}}">LogIn</a>
            @endguest
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container px-lg-5">
    <!-- Page Features-->
    <div class="row gx-lg-5">
        <div class="col-lg-6 col-xxl-4 mb-5">
            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
                    <h2 class="fs-4 fw-bold">Fresh new layout</h2>
                    <p class="mb-0"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-5">
            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-cloud-download"></i></div>
                    <h2 class="fs-4 fw-bold">Free to download</h2>
                    <p class="mb-0"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-5">
            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-card-heading"></i></div>
                    <h2 class="fs-4 fw-bold">Jumbotron hero header</h2>
                    <p class="mb-0"></p>
                </div>
            </div>
        </div>
        
        
       
    </div>
</div>
@endsection
