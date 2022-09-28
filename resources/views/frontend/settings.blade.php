@extends('layouts.frontend.app')
@section('title', 'Setting')
@push('frontend_css')
    
@endpush
@section('frontend_content')

    <!-- Sub Nav Start -->
    <section class="sub_nav py-4 border-bottom">
        <div class="">
            <div class="container">
                <div class="nav">
                    <p class="m-0">You are here : <span><a href="#">Home</a> &#8921;</span> <span
                            style="color: #FFB317 !important;">User</span></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Sub Nav Start -->
    <!-- Sign in form Start -->
    <section class="dashboard">
        <div>
            <div class="container my-5">
                <div class="text-center pb-5">
                    <h2 class="h2_title mb-4">Welcome back to Billto</h2>
                    <div class="dashboard_link">
                        <a class="" href="#">Invoice</a>
                        <a class="" href="#">Tax Invoice</a>
                        <a class="" href="#">Proforma Invoice</a>
                        <a class="" href="#">Receipt</a>
                        <a class="" href="#">Sales Receipt</a>
                        <a class="" href="#">Cash Receipt</a>
                        <a class="" href="#">Quote</a>
                        <a class="" href="#">Estimate Credit Memo</a>
                        <a class="" href="#">Credit Note</a>
                        <a class="" href="#">Purchase Order</a>
                        <a class="" href="#">Delivery Note</a>
                    </div>
                </div>
                <div class="row dashboard_menu">
                    <div class="col-md-12 p-0">
                        <ul class="nav nav-tabs">
                            <li class="nav-item pe-1">
                                <a class="nav-link" aria-current="page" href="#">
                                    <i class="bi bi-layout-text-sidebar-reverse"></i>
                                    My Invoices</a>
                            </li>
                            <li class="nav-item px-1">
                                <a class="nav-link" aria-current="page" href="#">
                                    <i class="bi bi-person-circle"></i>
                                    My Customers</a>
                            </li>
                            <li class="nav-item px-1">
                                <a class="nav-link" aria-current="page" href="#">
                                    <i class="bi bi-clipboard-data"></i>
                                    My Reports</a>
                            </li>
                            <li class="nav-item px-1 ">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <i class="bi bi-gear-fill"></i>
                                    My Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 p-3 p-md-5 border-start border-end border-bottom"
                        style="background: #F0F0F0;">
                        <ul class="nav nav-tabs pt-4">
                            <li class="nav-item p-0">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <i class="bi bi-person-circle"></i>
                                    My Name and Email
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" aria-current="page" href="{{ route('default.setting') }}">
                                    <i class="bi bi-gear-wide-connected"></i>
                                    Default Settigns
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" aria-current="page" href="#">
                                    <i class="bi bi-shield-lock-fill"></i>
                                    Change Password
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" aria-current="page" href="#">
                                    <i class="bi bi-envelope-fill"></i>
                                    Email Roport
                                </a>
                            </li>
                        </ul>
                        <div class="px-2 py-3 py-md-5 border-start border-end border-bottom rounded setting"
                            style="background: #fff;">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-8 my-0 mx-auto">
                                        <label for="name" class="form-label fw-bolder ps-5">Profile Photo</label>
                                    </div>
                                    <div class="col-md-8 my-0 mx-auto text-center">
                                        <div class="input-group">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><i class="bi bi-plus"></i></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url();">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 my-0 mx-auto">
                                            <label for="name" class="form-label fw-bolder">My Name</label>
                                            <input name="my_name" id="name" type="text" class="form-control is-invalid"
                                                placeholder="Business Name & Billing Address">
                                            <div class="invalid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 my-0 mx-auto">
                                            <label for="validationCustom02" class="form-label fw-bolder">E-Mail</label>
                                            <input name="email" id="validationCustom02" type="text"
                                                class="form-control is-valid"
                                                placeholder="Business Name & Billing Address" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 my-0 mx-auto">
                                            <label for="validationCustom01" class="form-label fw-bolder">Business Name &
                                                Billing
                                                Address</label>
                                            <textarea name="business_name" id="validationCustom01" rows="3" type="text"
                                                class="form-control" placeholder="Business Name & Billing Address"
                                                required></textarea>

                                        </div>
                                    </div>
                                    <div class="row pt-4">
                                        <div class="col-md-8 my-0 mx-auto">
                                            <button type="submit" class="btn billto_btn py-1 px-3">Save</button>
                                            <button type="reset" class="btn">or Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <form action="" method="post">
                                        <input type="text" hidden>
                                        <button type="submit" class="btn">Account Remove</button>
                                    </form>
                                </div>
                            </div>
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