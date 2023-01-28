<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\Order;
use App\Models\Deliver;
use App\Models\Finish;
use Carbon\Carbon;

class DeliverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = cart::where('user_id', Auth::id())->latest()->paginate(99);
        $trans = Order::where('user_id', Auth::id())->latest()->paginate(99);
        $deliver = Deliver::where('user_id', Auth::id())->latest()->paginate(99);
        return view('home.deliver', compact('cart', 'trans', 'deliver'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $deliver = Deliver::findOrFail($id);
        $finish = new Finish();
        $carbon = new Carbon();
        if ($deliver) {
            $finish->name = $deliver->name;
            $finish->img = $deliver->img;
            $finish->quantity = $deliver->quantity;
            $finish->sub_price = $deliver->sub_price;
            $finish->waktu = $carbon;
            $finish->user_id = auth()->user()->id;
            $finish->save();
            $deliver->delete();
            return redirect()->route('history');
        } else {
            return redirec()->back()->with('error', 'Gagal Diselesaikan');
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
