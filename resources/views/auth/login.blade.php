@extends('layouts.frontend.app')
@section('title', 'Login Page')
@push('frontend_css')
    
@endpush
@section('frontend_content')
    <!-- Sub Nav Start -->
    <section class="sub_nav py-4 border-bottom">
        <div class="">
            <div class="container">
                <div class="nav">
                    <p class="m-0">You are here : <span><a href="#">Home</a> &#8921;</span> <span
                            style="color: #FFB317 !important;">Sign in</span></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Sub Nav Start -->

    <!-- Sign in form Start -->
    <section class="form_sign_in">
        <div>
            <div class="container my-5">
                <div class="text-center">
                    <h2 class="h2_title mb-4">Wellcome back to Billto</h2>
                    <p class="form_title pb-4">Sign in</p>
                </div>
                <div class="row">
                    <div class="col-md-6 my-0 mx-auto">
                        <div class="border rounded" style="background: #F0F0F0;">
                            <form method="POST" action="{{ route('login') }}" autocomplete="on">
                                @csrf
                                <div class="p-5">
                                    @if ($errors->any())
                                        <div>
                                            <div class="fs-5 text-danger">
                                                Whoops! Something went wrong.
                                            </div>
        
                                            <ul class="mt-3 text-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- Email Address -->
                                    <div class="form-group pb-3">
                                        <label for="email" class="pb-2 fw-bolder">Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="py-2 form-control @error('email') is-invalid @enderror" required autofocus id="email"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <!-- Password -->
                                    <div class="form-group pb-3">
                                        <label for="password" class="pb-2 fw-bolder">Password</label>
                                        <input type="password" name="password" required class="py-2 form-control @error('email') is-invalid @enderror" id="password"
                                            placeholder="Password" autocomplete="current-password">
                                    </div>
                                    <!-- Remember Me -->
                                    <div class="mt-3 form-check">
                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                        <label for="remember_me" class="form-check-label text-sm"> Remember me </label>
                                    </div>
                                    
                                    <p class="my-3">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="fw-bolder reset">Forgot your password?</a>
                                        @endif
                                    </p>
                                    <button type="submit"
                                        class="form_btn my-4 py-2 btn btn-dark border-0 w-100 fw-bolder"
                                        style="background: #FFB317;">Continue</button>
                                    <div class="mb-4 mt-3"
                                        style="width: 100%; height: 20px; border-bottom: 2px solid #CCCCCC; text-align: center">
                                        <span style="font-size: 25px; background-color: #F3F5F6; padding: 0 10px;">
                                            or
                                        </span>
                                    </div>
                                    <div class="my-3 already_billto">
                                        <p class="fw-bold">Do not have an account? <a href="{{ route('register') }}">Sign up
                                                here</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in form End -->


@endsection
@push('frontend_js')
    
@endpush