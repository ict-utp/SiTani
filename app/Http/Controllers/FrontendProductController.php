<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('frontend-product.index');
    }
}
