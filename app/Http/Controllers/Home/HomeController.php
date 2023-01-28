<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\cart;
use App\Models\Order;
Use App\Models\Deliver;
use App\Models\Finish;

class HomeController extends Controller
{
    public function index() {
        $produk = product::paginate(9);
        $cart = cart::where('user_id', Auth::id())->latest()->paginate(99);
        $trans = Order::where('user_id', Auth::id())->latest()->paginate(99);
        $deliver = Deliver::where('user_id', Auth::id())->latest()->paginate(99);
        return view('home.home', compact('produk', 'cart', 'trans', 'deliver'));
    }

    public function history() {
        $cart = cart::where('user_id', Auth::id())->latest()->paginate(99);
        $trans = Order::where('user_id', Auth::id())->latest()->paginate(99);
        $deliver = Deliver::where('user_id', Auth::id())->latest()->paginate(99);
        $history = Finish::where('user_id', Auth::id())->latest()->paginate(10);
        return view('home.history', compact('cart', 'trans', 'deliver', 'history'));
    }
}
