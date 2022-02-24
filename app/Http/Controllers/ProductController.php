<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id  = $request->id;
        $data = Product::where('invoice_id', $id)->orderBy('id', 'ASC')->get();
        return response()->json($data);
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
       
        $validated = $request->validate([
            'name' => 'required|max:255',
            'quantity' => 'required|numeric|min:1',
            'rate' => 'required|numeric|min:1',
            'invoice_logo' => 'required',
            'invoice_form' => 'required|max:300',
            'invoice_to' => 'required|max:300',
            'invoice_id' => 'required|max:10',
            'invoice_date' => 'required|date',
            'invoice_payment_term' => 'max:30',
            'invoice_dou_date' => 'date|after:invoice_date',
            'invoice_po_number' => 'max:30',
            'invoice_notes' => 'max:400',
            'invoice_terms' => 'max:400',
        ]);

       
        
        // if ($request->hasFile('invoice_logo')) {
        //     dd("ok");
        // }

        $invoice_id = $request->invoice_id;
        $id = $request->id;
        $data = array(
            'user_id' => 2,
            'invoice_logo' => $request->invoice_logo,
            'invoice_form' => $request->invoice_form,
            'invoice_to' => $request->invoice_to,
            'invoice_id' => $request->invoice_id,
            'invoice_date' => $request->invoice_date,
            'invoice_payment_term' => $request->invoice_payment_term,
            'invoice_dou_date' => $request->invoice_dou_date,
            'invoice_po_number' => $request->invoice_po_number,
            'invoice_notes' => $request->invoice_notes,
            'invoice_terms' => $request->invoice_terms,
        );

        $invoice =  Invoice::updateOrCreate(['id' => $id], $data);

        $invoice_id = $invoice->id;

        $total = $request->quantity * $request->rate;

        $productset = Product::Insert([
            'invoice_id' => $invoice_id,
            'product_name' => $request->name,
            'quantity' => $request->quantity,
            'rate' => $request->rate,
            'amount' => $total
        ]);



        return response()->json([$productset, $invoice_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return "ok";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_amount =  Product::where('id', $id)->get(['invoice_id', 'product_amount']);
        $invoice_id = $product_amount[0]->invoice_id;
        $invoiceData =  Invoice::where('id', $invoice_id)->get(['invoice_tax', 'total']);
       
        $total = ( $product_amount[0]->product_amount * $invoiceData[0]->invoice_tax)/100;
        $afterTotal = $invoiceData[0]->total -  $total - $product_amount[0]->product_amount;
        Invoice::where('id', $invoice_id)->update(['total' => $afterTotal]);
        
        Product::where('id', $id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
