<?php

namespace App\Http\Controllers;

use App\Mail\Sendinvoice;
use App\Models\EmailInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function sendInvoice(Request $request)
    {

        $validate = $request->validate([
            'invoice_id' => 'required',
            'send_to' => 'required|email',
        ]);

        $validate['user_id'] = auth()->user()->id;
        $validate['subject'] = $request->subject;
        $validate['body'] = $request->body;
        $sendInvoice = EmailInfo::create($validate);


        $data = ['body' => $sendInvoice->body, 'invoice_id' =>  $sendInvoice->invoice_id];
        $user = ['to' => $sendInvoice->send_to, 'subject' => $sendInvoice->subject];
        Mail::send('emails.send-invoice', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject($user['subject']);
        });
        return redirect()->back();
    }
}
