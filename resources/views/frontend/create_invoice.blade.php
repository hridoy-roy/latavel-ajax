@extends('layouts.frontend.app')
@section('title', 'Create Bill page')
@push('frontend_css')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .avatar-upload .avatar-preview > div{
            border-radius: 0px !important;
            background-size: contain !important0;
        }
    </style>
@endpush
@section('frontend_content')
    <!-- banner section Start -->
    <section class="bill_banner_section">
        <div style="background-color: #FFB317;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="h2_title h3_title">Free Invoice Template</h2>
                        <p class="pt-2">Make beautiful invoices with one click!</p>
                        <p class="pt-2">Welcome to the original Invoice Generator, trusted by millions of people.
                            Invoice Generator
                            lets you quickly make invoices with our attractive invoice template straight from your web
                            browser, no sign up necessary. The invoices you make can be sent and paid online or
                            downloaded as a PDF.</p>
                        <p class="pt-2">Did we also mention that Invoice Generator lets you generate an unlimited number
                            of invoices?
                        </p>
                        <div class="pt-2 banner_footer">
                            <span class="px-4 py-2">OK, got it</span>
                            <a href="#" class="ps-4">Read the docs</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/img/banner/banner.png" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section End -->

    <!-- Invoice Section Start -->
    <section class="invoice_section">
        <div class="my-5">
            <form method="post" id="productForm" enctype="multipart/form-data">
                @csrf
            <div class="container p-4 " style="background-color: #F0F0F0;">
                <div class="row md-2 invoice_header_right">
                    <div class="col-md-12 text-center">
                        <h1>INVOICE</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="input-group">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="imageUpload" id="imageUpload" />
                                            <label for="imageUpload"><i class="bi bi-plus"></i></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div>
                                    <label class="form-label">Currency: </label>
                                    <span class="tk">&#2547;</span>
                                </div>
                                <div>
                                    <label class="form-label">Using Default Template</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label for="invoice_form"class="form-label">From</label>
                                <textarea name="invoice_form" id="invoice_form" rows="2" type="text" class="form-control"
                                    placeholder="Who is this invoice from? (required)"></textarea>
                                <div id="invoice_form_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row pt-1 pb-3">
                            <div class="col-md-8">
                                <label for="invoice_to" class="form-label">Bill to</label>
                                <textarea name="invoice_to" id="invoice_to" rows="2" type="text" class="form-control"
                                    placeholder="Who is this invoice to?(required)"></textarea>
                                <div id="invoice_to_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5" style="display: grid">
                        <div class="row">
                            <div class="col-sm-4 d-flex align-items-center">
                                <h6>INVOICE ID</h6>
                            </div>
                            <div class="col-sm-8 mb-2">
                                <div class="input-group">
                                    <div class="input-group-text">&#9839;</div>
                                    <input type="text" name="invoice_id" class="form-control" value="INVID-01" id="invoice_id" placeholder="INVOICE ID">
                                    <input type="hidden" id="id" name="id" value="">
                                    <div class="input-group-text">01</div>
                                    <div id="invoice_id_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="invoice_date" class="col-sm-4 col-form-label">Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="invoice_date" class="form-control" value="{{ date('Y-m-d'); }}" id="invoice_date">
                                <div id="invoice_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="invoice_payment_term" class="col-sm-4 col-form-label">Payment Terms</label>
                            <div class="col-sm-8">
                                <input type="text" name="invoice_payment_term" class="form-control" id="invoice_payment_term"  placeholder="Online/Bank/Cash Transaction">
                                <div id="invoice_payment_term_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="invoice_dou_date" class="col-sm-4 col-form-label">Due Date</label>
                            @php
                                $date = new DateTime(now());
                                $date->modify('+4 day');
                            @endphp 
                            <div class="col-sm-8">
                                <input type="date" name="invoice_dou_date" class="form-control" value="{{ $date->format('Y-m-d'); }}" id="invoice_dou_date">
                                <div id="invoice_dou_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="invoice_po_number" class="col-sm-4 col-form-label">PO Number</label>
                            <div class="col-sm-8">
                                <input type="text" name="invoice_po_number" class="form-control" id="invoice_po_number">
                                <div id="invoice_po_number_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive ">
                    <table class="table">
                        <thead style="background-color: #FFB317;">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item</th>
                            <th scope="col" style="width: 14%">Quantity</th>
                            <th scope="col" style="width: 10%">Rate</th>
                            <th scope="col" style="width: 10%">Amount</th>
                            <th scope="col" style="width: 5%">Action</th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">
                         
                        </tbody>
                    </table>
                </div>
                {{-- <form>
                   @csrf --}}
                    <div class="product row">
                        <div class="p-0 pe-1 pb-2 col-md-6">
                            <input type="text" name="produc_name" id="produc_name" class="form-control" placeholder="Description of service or product">
                            <div id="name_error" class="invalid-feedback"></div>
                        </div>
                        <div class="text-start p-0 pe-1 pb-2 col-md-2">
                            <div class="input-group">
                                <input type="text" name="produc_quantity" id="produc_quantity" class="form-control" placeholder="Quantity" onchange="ptotal()">
                                <div class="input-group-text">&#9839;</div>
                                <div id="quantity_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="text-center p-0 pe-1 pb-2 col-md-2">
                            <div class="input-group">
                                <input type="text" name="produc_rate" id="produc_rate" class="form-control" placeholder="Rate" onchange="ptotal()">
                                <div class="input-group-text">&#2547;</div>
                                <div id="rate_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class=" col-md-2 p-0 pe-1 pb-2">
                            <div class="ps-2 input-group text-center border rounded justify-content-between align-items-center ">
                                <span id="product_amount" class="fw-bolder"></span>
                            <div class="input-group-text ">&#2547;</div>
                            </div>
                        </div>
                    </div>
    
                    <div class="mt-4 ms-2">
                        <button type="button" class="py-2 px-4 btn add-field rounded" id="addButton" onclick="addData();total();"><i class="bi bi-plus"></i> add line</button>
                        <span id="product_clear" class="btn btn-danger" onclick="pclear()">
                            Clear Input
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                              </svg>
                        </span>
                    </div>
                {{-- </form> --}}
                <div class="row pt-4">
                    <div class="col-md-7">
                        <div>
                            <label for="invoice_notes" class="form-label p-2">Notes</label>
                        <textarea name="invoice_notes" id="invoice_notes" rows="3" class="form-control"
                            placeholder="Notes - any related information not already covered"></textarea>
                        <div id="invoice_notes_error" class="invalid-feedback"></div>
                        </div>
                        <div class="">
                            <label for="invoice_terms" class="form-label p-2 d-flex align-items-center">Terms</label>
                            <textarea name="invoice_terms" id="invoice_terms" rows="3" class="form-control"
                                placeholder="Terms and conditions, late fees, payment methods, delivery schedule"></textarea>
                            <div id="invoice_terms_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex flex-column justify-content-end pt-2 pe-4">
                        <div class="row">
                            <div class="col-4 d-flex align-items-center fw-bolder text-primary">Sub total</div>
                            <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                                <span class="p-2 fw-bolder text-primary" id="subtotal">0.00</span>
                                <div class="input-group-text">&#2547;</div>
                            </div>
                        </div>
                        <div class="row pt-2 ">
                            <div class="col-4 d-flex align-items-center">Tax</div>
                            <div class="col input-group p-0">
                                <input type="text" class="form-control" id="inputTax" onchange="total()">
                                <div class="input-group-text">&#8453;</div>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-end pt-2">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center fw-bolder text-success">Total</div>
                                <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                                    <span class="p-2 fw-bolder text-success" id="total">0.00</span>
                                    <div class="input-group-text">&#2547;</div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-4 d-flex align-items-center">Amount Paid</div>
                                <div class="col input-group p-0">
                                    <input type="text" class="form-control" id="inputPaid" onchange="total()">
                                    <div class="input-group-text">&#2547;</div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-4 d-flex align-items-center fw-bolder text-danger">Balance Due</div>
                                <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                                    <span class="p-2 fw-bolder text-danger" id="balanceDue">0.00</span>
                                    <div class="input-group-text">&#2547;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                    </div>
                    
                </div>
            </div>
            <div class="container p-0 pt-3">
                <button type="submit" class="btn send-invoice py-2 px-4">Complete Invoice</button>
                <a href="#" class="btn send-invoice py-2 px-4">Send Invoice</a>
                <a href="#" class="btn send-downlod py-2 px-4">Download Invoice</a>
            </div>
        </form>
        </div>
    </section>
    <!-- Invoice Section End -->

    <!-- Invoice Template Start -->
    <section class="invoice_template">
        <div>
            <div class="container my-3">
                <div class="text-center pb-5">
                    <h2 class="h2_title">Choose Your Invoice Template</h2>
                    <p class="fs-sm fw-bolder">Start creating your professional bill</p>
                </div>
                <div class="row text-center">
                    <div class="col-md-4"><a href="#"> <img src="{{ asset('assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a>
                    </div>
                    <div class="col-md-4"><a href="#"> <img src="{{ asset('assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a>
                    </div>
                    <div class="col-md-4"><a href="#"> <img src="{{ asset('assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a>
                    </div>
                    <div class="col-md-4"><a href="#"> <img src="{{ asset('assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a>
                    </div>
                    <div class="col-md-4"><a href="#"> <img src="{{ asset('assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a>
                    </div>
                    <div class="col-md-4"><a href="#"> <img src="{{ asset('assets/frontend/img/demo/1.jpg') }}" alt="" height="360" srcset=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Invoice Template End -->
@endsection
@push('frontend_js')
<script>
    // <!-- Image Upload Start-->
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            readURL(this);
        });
        // <!-- Image Upload End-->
</script>
@endpush