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
            <form id="productForm">
                @csrf
            <div class="container p-4 " style="background-color: #F0F0F0;">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="input-group">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
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
                                    <span class="tk">TK</span>
                                </div>
                                <div>
                                    <label class="form-label">Using Default Template</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <textarea name="" id="" rows="2" type="text" class="form-control"
                                    placeholder="Who is this invoice from? (required)"></textarea>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Bill to</label>
                                <input type="text" name="bill_to" class="form-control" id="inputCity"
                                    placeholder="Who is this invoice to?(required)">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity"class="form-label">Ship to</label>
                                <input type="text" name="ship_to" class="form-control" id="inputCity" placeholder="(Optional)">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row md-2">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8 text-center">
                                <h1>INVOICE</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8 mb-2">
                                <div class="input-group">
                                    <div class="input-group-text">#</div>
                                    <input type="text" name="Invoice" class="form-control" id="invoiceid"
                                        placeholder="Username">
                                        <input type="hidden" id="id" name="id" value="">
                                    <div class="input-group-text">01</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="colFormLabel" class="col-sm-4 col-form-label">Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="current_date" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="colFormLabel" class="col-sm-4 col-form-label">Payment Terms</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="colFormLabel" class="col-sm-4 col-form-label">Due Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="colFormLabel" class="col-sm-4 col-form-label">PO Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive ">
                    <table class="table">
                        <thead style="background-color: #FFB317;">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 55%">Item</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">
                         
                        </tbody>
                    </table>
                </div>
                <form id="productForm">
                   @csrf
                    <div class="product">
                        <div class="p-1">
                            <input type="text" name="produc_name" id="produc_name" class="form-control" placeholder="Description of service or product">
                            <div id="name_error" class="invalid-feedback">
                                
                            </div>
                        </div>
                        <div class="text-start p-1">
                            <input type="text" name="produc_quantity" id="produc_quantity" class="form-control" >
                            <div id="quantity_error" class="invalid-feedback">
                                
                            </div>
                        </div>
                        <div class="text-center p-1">
                            <input type="text" name="produc_rate" id="produc_rate" class="form-control">
                            <div id="rate_error" class="invalid-feedback">
                                
                            </div>
                        </div>

                    </div>
    
                    <div class="mt-4 ms-2">
                        <button type="button" class="py-2 px-4 btn add-field rounded" id="addButton" onclick="addData();total();"><i class="bi bi-plus"></i> add line</button>
                    </div>
                </form>
                <div class="row pt-4">
                    <div class="col-md-7">
                        <label for="inputCity" class="form-label p-2">Notes</label>
                        <textarea name="" id="" rows="3" class="form-control"
                            placeholder="Notes - any related information not already covered"></textarea>
                    </div>
                    <div class="col-md-5 d-flex flex-column justify-content-end ps-4 pt-4">
                        <div class="row">
                            <div class="col-4">Sub total</div>
                            <div class="col-8 text-end" id="subtotal">0.00</div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-4">Tax</div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="inputTax" onchange="total()">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <label for="inputCity" class="form-label p-2">Terms</label>
                        <textarea name="" id="" rows="3" class="form-control"
                            placeholder="Terms and conditions, late fees, payment methods, delivery schedule"></textarea>
                    </div>
                    <div class="col-md-5 d-flex flex-column justify-content-end ps-4 pt-4">
                        <div class="row">
                            <div class="col-4">Total</div>
                            <div class="col-8 text-end" id="total">0.00</div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-4 d-flex align-items-center">Amount Paid</div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="inputPaid" onchange="total()">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-4">Balance Due</div>
                            <div class="col-8 text-end" id="balanceDue">0.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container p-0 pt-3">
                <button type="submit" class="btn send-invoice py-2 px-4">Send Invoice</button>
                <button type="submit" class="btn send-downlod py-2 px-4">Download Invoice</button>
                <button type="submit" class="btn send-downlod py-2 px-4">My Invoices</button>
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