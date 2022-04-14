<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettignsController extends Controller
{
    public function Settign()
    {
        return view('frontend.settings');
    }
    public function DefaultSetting()
    {
        return view('frontend.default-setting');
    }
}
