<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        // dd($request);
       
        $validated = $request->validate([
            'product_name' => 'required|max:255',
            'product_quantity' => 'required|integer|digits_between:1,10',
            'product_rate' => 'required|integer|digits_between:1,10'
        ]);
        
        $productAmount = $request->product_quantity * $request->product_rate;

        $id = $request->id;

        $data = array(
            'user_id' => Auth::user()->id
        );

        $invoice =  Invoice::updateOrCreate(['id' => $id], $data);

        $invoice_id = $invoice->id;

        $productset = Product::create([
            'invoice_id' => $invoice_id,
            'product_name' => $request->product_name,
            'product_quantity' => $request->product_quantity,
            'product_rate' => $request->product_rate,
            'product_amount' => $productAmount,
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
        $product_amount =  Product::where('id', $id)->get(['invoice_id', 'product_amount'])->first();
        
        $invoiceData =  Invoice::where('id', $product_amount->invoice_id)->get(['invoice_tax_percent', 'total'])->first();
        
        $total = ( $product_amount->product_amount * $invoiceData->invoice_tax_percent)/100;
        $afterTotal = $invoiceData->total -  $total - $product_amount->product_amount;
        Invoice::where('id', $product_amount->invoice_id)->update(['total' => $afterTotal]);
        
        Product::where('id', $id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
