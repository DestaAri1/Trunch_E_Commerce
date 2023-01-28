<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\Order;
Use App\Models\Status;
use App\Models\Deliver;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $order = Order::where('user_id', auth()->user()->id)->latest()->paginate(10);
        $cart = cart::where('user_id', Auth::id())->latest()->paginate(99);
        $trans = Order::where('user_id', auth()->user()->id)->latest()->paginate(99);
        $deliver = Deliver::where('user_id', Auth::id())->latest()->paginate(99);
        return view('home.transaksi', compact('order', 'cart', 'trans', 'deliver'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if (empty(Auth::user()->address)) {
            return redirect()->route('profile')->with('error', 'Harap Lengkapi Profil Anda');
        } else {
            foreach($request->name as $key=>$deliver)
            {
                $deliver = new Deliver();
                $deliver->name = $request->name[$key];
                $deliver->quantity = $request->quantity[$key];
                $deliver->img = $request->img[$key];
                $deliver->price = $request->price[$key];
                $deliver->sub_price = $request->sub_price[$key];
                $deliver->user_id = auth()->user()->id;
                $deliver->save();
            }
            Order::where('user_id', Auth::id())->delete();
            return redirect()->route('deliver');
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
        //
    }
}
