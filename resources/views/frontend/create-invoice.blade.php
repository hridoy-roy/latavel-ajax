@extends('layouts.frontend.app')
@section('title', 'Create Bill page')
@push('frontend_css')
<style>
  .avatar-upload .avatar-preview>div {
    border-radius: 0px !important;
    background-size: contain !important0;
  }

</style>
@endpush
@section('frontend_content')

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>
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
    <form method="post" id="invoiceForm" enctype="multipart/form-data">
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
                      <input type='file' name="invoice_logo" id="imageUpload" />
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
                <label for="invoice_form" class="form-label">From</label>
                <textarea name="invoice_form" id="invoice_form" rows="2" type="text" class="form-control" placeholder="Who is this invoice from? (required)"></textarea>
                <div id="invoice_form_error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="row pt-1 pb-3">
              <div class="col-md-8">
                <label for="invoice_to" class="form-label">Bill to</label>
                <textarea name="invoice_to" id="invoice_to" rows="2" type="text" class="form-control" placeholder="Who is this invoice to?(required)"></textarea>
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
                  <input type="text" name="invoice_id" class="form-control" value="INVID01" id="invoice_id" placeholder="INVOICE ID">
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
                <input type="text" name="invoice_payment_term" class="form-control" id="invoice_payment_term" placeholder="Online/Bank/Cash Transaction">
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

        <div class="product row">
          <div class="p-0 pe-1 pb-2 col-md-6">
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Description of service or product">
            <div id="name_error" class="invalid-feedback"></div>
          </div>
          <div class="text-start p-0 pe-1 pb-2 col-md-2">
            <div class="input-group">
              <input type="text" name="product_quantity" id="product_quantity" class="form-control" placeholder="Quantity" onchange="ptotal()">
              <div class="input-group-text">&#9839;</div>
              <div id="quantity_error" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="text-start p-0 pe-1 pb-2 col-md-2">
            <div class="input-group">
              <input type="text" name="product_rate" id="product_rate" class="form-control" placeholder="Rate" onchange="ptotal()">
              <div class="input-group-text">&#2547;</div>
              <div id="product_rate_error" class="invalid-feedback"></div>
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
          <button type="button" class="py-2 px-4 btn add-field rounded" onClick="addData();" id="addButton"><i class="bi bi-plus"></i> add line</button>
          <span id="product_clear" class="btn btn-danger" onclick="pclear()">
            Clear Input
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
              <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </span>
        </div>
        {{-- </form> --}}
        <div class="row pt-4">
          <div class="col-md-7">
            <div>
              <label for="invoice_notes" class="form-label p-2">Notes</label>
              <textarea name="invoice_notes" id="invoice_notes" rows="3" class="form-control" placeholder="Notes - any related information not already covered"></textarea>
              <div id="invoice_notes_error" class="invalid-feedback"></div>
            </div>
            <div class="">
              <label for="invoice_terms" class="form-label p-2 d-flex align-items-center">Terms</label>
              <textarea name="invoice_terms" id="invoice_terms" rows="3" class="form-control" placeholder="Terms and conditions, late fees, payment methods, delivery schedule"></textarea>
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
                <input type="text" name="invoice_tax" class="form-control" value="0" id="invoice_tax" onchange="total()">
                <div class="input-group-text">&#8453;</div>
                <div id="invoice_tax_error" class="invalid-feedback"></div>
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
                  <input type="text" class="form-control" name="invoice_amu_paid" value="0" id="invoice_amu_paid" onchange="total()">
                  <div class="input-group-text">&#2547;</div>
                  <div id="invoice_amu_paid_error" class="invalid-feedback"></div>
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
        <a href="#" class="btn send-invoice py-2 px-4" onclick="completeInvoice()">Send Invoice</a>
        <a href="#" id="downlodeInvoice" class="btn send-downlod py-2 px-4">Download Invoice</a>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
const okButton = Swal.mixin({
  toast: false,
  position: 'cnter',
  showConfirmButton: true,
  timerProgressBar: true,
})

