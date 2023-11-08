<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index(){
        $pending_order = Order::where('status','pending')->latest()->get();
        return view('admin.pendingorder', compact('pending_order'));
    }

}
