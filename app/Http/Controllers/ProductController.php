<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($id);
        $data = Product::where('invoice_id', $id)->orderBy('id', 'ASC')->get();

        // $data = Product::orderBy()->get();
        // ->with(compact('data'))
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
            'invoiceid' => 'required',
        ]);

        $invoice_id = $request->invoiceid;
        $id = $request->id;
        $data = array(
            'user_id' => 2,
            'invoice_id' => $invoice_id,
            'name' => 'Test2',
        );

        $invoice =  Invoice::updateOrCreate(['id' => $id], $data);

        // dd($invoice->id);

        // $invoice = DB::table('invoices')->where('invoice_id', $invoice_id)->value('id');
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
        Product::where('id', $id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
