<?php

namespace App\Http\Controllers\frontend;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function allInvoice()
    {
        $invoicessData = Invoice::where('user_id', Auth::user()->id)->get(['id', 'invoice_to', 'invoice_id', 'invoice_date', 'invoice_amu_paid', 'total']);
        $count = $invoicessData->count();

        return view('frontend.all-invoice')->with(compact('invoicessData', 'count'));
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
