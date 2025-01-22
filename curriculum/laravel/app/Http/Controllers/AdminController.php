<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class AdminController extends Controller
{
        public function admin(Request $request)
    {
        if ($request->has('tab') && $request->tab === 'sales') {
            $sales = Sale::with('product')->get();
            return view('admin', compact('sales'));
        }
        $products = Product::all();
        $sales = Sale::with('product')->get();
        return view('admin', compact('products', 'sales'));
    }
}
