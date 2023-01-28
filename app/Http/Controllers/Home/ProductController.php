<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use App\Models\cart;
use App\Models\Order;
use App\Models\Deliver;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produk = product::latest()->paginate(9);
        $cart = cart::where('user_id', Auth::user()->id)->latest()->paginate(99);
        $trans = Order::where('user_id', Auth::id())->latest()->paginate(99);
        $deliver = Deliver::where('user_id', Auth::id())->latest()->paginate(99);
        return view('home.produk', compact('produk', 'cart', 'trans', 'deliver'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
