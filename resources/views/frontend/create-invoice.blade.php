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
                <div class="d-flex ">
                  <label class="form-label pe-2 pt-1">Currency: </label>
                  <select class="tk w-50 fw-bolder form-select form-select-sm" name="currency" id="currencyList" onchange="currency1()">
                    <option value="USD" selected="selected" label="US dollar">USD</option>
                    <option value="EUR" label="Euro">EUR</option>
                    <option value="JPY" label="Japanese yen">JPY</option>
                    <option value="GBP" label="Pound sterling">GBP</option>
                    <option disabled>──────────</option>
                    <option value="AED" label="United Arab Emirates dirham">AED</option>
                    <option value="AFN" label="Afghan afghani">AFN</option>
                    <option value="ALL" label="Albanian lek">ALL</option>
                    <option value="AMD" label="Armenian dram">AMD</option>
                    <option value="ANG" label="Netherlands Antillean guilder">ANG</option>
                    <option value="AOA" label="Angolan kwanza">AOA</option>
                    <option value="ARS" label="Argentine peso">ARS</option>
                    <option value="AUD" label="Australian dollar">AUD</option>
                    <option value="AWG" label="Aruban florin">AWG</option>
                    <option value="AZN" label="Azerbaijani manat">AZN</option>
                    <option value="BAM" label="Bosnia and Herzegovina convertible mark">BAM</option>
                    <option value="BBD" label="Barbadian dollar">BBD</option>
                    <option value="BDT" label="Bangladeshi taka">BDT</option>
                    <option value="BGN" label="Bulgarian lev">BGN</option>
                    <option value="BHD" label="Bahraini dinar">BHD</option>
                    <option value="BIF" label="Burundian franc">BIF</option>
                    <option value="BMD" label="Bermudian dollar">BMD</option>
                    <option value="BND" label="Brunei dollar">BND</option>
                    <option value="BOB" label="Bolivian boliviano">BOB</option>
                    <option value="BRL" label="Brazilian real">BRL</option>
                    <option value="BSD" label="Bahamian dollar">BSD</option>
                    <option value="BTN" label="Bhutanese ngultrum">BTN</option>
                    <option value="BWP" label="Botswana pula">BWP</option>
                    <option value="BYN" label="Belarusian ruble">BYN</option>
                    <option value="BZD" label="Belize dollar">BZD</option>
                    <option value="CAD" label="Canadian dollar">CAD</option>
                    <option value="CDF" label="Congolese franc">CDF</option>
                    <option value="CHF" label="Swiss franc">CHF</option>
                    <option value="CLP" label="Chilean peso">CLP</option>
                    <option value="CNY" label="Chinese yuan">CNY</option>
                    <option value="COP" label="Colombian peso">COP</option>
                    <option value="CRC" label="Costa Rican colón">CRC</option>
                    <option value="CUC" label="Cuban convertible peso">CUC</option>
                    <option value="CUP" label="Cuban peso">CUP</option>
                    <option value="CVE" label="Cape Verdean escudo">CVE</option>
                    <option value="CZK" label="Czech koruna">CZK</option>
                    <option value="DJF" label="Djiboutian franc">DJF</option>
                    <option value="DKK" label="Danish krone">DKK</option>
                    <option value="DOP" label="Dominican peso">DOP</option>
                    <option value="DZD" label="Algerian dinar">DZD</option>
                    <option value="EGP" label="Egyptian pound">EGP</option>
                    <option value="ERN" label="Eritrean nakfa">ERN</option>
                    <option value="ETB" label="Ethiopian birr">ETB</option>
                    <option value="EUR" label="EURO">EUR</option>
                    <option value="FJD" label="Fijian dollar">FJD</option>
                    <option value="FKP" label="Falkland Islands pound">FKP</option>
                    <option value="GBP" label="British pound">GBP</option>
                    <option value="GEL" label="Georgian lari">GEL</option>
                    <option value="GGP" label="Guernsey pound">GGP</option>
                    <option value="GHS" label="Ghanaian cedi">GHS</option>
                    <option value="GIP" label="Gibraltar pound">GIP</option>
                    <option value="GMD" label="Gambian dalasi">GMD</option>
                    <option value="GNF" label="Guinean franc">GNF</option>
                    <option value="GTQ" label="Guatemalan quetzal">GTQ</option>
                    <option value="GYD" label="Guyanese dollar">GYD</option>
                    <option value="HKD" label="Hong Kong dollar">HKD</option>
                    <option value="HNL" label="Honduran lempira">HNL</option>
                    <option value="HKD" label="Hong Kong dollar">HKD</option>
                    <option value="HRK" label="Croatian kuna">HRK</option>
                    <option value="HTG" label="Haitian gourde">HTG</option>
                    <option value="HUF" label="Hungarian forint">HUF</option>
                    <option value="IDR" label="Indonesian rupiah">IDR</option>
                    <option value="ILS" label="Israeli new shekel">ILS</option>
                    <option value="IMP" label="Manx pound">IMP</option>
                    <option value="INR" label="Indian rupee">INR</option>
                    <option value="IQD" label="Iraqi dinar">IQD</option>
                    <option value="IRR" label="Iranian rial">IRR</option>
                    <option value="ISK" label="Icelandic króna">ISK</option>
                    <option value="JEP" label="Jersey pound">JEP</option>
                    <option value="JMD" label="Jamaican dollar">JMD</option>
                    <option value="JOD" label="Jordanian dinar">JOD</option>
                    <option value="JPY" label="Japanese yen">JPY</option>
                    <option value="KES" label="Kenyan shilling">KES</option>
                    <option value="KGS" label="Kyrgyzstani som">KGS</option>
                    <option value="KHR" label="Cambodian riel">KHR</option>
                    <option value="KID" label="Kiribati dollar">KID</option>
                    <option value="KMF" label="Comorian franc">KMF</option>
                    <option value="KPW" label="North Korean won">KPW</option>
                    <option value="KRW" label="South Korean won">KRW</option>
                    <option value="KWD" label="Kuwaiti dinar">KWD</option>
                    <option value="KYD" label="Cayman Islands dollar">KYD</option>
                    <option value="KZT" label="Kazakhstani tenge">KZT</option>
                    <option value="LAK" label="Lao kip">LAK</option>
                    <option value="LBP" label="Lebanese pound">LBP</option>
                    <option value="LKR" label="Sri Lankan rupee">LKR</option>
                    <option value="LRD" label="Liberian dollar">LRD</option>
                    <option value="LSL" label="Lesotho loti">LSL</option>
                    <option value="LYD" label="Libyan dinar">LYD</option>
                    <option value="MAD" label="Moroccan dirham">MAD</option>
                    <option value="MDL" label="Moldovan leu">MDL</option>
                    <option value="MGA" label="Malagasy ariary">MGA</option>
                    <option value="MKD" label="Macedonian denar">MKD</option>
                    <option value="MMK" label="Burmese kyat">MMK</option>
                    <option value="MNT" label="Mongolian tögrög">MNT</option>
                    <option value="MOP" label="Macanese pataca">MOP</option>
                    <option value="MRU" label="Mauritanian ouguiya">MRU</option>
                    <option value="MUR" label="Mauritian rupee">MUR</option>
                    <option value="MVR" label="Maldivian rufiyaa">MVR</option>
                    <option value="MWK" label="Malawian kwacha">MWK</option>
                    <option value="MXN" label="Mexican peso">MXN</option>
                    <option value="MYR" label="Malaysian ringgit">MYR</option>
                    <option value="MZN" label="Mozambican metical">MZN</option>
                    <option value="NAD" label="Namibian dollar">NAD</option>
                    <option value="NGN" label="Nigerian naira">NGN</option>
                    <option value="NIO" label="Nicaraguan córdoba">NIO</option>
                    <option value="NOK" label="Norwegian krone">NOK</option>
                    <option value="NPR" label="Nepalese rupee">NPR</option>
                    <option value="NZD" label="New Zealand dollar">NZD</option>
                    <option value="OMR" label="Omani rial">OMR</option>
                    <option value="PAB" label="Panamanian balboa">PAB</option>
                    <option value="PEN" label="Peruvian sol">PEN</option>
                    <option value="PGK" label="Papua New Guinean kina">PGK</option>
                    <option value="PHP" label="Philippine peso">PHP</option>
                    <option value="PKR" label="Pakistani rupee">PKR</option>
                    <option value="PLN" label="Polish złoty">PLN</option>
                    <option value="PRB" label="Transnistrian ruble">PRB</option>
                    <option value="PYG" label="Paraguayan guaraní">PYG</option>
                    <option value="QAR" label="Qatari riyal">QAR</option>
                    <option value="RON" label="Romanian leu">RON</option>
                    <option value="RON" label="Romanian leu">RON</option>
                    <option value="RSD" label="Serbian dinar">RSD</option>
                    <option value="RUB" label="Russian ruble">RUB</option>
                    <option value="RWF" label="Rwandan franc">RWF</option>
                    <option value="SAR" label="Saudi riyal">SAR</option>
                    <option value="SEK" label="Swedish krona">SEK</option>
                    <option value="SGD" label="Singapore dollar">SGD</option>
                    <option value="SHP" label="Saint Helena pound">SHP</option>
                    <option value="SLL" label="Sierra Leonean leone">SLL</option>
                    <option value="SLS" label="Somaliland shilling">SLS</option>
                    <option value="SOS" label="Somali shilling">SOS</option>
                    <option value="SRD" label="Surinamese dollar">SRD</option>
                    <option value="SSP" label="South Sudanese pound">SSP</option>
                    <option value="STN" label="São Tomé and Príncipe dobra">STN</option>
                    <option value="SYP" label="Syrian pound">SYP</option>
                    <option value="SZL" label="Swazi lilangeni">SZL</option>
                    <option value="THB" label="Thai baht">THB</option>
                    <option value="TJS" label="Tajikistani somoni">TJS</option>
                    <option value="TMT" label="Turkmenistan manat">TMT</option>
                    <option value="TND" label="Tunisian dinar">TND</option>
                    <option value="TOP" label="Tongan paʻanga">TOP</option>
                    <option value="TRY" label="Turkish lira">TRY</option>
                    <option value="TTD" label="Trinidad and Tobago dollar">TTD</option>
                    <option value="TVD" label="Tuvaluan dollar">TVD</option>
                    <option value="TWD" label="New Taiwan dollar">TWD</option>
                    <option value="TZS" label="Tanzanian shilling">TZS</option>
                    <option value="UAH" label="Ukrainian hryvnia">UAH</option>
                    <option value="UGX" label="Ugandan shilling">UGX</option>
                    <option value="USD" label="United States dollar">USD</option>
                    <option value="UYU" label="Uruguayan peso">UYU</option>
                    <option value="UZS" label="Uzbekistani soʻm">UZS</option>
                    <option value="VES" label="Venezuelan bolívar soberano">VES</option>
                    <option value="VND" label="Vietnamese đồng">VND</option>
                    <option value="VUV" label="Vanuatu vatu">VUV</option>
                    <option value="WST" label="Samoan tālā">WST</option>
                    <option value="XAF" label="Central African CFA franc">XAF</option>
                    <option value="XCD" label="Eastern Caribbean dollar">XCD</option>
                    <option value="XOF" label="West African CFA franc">XOF</option>
                    <option value="XPF" label="CFP franc">XPF</option>
                    <option value="ZAR" label="South African rand">ZAR</option>
                    <option value="ZMW" label="Zambian kwacha">ZMW</option>
                    <option value="ZWB" label="Zimbabwean bonds">ZWB</option>
                </select>
                </div>
                <div>
                  <label class="form-label">Using Default Template</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <label for="invoice_form" class="form-label">From *</label>
                <textarea name="invoice_form" id="invoice_form" rows="2" type="text" class="form-control" placeholder="Who is this invoice from? (required)">@if ($lastInvoice != null){{ $lastInvoice->invoice_form }}@endif</textarea>
                <div id="invoice_form_error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="row pt-1 pb-3">
              <div class="col-md-8">
                <label for="invoice_to" class="form-label">Bill to *</label>
                <textarea name="invoice_to" id="invoice_to" rows="2" type="text" class="form-control" placeholder="Who is this invoice to?(required)">@if ($lastInvoice != null){{ $lastInvoice->invoice_to }}@endif</textarea>
                <div id="invoice_to_error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="col-md-5" style="display: grid">
            <div class="row">
              <div class="col-sm-4 d-flex">
                <h6 class="mt-2">INVOICE ID</h6>
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
            <textarea type="text" name="product_name" id="product_name" class="form-control" placeholder="Description of service or product" rows="1" onchange="addData();"></textarea>
            <div id="name_error" class="invalid-feedback"></div>
          </div>
          <div class="text-start p-0 pb-2 col-md-2">
            <div class="input-group">
              <input type="text" name="product_quantity" id="product_quantity" class="form-control" placeholder="Quantity" onchange="ptotal();addData();">
              <div class="input-group-text fw-bold border-0">X</div>
              <div id="quantity_error" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="text-start p-0 pe-1 pb-2 col-md-2">
            <div class="input-group">
              <input type="text" name="product_rate" id="product_rate" class="form-control" placeholder="Rate" onchange="ptotal();addData();">
              <div class="input-group-text" id="currency">USD</div>
              <div id="product_rate_error" class="invalid-feedback"></div>
            </div>
          </div>
          <div class=" col-md-2 p-0 pe-1 pb-2">
            <div class="ps-2 input-group text-center border rounded justify-content-between align-items-center ">
              <span id="product_amount" class="fw-bolder"></span>
              <div class="input-group-text" id="currency">USD</div>
            </div>
          </div>
        </div>

        <div class="mt-4 ms-2">
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
              <div class="col-5 d-flex align-items-center fw-bolder text-primary">Sub total</div>
              <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                <span class="p-2 fw-bolder text-primary" id="subtotal">0.00</span>
                <div class="input-group-text" id="currency">USD</div>
              </div>
            </div>
            <div class="row pt-2 ">
              <div class="col-5 d-flex align-items-center">Tax</div>
              <div class="col input-group p-0">
                <input type="text" name="invoice_tax" class="form-control" value="0" id="invoice_tax" onchange="total()">
                <div class="input-group-text">&#8453;</div>
                <div id="invoice_tax_error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="d-flex flex-column justify-content-end pt-2">
              <div class="row">
                <div class="col-5 d-flex align-items-center fw-bolder text-success">Total</div>
                <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                  <span class="p-2 fw-bolder text-success" id="total" onchange="totalInwords();">0.00</span>
                  <div class="input-group-text" id="currency">USD</div>
                </div>
                <p id="totalInwords"></p>
              </div>
              <div class="row pt-2 ">
                <div class="col-5 d-flex align-items-center">Advance Amount</div>
                <div class="col input-group p-0">
                  <input type="text" name="advance_amount" class="form-control" value="0" id="advance_amount" onchange="total()">
                  <div class="input-group-text">&#8453;</div>
                  <div id="advance_amount_error" class="invalid-feedback"></div>
                </div>
              </div>
              <div class="row pt-2">
                <div class="col-5 d-flex align-items-center">Amount Paid</div>
                <div class="col input-group p-0">
                  <input type="text" class="form-control" name="invoice_amu_paid" value="0" id="invoice_amu_paid" onchange="total()">
                  <div class="input-group-text" id="currency">USD</div>
                  <div id="invoice_amu_paid_error" class="invalid-feedback"></div>
                </div>
              </div>
              <div class="row pt-2">
                <div class="col-5 d-flex align-items-center fw-bolder text-danger">Balance Due</div>
                <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                  <span class="p-2 fw-bolder text-danger" id="balanceDue">0.00</span>
                  <div class="input-group-text" id="currency">USD</div>
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
        <button type="submit" id="completeInvoice" class="btn send-invoice py-2 px-4" disabled>Complete Invoice</button>
        <a href="#" class="btn send-invoice py-2 px-4 disabled" role="button" aria-disabled="true" onclick="completeInvoice()">Send Invoice</a>
        <a href="#" id="downlodeInvoice" class="btn send-downlod py-2 px-4 disabled">Download Invoice</a>
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

@endpush
