<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function Index(){

        $totalproduct = Product::count();
        $totalcategory = Category::count();
        $totalsubcategory = SubCategory::count();
        $totalorders = Order::count();

        $totalAllUsers = User::count();
        // $totalUser = User::where('role_as', '0')->count();
        // $totalAdmin = User::where('role_as', '1')->count();

        return view('admin.admindashboard', compact('totalproduct', 'totalcategory', 'totalsubcategory', 'totalAllUsers', 'totalorders'));
    }




    
}
