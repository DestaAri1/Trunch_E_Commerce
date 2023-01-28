<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deliver;

class WaitingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $deliver = Deliver::join('users', 'users.id', '=', 'delivers.user_id')
            ->paginate(5, array('delivers.id', 'delivers.name', 'delivers.img', 'delivers.quantity',
            'delivers.status','users.address'));
        // $deliver = Deliver::all();
        return view('seller.pesanan', compact('deliver'));
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
        $deliver = Deliver::findOrFail($id);
        $deliver->update([
            'status' => '1',
        ]);
        if ($deliver) {
            return redirect()->back()->with('success', 'Barang Telah Dikirim');
        } else {
            return redirect()->back()->with('error', 'Barang Telah Dikirim');
        }

    }

    public function destroy($id)
    {
        //
    }
}
