<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Invoice::find(3)->products;
        // dd($product);
        return view('frontend.create-invoice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
        dd($id);
        
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
            'product_name' => 'required|max:255',
            'product_quantity' => 'required|integer|digits_between:1,10',
            'product_rate' => 'required|integer|digits_between:1,10',
            'invoice_form' => 'required|max:300',
            'invoice_to' => 'required|max:300',
            'invoice_id' => 'required',
            'invoice_date' => 'required|date',
            'invoice_payment_term' => 'max:30',
            'invoice_dou_date' => 'date|after:invoice_date',
            'invoice_po_number' => 'max:30',
            'invoice_notes' => 'max:400',
            'invoice_terms' => 'max:400',
            'invoice_tax' => 'digits_between:0,9',
            'invoice_amu_paid' => 'digits_between:0,9',
        ]);
        
     

        // invocie Logo name
        $filename = null;
        $invoice_id = $request->invoice_id;
        $invoice_logo = $request->invoice_logo;
        $id = $request->id;
        $tax = $request->invoice_tax;

        $iTotal = 0;
        $totalP = $request->product_quantity * $request->product_rate;

        if ($invoice_id != null) {
            $product = Invoice::find($invoice_id)->products;
            $product_amount =  Product::where('id', $id)->get(['invoice_id', 'product_amount'])->first();
        }

        

        if ($id == null && $tax != 0) {
            $tax = ($totalP * $tax) / 100;
            $iTotal = $totalP + $tax;
        } elseif ($id != null && $tax != 0) {
            $tax = ($totalP * $tax) / 100;
            $total = Invoice::where('id', $id)->get('total');
            $iTotal = $total[0]->total + $totalP + $tax;
        } elseif ($id == null && $tax == 0) {
            $iTotal = $totalP;
        } elseif ($id != null && $tax == 0) {
            $total = Invoice::where('id', $id)->get('total');
            $iTotal = $totalP + $total[0]->total;
        }



        


        if ($id == null && $invoice_logo != null) {
            if ($request->file('invoice_logo')) {
                $file = $request->file('invoice_logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time(). '.' .$extension;
                $file->move(public_path('storage/invoice/logo'), $filename);
            }
        } elseif ($id != null && $invoice_logo != null) {
            $find = Invoice::findOrFail($id);
            $image_path         = public_path("storage\invoice\logo\\") . $find->invoice_logo;
            if (File::exists($image_path)) {
                File::delete($image_path);
                // Create File 
                $file = $request->file('invoice_logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time(). '.' .$extension;
                $file->move(public_path('storage/invoice/logo'), $filename);
            }
        }
        

        $data = array(
            'user_id' => Auth::user()->id,
            'invoice_logo' => $filename,
            'invoice_form' => $request->invoice_form,
            'invoice_to' => $request->invoice_to,
            'invoice_id' => $request->invoice_id,
            'invoice_date' => $request->invoice_date,
            'invoice_payment_term' => $request->invoice_payment_term,
            'invoice_dou_date' => $request->invoice_dou_date,
            'invoice_po_number' => $request->invoice_po_number,
            'invoice_notes' => $request->invoice_notes,
            'invoice_terms' => $request->invoice_terms,
            'invoice_tax' => $request->invoice_tax,
            'invoice_amu_paid' => $request->invoice_amu_paid,
            'total' => $iTotal,
        );

        $invoice =  Invoice::updateOrCreate(['id' => $id], $data);

        $invoice_id = $invoice->id;

        

        $productset = Product::Insert([
            'invoice_id' => $invoice_id,
            'product_name' => $request->product_name,
            'product_quantity' => $request->product_quantity,
            'product_rate' => $request->product_rate,
            'product_amount' => $totalP
        ]);

        return response()->json([$productset, $invoice_id, $iTotal]);
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
