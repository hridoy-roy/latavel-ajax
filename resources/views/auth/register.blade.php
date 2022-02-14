@extends('layouts.frontend.app')
@section('title', 'Home page')
@push('frontend_css')
    
@endpush
@section('frontend_content')
    <!-- Sub Nav Start -->
    <section class="sub_nav py-4 border-bottom">
        <div class="">
            <div class="container">
                <div class="nav">
                    <p class="m-0">You are here : <span><a href="#">Home</a> &#8921;</span> <span
                            style="color: #FFB317 !important;">Sign up</span></p>
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
                    <h2 class="h2_title mb-4">Wellcome to Billto</h2>
                    <p class="form_title pb-4">Sign up</p>
                </div>
                <div class="row">
                    <div class="col-md-6 my-0 mx-auto">
                        <div class="border rounded" style="background: #F0F0F0;">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="p-5">
                                    <!-- Name -->
                                    <div class="form-group pb-3">
                                        <label for="name" class="pb-2 fw-bolder">Full Name</label>
                                        <input id="name" type="text" class="py-2 form-control @error('name')  is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Full Name" required autofocus >
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Email Address -->
                                    <div class="form-group pb-3">
                                        <label for="email" class="pb-2 fw-bolder">Email address</label>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="py-2 form-control @error('email')  is-invalid @enderror" placeholder="Enter email" required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Password -->
                                    <div class="form-group pb-3">
                                        <label for="password" class="pb-2 fw-bolder">Password</label>
                                        <input id="password" type="password" name="password" class="py-2 form-control @error('password')  is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Confirm Password -->
                                    <div class="form-group pb-3">
                                        <label for="password_confirmation" class="pb-2 fw-bolder">Confirm Password</label>
                                        <input id="password_confirmation" type="password" name="password_confirmation" class="py-2 form-control" placeholder="Confirm Password" required >
                                    </div>
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
                                        <p class="fw-bold">Already on Billto? <a href="{{ route('login') }}">Sign in here</a></p>
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