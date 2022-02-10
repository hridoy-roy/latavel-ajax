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
    public function index()
    {
        $data = Product::orderBy('id', 'ASC')->get();
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
        ]);

        $id =2;

       if ($id != 2) {

        $invoiceset = Invoice::Insert([
            'user_id' => 2,
            'invoice_id' => 2,
            'name' => 'Test2',
        ]);
       }

        $total = $request->quantity * $request->rate;
        
        $productset = Product::Insert([
            'invoice_id' => 2,
            'product_name' => $request->name,
            'quantity' => $request->quantity,
            'rate' => $request->rate,
            'amount' => $total
        ]);
        return response()->json($productset);
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
    public function destroy(Product $product)
    {
        //  dd($product);
        // Product::findOrFail($product)->delete($product);
        DB::table('products')->where('id', '==', $product)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
