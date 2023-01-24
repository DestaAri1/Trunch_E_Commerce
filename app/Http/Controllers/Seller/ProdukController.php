<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\product;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produk = product::where('user_id', Auth::id())->latest()->paginate(5);
        return view('seller.product', compact('produk'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'price' => 'required',
            'stock' => 'required',
            'img' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $image = $request->img;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->img->move('assets/img', $imagename);

        $produk = product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'stock' => $request->stock,
            'img' => $imagename,
            'user_id' => auth()->user()->id,
        ]);

        if ($produk) {
            return redirect()->back()->with('success', 'Produk Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Produk Gagal Ditambahkan');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $produk = product::findOrFail($id);
        return view('seller.edit_product', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $produk = product::findOrFail($id);

        if ($request->file('img') == "") {
            $produk->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        } else {
            Storage::disk('local')->delete('assets/img/'.$produk->img);

            $image = $request->img;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->img->move('assets/img', $imagename);

            $produk->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'price' => $request->price,
                'stock' => $request->stock,
                'img' => $imagename,
            ]);
        }

        if ($produk) {
            return redirect()->route('list')->with('success', 'Produk Berhasil Diubah');
        } else {
            return redirect()->route('list')->with('error', 'Produk Gagal Diubah');
        }



        // $image = $request->img;
        // $imagename = time().'.'.$image->getClientOriginalExtension();
        // $request->img->move('assets/img', $imagename);

        // $produk = product::findOrFail($id);
        // $input = [
        //     'name' => $request->name,
        //     'slug' => $request->slug,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'img' => $imagename,
        // ];
        // $produk->update($input);
        // return redirect()->route('list')->with('success', 'Produk Berhasil Diubah');
    }


    public function destroy($id)
    {
        $produk = product::findOrFail($id);
        if ($produk->delete()) {
            return redirect()->back()->with('success', 'Produk Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Produk Gagal Dihapus');
        }

    }
}
