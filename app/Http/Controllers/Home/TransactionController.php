<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
Use App\Models\Status;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $order = Order::where('user_id', auth()->user()->id)->latest()->paginate(10);
        return view('home.transaksi', compact('order'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
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
