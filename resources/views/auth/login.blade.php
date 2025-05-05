@extends('auth.Log',['title' => 'Login', 'page_heading' => 'stock opname'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 mx-auto login-desk">
            <div class="row">

                <div class="col-md-5 loginform">
                    <div class="log-txt row no-margin">
                        <h2>STOCK OPNAME <br>
                            Login </h2>
                        <p>aplikasi ini digunakan untuk mengontrol persedian barang habis pakai di masing-masing bidang</p>
                        <button class="btn btn-warning">Login Account</button>
                    </div>

                    <div class="login-det">
                        <img src="assets/images/art-direction.png" alt="">
                    </div>
                </div>
                <div class="col-md-7 detail-box">

                    <div class="detailsh col-lg-7 col-md-10 col-sm-7 col-11 mx-auto">
                        <img class="logo" src="{{asset('login/images/logo.webp')}}" alt="">
                        <form class="login-form" method="post" action="/">
                            @csrf
                            <div class="row form-ro no-margin">
                                <input type="email" placeholder="Email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row form-ro no-margin">
                                <input type="password" placeholder="Password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row form-ro fgbh">

                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    {{-- <button type="submit" class="btn btn-sm btn-primary">Sign In</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection