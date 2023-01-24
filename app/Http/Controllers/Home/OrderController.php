<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        foreach($request->name as $key=>$produk){
            $order = new Order();
            $order->name = $request->name[$key];
            $order->quantity = $request->quantity[$key];
            $order->price = $request->price[$key];
            $order->img = $request->img[$key];
            $order->user_id = auth()->user()->id;
            $order->save();
        }
        cart::where('user_id', auth()->user()->id)->delete();
        return redirect()->route('transaksi');
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
