<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;
use Carbon\Cli\Invoker;
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
            'invoice_form' => 'required|max:300',
            'invoice_to' => 'required|max:300',
            'invoice_id' => 'required',
            'invoice_date' => 'required|date',
            'invoice_payment_term' => 'max:30',
            'invoice_dou_date' => 'date|after:invoice_date',
            'invoice_po_number' => 'max:30',
            'invoice_notes' => 'max:400',
            'invoice_terms' => 'max:400',
        ]);
        
        
        if ($request->id != null) {
            // Tax Calculation Formula Start
            $taxPercentage = $request->invoice_tax;
            $products = Invoice::find($request->id)->products->pluck('product_amount')->sum();
            $tax = ($taxPercentage * $products)/100;
            $taxAmount = $tax + $products;
            // Tax Calculation Formula End

            // Amount Paid || Advance
            $invoice_amu_paid = $request->invoice_amu_paid;
            $invoice_amu_paid_precent = null;
            $precent = substr($invoice_amu_paid, -1);
            if ($precent == '%') {
                $invoice_amu_paid_precent = substr($invoice_amu_paid, 0, -1);
                $invoice_amu_paid = ($taxAmount * $invoice_amu_paid_precent)/100;

                dd([$invoice_amu_paid,$invoice_amu_paid_precent]);
            } elseif ($precent != '%' && is_int($precent)) {
                dd($invoice_amu_paid);
            }
            // Amount Paid || Advance

            // invocie Logo name Strat
            $id = $request->id;
            $filename = null;
            $invoice_logo = $request->invoice_logo;

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
            // invocie Logo name End

            // Update Invoice Data
            $data = array(
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
                'invoice_amu_paid_precent' => $invoice_amu_paid_precent,
                'invoice_amu_paid' => $invoice_amu_paid,
                'total' => $taxAmount,
                'invoice_status' => 'complete',
            );
            $invoice =  Invoice::updateOrCreate(['id' => $id], $data);
            // invoice Data End

            return response()->json([$invoice->id]);
        }

        return response()->json(['message' => 'Please create product']);
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

    /**
     * Downlode the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $invoiceData = Invoice::where('id', $id)->get([
            'invoice_logo',
            'invoice_form',
            'invoice_to',
            'invoice_id',
            'invoice_date',
            'invoice_payment_term',
            'invoice_dou_date',
            'invoice_po_number',
            'invoice_notes',
            'invoice_terms',
            'invoice_tax',
            'invoice_amu_paid',
            'total',
        ])->first();
        $productsDatas = Invoice::find($id)->products;
        return view('invoices.wid')->with(compact('invoiceData', 'productsDatas'));
    }
}
