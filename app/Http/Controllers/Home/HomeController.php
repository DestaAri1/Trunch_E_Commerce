<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\cart;

class HomeController extends Controller
{
    public function index(Request $request) {
        $produk = product::paginate(9);
        return view('home.home', compact('produk'));
    }
}