function completeInvoice(){
  var complete = 'complete';
 
  // console.log([complete,total]);
}



      // add new Product ajax request
      function addData(){

        // Invoice data
        var id = $('#id').val();
        // Product data
        var product_name = $('#product_name').val();
        var product_quantity = $('#product_quantity').val();
        var product_rate = $('#product_rate').val();
        $.ajax({
          url: '/product/store',
          method: 'post',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {product_name:product_name, product_quantity:product_quantity, product_rate:product_rate,id:id},
          dataType: 'json',
          success: function(response) {
              $('#id').val(response[1]);
              clearData();
              allData();
          },
          error: function (error) {
            // console.log(error);
              if (error.responseJSON.errors.product_name != null)
              {
                  $('#product_name').addClass("is-invalid");
                  $('#name_error').text(error.responseJSON.errors.product_name);
              } else
              {
                  $('#product_name').removeClass("is-invalid");
                  $('#product_name').addClass("is-valid");
              }

              if (error.responseJSON.errors.product_quantity != null)
              {
                  $('#product_quantity').addClass("is-invalid");
                  $('#quantity_error').text(error.responseJSON.errors.product_quantity);
              } else
              {
                  $('#product_quantity').removeClass("is-invalid");
                  $('#product_quantity').addClass("is-valid");
              }
              
              if (error.responseJSON.errors.product_rate != null)
              {
                  $('#product_rate').addClass("is-invalid");
                  $('#product_rate_error').text(error.responseJSON.errors.product_rate);
              } else
              {
                  $('#product_rate').removeClass("is-invalid");
                  $('#product_rate').addClass("is-valid");
              }
              
          }
        });
      }

      $("#invoiceForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);

        $.ajax({
          url: '/invoices/store',
          method: 'post',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            console.log(response);
            if (response['message'] != null) {
              okButton.fire({
                icon: 'error',
                title: response['message'],
              })
            }else{
              $("#downlodeInvoice").attr("href", "invoice/download/"+response);
              button = 
              Toast.fire({
                icon: 'success',
                title: 'Invoice Created',
              })
            }
            
          },
          error: function(error) {
            okButton.fire({
                icon: 'error',
                title: 'Fill UP Invoice Form Properly',
              })
            // Invoice Validation 
            if (error.responseJSON.errors.invoice_form != null)
              {
                  $('#invoice_form').addClass("is-invalid");
                  $('#invoice_form_error').text(error.responseJSON.errors.invoice_form);
              } else
              {
                  $('#invoice_form').removeClass("is-invalid");
                  $('#invoice_form').addClass("is-valid");
              }
              
              if (error.responseJSON.errors.invoice_to != null)
              {
                  $('#invoice_to').addClass("is-invalid");
                  $('#invoice_to_error').text(error.responseJSON.errors.invoice_to);
              } else
              {
                  $('#invoice_to').removeClass("is-invalid");
                  $('#invoice_to').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_id != null)
              {
                  $('#invoice_id').addClass("is-invalid");
                  $('#invoice_id_error').text(error.responseJSON.errors.invoice_id);
              } else
              {
                  $('#invoice_id').removeClass("is-invalid");
                  $('#invoice_id').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_date != null)
              {
                  $('#invoice_date').addClass("is-invalid");
                  $('#invoice_date_error').text(error.responseJSON.errors.invoice_date);
              } else
              {
                  $('#invoice_date').removeClass("is-invalid");
                  $('#invoice_date').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_dou_date != null)
              {
                  $('#invoice_dou_date').addClass("is-invalid");
                  $('#invoice_dou_date_error').text(error.responseJSON.errors.invoice_dou_date);
              } else
              {
                  $('#invoice_dou_date').removeClass("is-invalid");
                  $('#invoice_dou_date').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_tax != null)
              {
                  $('#invoice_tax').addClass("is-invalid");
                  $('#invoice_tax_error').text(error.responseJSON.errors.invoice_tax);
              } else
              {
                  $('#invoice_tax').removeClass("is-invalid");
                  $('#invoice_tax').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_amu_paid != null)
              {
                  $('#invoice_amu_paid').addClass("is-invalid");
                  $('#invoice_amu_paid_error').text(error.responseJSON.errors.invoice_amu_paid);
              } else
              {
                  $('#invoice_amu_paid').removeClass("is-invalid");
                  $('#invoice_amu_paid').addClass("is-valid");
              }
          }
        });
      });

      function allData() {
        var id = $('#id').val();
        // console.log(id);

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: { id: id },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/products/create',
            success: function (responce) {
                var data = '';
                var totalamount = 0;
                $.each(responce, function (key, value) {
                    totalamount = totalamount + value.product_amount
                    data = data + "<tr>"
                    data = data + "<th scope='row'>" + ++key + "</th>"
                    data = data + "<td>" + value.product_name + "</td>"
                    data = data + "<td>" + value.product_quantity + "</td>"
                    data = data + "<td>" + value.product_rate + "</td>"
                    data = data + "<td>" + value.product_amount + "</td>"
                    data = data + "<td class='text-center'>"
                    data = data + "<button type='button' onClick='deleteData(" + value.id + ")' class='btn btn-sm btn-danger fw-bolder'><i class='bi bi-trash'></i></button>"
                    data = data + "</td>"
                    data = data + "</tr>"
                })
                $('#tableBody').html(data);
                total(totalamount);

            }
        })
      }



      function clearData() {
        $('#product_name').val('');
        $('#product_quantity').val('');
        $('#product_rate').val('');

        $('#product_name').removeClass("is-valid");
        $('#product_quantity').removeClass("is-valid");
        $('#product_rate').removeClass("is-valid");
        $('#invoice_form').removeClass("is-valid");
        $('#invoice_to').removeClass("is-valid");
        $('#invoice_id').removeClass("is-valid");
        $('#invoice_date').removeClass("is-valid");
        $('#invoice_dou_date').removeClass("is-valid");
        $('#invoice_tax').removeClass("is-valid");
        $('#invoice_amu_paid').removeClass("is-valid");

        $('#product_name').removeClass("is-invalid");
        $('#product_quantity').removeClass("is-invalid");
        $('#product_rate').removeClass("is-invalid");
        $('#invoice_form').removeClass("is-invalid");
        $('#invoice_to').removeClass("is-invalid");
        $('#invoice_id').removeClass("is-invalid");
        $('#invoice_date').removeClass("is-invalid");
        $('#invoice_dou_date').removeClass("is-invalid");
        $('#invoice_tax').removeClass("is-invalid");
        $('#invoice_amu_paid').removeClass("is-invalid");

    }


    function ptotal() {
        var product_quantity = $('#product_quantity').val();
        var product_rate = $('#product_rate').val();

        var ptotal = product_quantity * product_rate;

        $('#product_amount').text(ptotal);
    }

    function pclear() {
        $('#product_name').val("");
        $('#product_quantity').val("");
        $('#product_rate').val("");
        $('#product_amount').text("");
    }

    // Sub total 
    function total(itemAmount) {
        $('#subtotal').text(itemAmount);
    }

    // Tax 
    function total(itemAmount) {
        $('#subtotal').text(itemAmount);
        var itemAmount = $('#subtotal').text() * 1;
        var tax = $('#invoice_tax').val() * 1;

        var persent = (itemAmount * tax) / 100

        // console.log(persent);

        var total = itemAmount + persent;
        $('#total').text(total);
        var paid = $('#invoice_amu_paid').val() * 1;
        var balanceDue = total - paid;
        $('#balanceDue').text(balanceDue);
    }


    function deleteData(id) {

      var id = id;

      $.ajax({
          type: "delete",
          dataType: "json",
          data: { id: id },
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: "/products/delete/" + id,
          success: function (data) {
            $('#product_amount').text("");
              allData();
          },
          error: function (error) {
          }
      });
      }




  // <!-- Image Upload Start-->
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
        $('#imagePreview').hide();
        $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
    readURL(this);
  });
  // <!-- Image Upload End-->

</script>
@endpush
