@extends('layouts.frontend.app')
@section('title', 'Home page')
@push('frontend_css')

  <!--Datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>
  <link href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css" />

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
                    <h2 class="h2_title mb-4">Wellcome back to Billto</h2>
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
                            <li class="nav-item px-1">
                                <a class="nav-link active" aria-current="page" href="#">
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
                        </ul>
                    </div>
                    <div class="col-md-12 p-3 p-md-5 border-start border-end border-bottom"
                        style="background: #F0F0F0;">
                        <ul class="nav nav-tabs pt-4">
                            <li class="nav-item">
                                <a class="nav-link p-2 active" aria-current="page" href="#">
                                    All Invoices <span class="badge bg-info rounded-pill">4</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 " aria-current="page" href="#">
                                    Overdue <span class="badge bg-dark rounded-pill">4</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 " aria-current="page" href="#">
                                    Unpaid <span class="badge bg-danger rounded-pill">4</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 " aria-current="page" href="#">
                                    Paid <span class="badge bg-success rounded-pill">4</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 " aria-current="page" href="#">
                                    send by Email <span class="badge bg-primary rounded-pill">4</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 " aria-current="page" href="#">
                                    send by Email <span class="badge bg-secondary rounded-pill">4</span></a>
                            </li>
                        </ul>
                        <div class="px-2 py-3 py-md-5 border-start border-end border-bottom rounded"
                            style="background: #fff;">
                            <table id="example" class="table table-striped border display nowrap mt-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>CUSTOMER</th>
                                        <th>NUMBER</th>
                                        <th>DATE</th>
                                        <th>PAID</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($invoicessData as $key => $invoiceData)
                                    <tr class="border border-warning">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $invoiceData->invoice_to }}</td>
                                        <td>{{ $invoiceData->invoice_id }}</td>
                                        <td>{{ $invoiceData->invoice_date }}</td>
                                        <td>৳ {{ $invoiceData->invoice_amu_paid }}</td>
                                        <td>৳ {{ $invoiceData->total }}</td>
                                    </tr>
                                    @empty
                                        
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Sign in form End -->
@endsection
@push('frontend_js')
    <!--Datatable-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

    
    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                responsive: true
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
@endpush