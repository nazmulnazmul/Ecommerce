<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Index(){
        $products = Product::latest()->get();
        return view('frontend.home', compact('products'));
    }

   
}
