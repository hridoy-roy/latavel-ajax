<!DOCTYPE html>
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
    <link rel="stylesheet" href="style.css">

    <title>Invoice</title>
    <style>
        :root {
            --body-bg: rgb(204, 204, 204);
            --white: #fff;
            --darkWhite: #ccc;
            --black: #000;
            --dark: #686868;
            --textcolor: #686868;
            --themeColor: #FCB21C;
            --pageShadow: 0 -10px 0.5cm rgba(0, 0, 0, 0.5);
        }

        * {
            font-family: 'Monda', sans-serif !important;
        }

        /* font Use */
        @import url('https://fonts.googleapis.com/css2?family=Monda:wght@400;700&display=swap');

        body {
            background-color: var(--body-bg);
        }

        .page {
            background: var(--white);
            display: block;
            margin: 0 auto;
            position: relative;
            box-shadow: var(--pageShadow);


        }

        .page[size="A4"] {
            width: 21cm;
            min-height: 29.7cm;
            overflow: hidden;
        }

        /* header_leftside */
        .header_leftside {
            border: 1px solid var(--themeColor);
        }

        .logo {
            width: 130px;
            height: 130px;
            background-color: var(--white);
        }

        /* header_leftside */
        /* header_rightside */
        .header_rightside h1 {
            color: var(--themeColor);
            font-size: 60px;
            letter-spacing: 1px;
            font-weight: 700;
            font-family: 'Monda', sans-serif;
        }

        .header_rightside p {
            width: 100px;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Monda', sans-serif;
            color: var(--textcolor);
        }

        .header_rightside h4 {
            width: 150px;
            font-size: 17px;
            font-weight: 700;
            font-family: 'Monda', sans-serif;
            color: var(--textcolor);
        }

        /* table_section */
        .table_section {}

        .table_section>table>thead>tr>th {
            text-transform: uppercase;
            font-weight: 700;
            font-family: 'Monda', sans-serif;
            color: var(--textcolor);
            font-size: 18px;
            border-bottom: 2px solid var(--textcolor) !important;
        }

        .table_section>table>tbody>tr>th,
        .table_section>table>tbody>tr>td {
            font-weight: 700;
            font-family: 'Monda', sans-serif;
            color: var(--textcolor);
            font-size: 13px;
            border-bottom: 1px solid var(--textcolor) !important;
        }

        /* table_section */

        /* invoice_footer_start */
        .invoice_footer table tbody tr td,
        .invoice_footer table tbody tr th {
            border: 0px !important;
        }

        .invoice_footer_start {
            border: 1px solid var(--themeColor);
        }

        .invoice_footer_start>div>h2 {
            text-transform: uppercase;
            color: var(--textcolor);
            font-weight: bold;
            font-size: 18px;
            border-bottom: 1px solid var(--themeColor);
            padding-bottom: 5px;
        }

        .invoice_footer_start>div>p {
            color: var(--textcolor);
            font-size: 15px;
        }

        .invoice_footer_end {}

        .invoice_footer_end h1 {
            font-style: normal;
            font-weight: normal;
            font-size: 30px;
            color: var(--textcolor);
            border-bottom: 2px solid var(--themeColor);
        }

        .invoice_footer_end h3 {
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--themeColor);
        }

        .invoice_footer_end p {
            font-size: 15px;
            color: var(--textcolor);
        }

        .invoice_footer_end strong {
            font-size: 16px;
            color: var(--textcolor);
        }

        /* invoice_footer_start */

        /* header_rightside */
    </style>
</head>

