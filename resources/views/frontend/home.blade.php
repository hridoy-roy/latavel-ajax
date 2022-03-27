@extends('layouts.frontend.app')
@section('title', 'Home page')
@push('frontend_css')
    
@endpush
@section('frontend_content')
<!-- Banner Start -->
  <section class="banner_section">
    <div style="background: url({{ asset('public/assets/frontend/img/banner/banner-back.jpg') }}); opacity: .8;">
      <div class="container py-5">
        <div class="row align-items-center">
          <div class="col-md-6">
            <a href="{{ route('create') }}" class="btn billto_btn">Create Bill</a>
          </div>
          <div class="col-md-6 text-end">
            <img src="{{ asset('public/assets/frontend/img/banner/banner.png') }}" alt="" srcset="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner End -->

  <!-- Create Start -->
  <section class="create_section">
    <div>
      <div class="container py-5">
        <div class="row">
          <div class="col-md-4">
            <span class="border">
              <i class="bi bi-file-earmark-bar-graph-fill"></i>
            </span>
            <h2 class="mt-4 h2_title">Create Bill</h2>
            <p>Choose from 20 templates</p>
          </div>
          <div class="col-md-4">
            <span class="border">
              <i class="bi bi-file-earmark-pdf-fill"></i>
            </span>
            <h2 class="mt-4 h2_title">Send PDF</h2>
            <p>Email or print your invoice</br>to send to your client</p>
          </div>
          <div class="col-md-4">
            <span class="border">
              <i class="bi bi-credit-card-2-back-fill"></i>
            </span>
            <h2 class="mt-4 h2_title">Get Paid</h2>
            <p>Receive payment in</br>accounts by Card or Paypal</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Create End -->

  <!-- Invoice Template Start -->
  <section class="invoice_template">
  {{-- @php
    $pad = "4545.45%";
    $precent = substr($pad,-1);
    $paid = substr($pad,0,-1);
    dd([$precent,$paid]);
  @endphp --}}
    <div>
      <div class="container my-3">
        <div class="text-center pb-5">
          <h2 class="h2_title">Choose Your Invoice Template</h2>
          <p class="fs-sm fw-bolder">Start creating your professional bill</p>
        </div>
        <div class="row text-center">
          <div class="col-md-4"><a href="#"> <img src="{{ asset('public/assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a></div>
          <div class="col-md-4"><a href="#"> <img src="{{ asset('public/assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a></div>
          <div class="col-md-4"><a href="#"> <img src="{{ asset('public/assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a></div>
          <div class="col-md-4"><a href="#"> <img src="{{ asset('public/assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a></div>
          <div class="col-md-4"><a href="#"> <img src="{{ asset('public/assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a></div>
          <div class="col-md-4"><a href="#"> <img src="{{ asset('public/assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a></div>
        </div>
      </div>
    </div>
  </section>
  <!-- Invoice Template End -->
@endsection
@push('frontend_js')
    
@endpush