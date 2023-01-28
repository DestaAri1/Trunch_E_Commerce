<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\Order;
use App\Models\Deliver;

class ProfileController extends Controller
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
        return view('home.profile', compact('cart', 'trans', 'deliver'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'nik' => 'required',
            'pekerjaan' => 'required|max:255',
            'ayah' => 'required|max:255',
            'a_pekerjaan' => 'required|max:255',
            'ibu' => 'required|max:255',
            'i_pekerjaan' => 'required|max:255',
            'address' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'pekerjaan' => $request->pekerjaan,
            'ayah' => $request->ayah,
            'a_pekerjaan' => $request->a_pekerjaan,
            'ibu' => $request->ibu,
            'i_pekerjaan' => $request->i_pekerjaan,
            'address' => $request->address,
        ]);
        if ($user) {
            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
    }

    public function destroy($id)
    {
        //
    }
}
