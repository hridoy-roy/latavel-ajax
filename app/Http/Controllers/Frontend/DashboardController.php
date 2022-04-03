<?php

namespace App\Http\Controllers\frontend;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function allInvoice()
    {
        $invoicessData = Invoice::where('user_id', Auth::user()->id)->get(['id', 'invoice_to', 'invoice_id', 'invoice_date', 'total']);
        $count = $invoicessData->count();

        return view('frontend.all-invoice')->with(compact('invoicessData', 'count'));
    }

    public function edit($id)
    {
        $invoiceData = Invoice::where('id', $id)->get(['id', 'invoice_logo', 'invoice_form', 'invoice_to', 'invoice_id', 'invoice_date', 'invoice_payment_term', 'invoice_dou_date', 'invoice_po_number', 'invoice_notes', 'invoice_terms', 'invoice_tax_percent', 'requesting_advance_amount_percent', 'receive_advance_amount', 'total', 'currency'])->first();
        $invoiceCount = Invoice::where('user_id', Auth::user()->id)->count();
        // $productData = Product::where('invoice_id', $id)->get(['product_name', 'product_quantity', 'product_rate', 'product_amount']);
        // foreach ($productData as $key => $value) { echo $value; };
        return view('frontend.create-invoice')->with(compact('invoiceData', 'invoiceCount'));
    }

    public function destroy($id)
    {
        $invoiceData = Invoice::find($id);
        $image_path         = public_path("storage\invoice\logo\\") . $invoiceData->invoice_logo;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $invoiceData->delete();
        return response()->json(['message' => 'Delete Success']);
    }
}
