<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\User;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function edit($id)
    {
        $barang = Barang::where('uuid', $id)->firstOrFail();
        $usr = User::get();
        $stn = Satuan::get();
        $ktg = Kategori::get();
        return view('barang.edit', compact('barang','usr','stn','ktg'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            //  'user_id' => 'required',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'stock' => 'required',
        ]);
        $brg =  \App\Models\Barang::find($id);
        $brg->user_id = $request->user_id;
        $brg->satuan_id = $request->satuan_id;
        $brg->kategori_id = $request->kategori_id;
        $brg->name = $request->name;
        $brg->harga = $request->harga;
        $brg->jumlah = $request->jumlah;
        $brg->stock = $request->stock;
        $brg->save();

        return redirect()->route('barang.index')->with('success','Company has been created successfully.');
    }
}
