<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function create()
    {
        return view('frontend.create_invoice');
    }

    public function createbill(Request $request)
    {
        return $request;
        return view('frontend.create_invoice');
    }

    
}
