@extends('layouts.frontend.app')
@section('title', 'Login Page')
@push('frontend_css')
<style>
@import url("//fonts.googleapis.com/css?family=Roboto");
*, *::before, *::after {
  box-sizing: border-box; }


.block-wrap {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  height: 100%; }
  .block-wrap > div {
    width: 100%;
    text-align: center; }

.btn-google, .btn-fb {
  display: inline-block;
  border-radius: 1px;
  text-decoration: none;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
  transition: background-color .218s, border-color .218s ,box-shadow .218s; }
  .btn-google .google-content, .btn-google .fb-content, .btn-fb .google-content, .btn-fb .fb-content {
    display: flex;
    align-items: center;
    width: 300px;
    height: 50px; }
    .btn-google .google-content .logo, .btn-google .fb-content .logo, .btn-fb .google-content .logo, .btn-fb .fb-content .logo {
      padding: 15px;
      height: inherit; }
    .btn-google .google-content svg, .btn-google .fb-content svg, .btn-fb .google-content svg, .btn-fb .fb-content svg {
      width: 18px;
      height: 18px; }
    .btn-google .google-content p, .btn-google .fb-content p, .btn-fb .google-content p, .btn-fb .fb-content p {
      width: 100%;
      line-height: 1;
      letter-spacing: .21px;
      text-align: center;
      font-weight: 500;
      font-family: 'Roboto', sans-serif; }

.btn-google {
  background: #FFF; }
  .btn-google:hover {
    box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3); }
  .btn-google:active {
    background-color: #eee; }
  .btn-google .google-content p {
    color: #757575; }

.btn-fb {
  padding-top: 1.5px;
  background: #4267b2;
  background-color: #3b5998; }
  .btn-fb:hover {
    box-shadow: 0 0 3px 3px rgba(59, 89, 152, 0.3); }
  .btn-fb .fb-content p {
    color: rgba(255, 255, 255, 0.87); }

.btn-gh {
  padding-top: 1.5px;
  background: #333333 !important;
  background-color: #333333 !important; }
  .btn-gh:hover {
    box-shadow: 0 0 3px 3px rgba(59, 89, 152, 0.3); }
  .btn-gh  p {
    color: rgba(255, 255, 255, 0.87); }
    .btn-gh  i{
        color: #fff !important;
    }

</style>
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
                                    <div class="mb-4 mt-3"
                                        style="width: 100%; height: 20px; border-bottom: 2px solid #CCCCCC; text-align: center">
                                        <span style="font-size: 25px; background-color: #F3F5F6; padding: 0 10px;">
                                            or
                                        </span>
                                    </div>
                                    <div class="block-wrap">

                                        <!-- google	 -->
                                        <div class="mb-2">
                                            <a class="btn-google" href="/auth/google/redirect">
                                                <div class="google-content">
                                                    <div class="logo">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48">
                                                        <defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/>
                                                    </svg>
                                                    </div>
                                                    <p>Sign in with Google</p>
                                                </div>
                                            </a>
                                        </div>
                                    
                                        <!-- facebook	 -->
                                        <div class="mb-2">
                                            <a class="btn-fb" href="/auth/facebook/redirect">
                                                <div class="fb-content">
                                                    <div class="logo">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" version="1">
                                            <path fill="#FFFFFF" d="M32 30a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v28z"/>
                                            <path fill="#4267b2" d="M22 32V20h4l1-5h-5v-2c0-2 1.002-3 3-3h2V5h-4c-3.675 0-6 2.881-6 7v3h-4v5h4v12h5z"/>
                                          </svg>
                                                    </div>
                                                    <p>Sign in with Facebook</p>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- GitHub	 -->
                                        <div>
                                            <a class="btn-fb btn-gh " href="/auth/github/redirect">
                                                <div class="fb-content">
                                                    <div class="logo">
                                                        <i class="bi bi-github"></i>
                                                    </div>
                                                    <p>Sign in with GitHub</p>
                                                </div>
                                            </a>
                                        </div>
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