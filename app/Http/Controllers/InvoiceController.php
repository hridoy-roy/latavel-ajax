<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('frontend.create_invoice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'invoiceid' => 'required',
        // ]);

        // $invoice_id = $request->invoiceid;
        // $id = $request->id;
        // $data = array(
        //     'user_id' => 2,
        //     'invoice_id' => $invoice_id,
        //     'name' => 'Test2',
        // );

        // $status =  Invoice::updateOrCreate(['id' => $id], $data);


        // if ($status == "uncomplet") {
        //     $invoiceset = Invoice::Insert([
        //         'user_id' => 2,
        //         'invoice_id' => $invoice_id,
        //         'name' => 'Test2',
        //     ]);
        // } elseif($status == "complet"){
        //     $invoiceset = Invoice::Update([
        //         'user_id' => 2,
        //         'invoice_id' => $invoice_id,
        //         'name' => 'Test2',
        //     ]);
        // }

        

        $invoice = DB::table('invoices')->where('invoice_id', $invoice_id)->value('id');

        

        return response()->json($invoice);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
