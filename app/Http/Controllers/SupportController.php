<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function faq()
    {
        return view('support.faq');
    }

    public function contact()
    {
        return view('support.contact');
    }

    public function shippingInfo()
    {
        return view('support.shipping');
    }

    public function returnPolicy()
    {
        return view('support.returns');
    }

    public function sizeGuide()
    {
        return view('support.size_guide');
    }
}