<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\product;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $cart = cart::where('user_id', Auth::id())->latest()->paginate(100);
        return view('home.cart', compact('cart'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $produk = product::findOrFail($id);

        $cart = new cart();
        $cek_cart = cart::where('name', $request->name)->first();
        if ($cek_cart) {
            return redirect()->back()->with('error', 'Produk Telah Ada Didalam Cart');
        } else {
            $cart->name = $produk->name;
            $cart->price = $produk->price;
            $cart->img = $produk->img;
            $cart->user_id = auth()->user()->id;
            $cart->save();
            return redirect()->back()->with('success', 'Produk Berhasil Ditambahkan');
        }

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
        $cart = cart::findOrFail($id);
        if ($cart->delete()) {
            return redirect()->back()->with('success', 'Cart Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Cart Gagal Dihapus');
        }

    }
}
