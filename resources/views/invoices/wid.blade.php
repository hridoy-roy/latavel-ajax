<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/invoices/wid.css') }}">

    <title>Invoice</title>
</head>

<body>
    <div class="page" size="A4">
        <div class="">
            <div class="d-flex p-5">
                <section class="left-side-bar">
                    <div>
                        <span>Invoice: </span>
                        <h1 class="m-0">{{ $invoiceData->invoice_id }}</h1>
                    </div>

                </section>
                <div class="w-100 d-flex flex-column justify-content-between" style="height: 26cm;">
                    <section class="top-section bb d-flex justify-content-between">
                        <div class="top-rignt">
                            <h1 class="m-0">Women in Digital</h1>
                            <br />
                            <pre>{{ $invoiceData->invoice_form }}</pre>
                        </div>
                        <div class="logo">
                            @if ($invoiceData->invoice_logo)
                            <img src="{{ asset('storage/invoice/logo/'.$invoiceData->invoice_logo) }}" alt="" width="150" class="img-fluid">
                            @else
                            <h1>NO LOGO</h1>
                            @endif                            
                        </div>
                    </section>
                    <section class="bill-to border-top mt-3">
                        <div class="bill-to-top d-flex justify-content-between pt-3">
                            <div>
                                <h4 class="m-0">Bill To</h4>
                                <br />
                                <p>{{ $invoiceData->invoice_to }}</p>
                            </div>
                            <div class="d-flex">
                                <h4 class="m-0">Invoice Date: </h4>
                                <span class="fw-bolder">{{ $invoiceData->invoice_date }}</span>
                            </div>
                        </div>
                        <table class="table table-striped border">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="w-75">Description</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($productsDatas as $Key => $productsData)
                                <tr>
                                    <th scope="row">{{ ++$Key }}</th>
                                    <td>{{ $productsData->product_name }}</td>
                                    <td class="d-flex justify-content-between">
                                        <span>TK</span>
                                        <span>{{ $productsData->product_amount }}</span>
                                    </td>
                                </tr>
                                @empty
                                    
                                @endforelse
                                
                                <tr>
                                    <th colspan="2">Paid</th>
                                    <td class="d-flex justify-content-between">
                                        <span>TK</span>
                                        <span>{{ $invoiceData->invoice_amu_paid }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="total m-3 d-flex">
                            <h4 class="m-0">Total With {{ $invoiceData->invoice_tax }}% Tax: </h4><span>TK {{ $invoiceData->total }}</span>
                        </div>
                    </section>
                    <section class="terms-conditions border-top pt-3">
                        <h4>Notes</h4>
                        @if ($invoiceData->invoice_notes)
                        <p>{{ $invoiceData->invoice_notes }}</p>
                        @else
                        <p>NO NOTE</p>
                        @endif
                    </section>
                    <section class="terms-conditions border-top pt-3">
                        <h4>Terms</h4>
                        @if ($invoiceData->invoice_terms)  
                        <p>{{ $invoiceData->invoice_terms }}</p>
                        @else
                            <p>ON TERM</p>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>