<body>
    <div class="page d-flex flex-column justify-content-between" size="A4">
        <div class="w-100">
            <div class="d-flex w-100 m-1">
                <div
                    class="col-4 text-center d-flex flex-column justify-content-center align-items-center p-0 pt-5 pb-4 px-0 header_leftside">
                    <div
                        class="border rounded-circle logo d-flex flex-column justify-content-center align-items-center">
                        @if ($invoiceData->invoice_logo)
                        <img src="{{ asset('storage/invoice/logo/'.$invoiceData->invoice_logo) }}" alt="" width="150" class="img-fluid">
                        @else
                        <h1>NO LOGO</h1>
                        @endif 
                    </div>
                    <div class="pt-5">
                        <strong>{!! Str::words($invoiceData->invoice_form, 4, '...') !!}</strong>
                        <pre>{{ $invoiceData->invoice_form }}</pre>
                    </div>
                </div>
                <div class="col header_rightside">
                    <div class="py-5 pe-5 text-end">
                        <h1>INVOICE</h1>
                        <div class="text-end d-flex justify-content-end">
                            <div class="text-start">
                                <h4 class="pe-3 pb-1 my-2">INVOICE #:</h4>
                                <h4 class="pe-3 pb-1 my-2">INVOICE DATE:</h4>
                                <h4 class="pe-3 pb-1 my-2">P.O.#:</h4>
                                <h4 class="pe-3 pb-1 my-2">DUE DATE:</h4>
                            </div>
                            <div>
                                <p class="my-2">{{ $invoiceData->invoice_id }}</p>
                                <p class="my-2">{{ $invoiceData->invoice_dou_date }}</p>
                                <p class="my-2">{{ $invoiceData->invoice_po_number }}</p>
                                <p class="my-2">{{ $invoiceData->invoice_dou_date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex p-5 table_section">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%;">qty</th>
                            <th scope="col">description</th>
                            <th scope="col" style="width: 10%;">amount</th>
                        </tr>
                    </thead>
                    <tbody style="height: 50px; overflow: hidden;">
                        @forelse ($productsDatas as $Key => $productsData)
                        <tr>
                            <th scope="row" class="text-center">{{ ++$Key }}</th>
                            <td>{{ $productsData->product_name }}</td>
                            <td class="d-flex justify-content-between">
                                <span>{{  $invoiceData->currency }}</span>
                                <span>{{ $productsData->product_amount }}</span>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="invoice_footer">
            <div class="px-5 pb-0">
                <table class="table">
                    <tbody>
                        <tr class="text-end">
                            <th>Due: </th>
                            <td style="width: 15%;">{{ $due }}</td>
                        </tr>
                        <tr class="text-end">
                            <th>Tax {{ $invoiceData->invoice_tax_percent }}%:</th>
                            <td style="width: 15%;">{{ tax($invoiceData->invoice_tax_percent, $invoiceData->total ) }}</td>
                        </tr>
                        <tr class="text-end">
                            <th>Total:</th>
                            <td style="width: 15%;">{{ $invoiceData->total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex p-0 m-1 mb-0">
                <div class="col-4 invoice_footer_start p-5 pb-0 text-center">
                    <div>
                        <h2>TO</h2>
                        <p>
                            {{Str::limit($invoiceData->invoice_form, 50, '...')}}
                        </p>
                    </div>
                    <div>
                        <h2>Bill TO</h2>
                        <p>{{substr($invoiceData->invoice_to, 0, 50)}}</p>
                    </div>
                </div>
                <div class="col-8 invoice_footer_end p-0">
                    <h1 class="pb-3 px-3">Thank You for your business</h1>
                    <div class="d-flex me-5">
                        <div class="col-9 p-3">
                            <div>
                                <h3>Notes</h3>
                                @if ($invoiceData->invoice_notes)
                                <p>{{ Str::words($invoiceData->invoice_notes, 16, '...') }}</p>
                                @else
                                <p>NO NOTE</p>
                                @endif
                            </div>
                            <div class="">
                                <h3>Terms</h3>
                                @if ($invoiceData->invoice_terms)  
                                <p>{{ Str::words($invoiceData->invoice_terms, 16, '...') }}</p>
                                @else
                                    <p>ON TERM</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-3 py-2 pb-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>