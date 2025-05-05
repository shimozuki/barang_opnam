<?php

namespace App\Http\Controllers;
use App\Models\Satuan;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
use App\Exports\BarangbidExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Admin
    public function index()
    {
        $users = User::get();
    $satuans = Satuan::get();
    $barangs = Barang::orderBy('id', 'desc')->get();
    return view('barang.index', compact('barangs','users'));
    }
    //ADMIN
    public function aindex()
    {
        $users = User::get();
    $satuans = Satuan::get();
    $barangs = Barang::orderBy('id', 'desc')->get();
    return view('barangadmin.index', compact('barangs','users'));
    }
    public function aupdate(Request $request, $id)
    {

        $request->validate([
            //  'user_id' => 'required',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'stock' => 'required',
            'tahun' => 'required',
        ]);
        $brg =  \App\Models\Barang::find($id);
        $brg->user_id = $request->user_id;
        $brg->satuan_id = $request->satuan_id;
        $brg->kategori_id = $request->kategori_id;
        $brg->name = $request->name;
        $brg->harga = $request->harga;
        $brg->jumlah = $request->jumlah;
        $brg->stock = $request->stock;
        $brg->tahun = $request->tahun;
        $brg->save();

        return redirect()->route('barang-admin.aindex')->with('success','Company has been created successfully.');
    }
    public function astore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'stock' => 'required',
            'tahun' => 'required',
        ]);
        $store = new \App\Models\Barang();
        $store->user_id = $request->user_id;
        $store->satuan_id = $request->satuan_id;
        $store->kategori_id = $request->kategori_id;
        $store->name = $request->name;
        $store->harga = $request->harga;
        $store->jumlah = $request->jumlah;
        $store->stock = $request->stock;
        $store->tahun = $request->tahun;

        $store->save();

        return redirect()->route('barang-admin.aindex')->with('success','Company has been created successfully.');
    }
    public function acreate()
    {
        $use = User::get();
        $stn = Satuan::get();
        $ktg = Kategori::get();
        return view('barangadmin.create',compact('stn','ktg','use'));
    }
    public function aedit($id)
    {
        $barang = Barang::where('uuid', $id)->firstOrFail();
        $usr = User::get();
        $stn = Satuan::get();
        $ktg = Kategori::get();
        return view('barangadmin.edit', compact('barang','usr','stn','ktg'));
    }
    public function adestroy($id)
    {
        $barangs= Barang::find($id);
        $barangs->delete();
        return redirect()->route('barang-admin.aindex')->with('success','Company has been deleted successfully');
    }
    public function aexport()
    {

        return Excel::download(new BarangExport, 'barang.xlsx' );
    }
    // Bidang
    public function bindex()
    {
        $use = User::get();
        $stn = Satuan::get();
        $ktg = Kategori::get();
        $barangs = Barang::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
    return view('bidang-b.barang', compact('barangs','stn','ktg','use'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'stock' => 'required',
            'tahun' => 'required',
        ]);
        $store = new \App\Models\Barang();
        $store->user_id = $request->user_id;
        $store->satuan_id = $request->satuan_id;
        $store->kategori_id = $request->kategori_id;
        $store->name = $request->name;
        $store->harga = $request->harga;
        $store->jumlah = $request->jumlah;
        $store->stock = $request->stock;
        $store->tahun = $request->tahun;

        $store->save();

        return redirect()->route('barang.index')->with('success','Company has been created successfully.');
    }


    public function bstore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'stock' => 'required',
            'tahun' => 'required',
        ]);
        $store = new \App\Models\Barang();
        $store->user_id = $request->user_id;
        $store->satuan_id = $request->satuan_id;
        $store->kategori_id = $request->kategori_id;
        $store->name = $request->name;
        $store->harga = $request->harga;
        $store->jumlah = $request->jumlah;
        $store->stock = $request->stock;
        $store->tahun = $request->tahun;

        $store->save();

        return redirect()->route('barang.bindex')->with('success','Company has been created successfully.');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $use = User::get();
        $stn = Satuan::get();
        $ktg = Kategori::get();
        return view('barang.create',compact('stn','ktg','use'));
    }

    public function bcreate()
    {
        $use = User::get();
        $stn = Satuan::get();
        $ktg = Kategori::get();
        return view('bidang-b.create',compact('stn','ktg','use'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::where('uuid', $id)->firstOrFail();
        $usr = User::get();
        $stn = Satuan::get();
        $ktg = Kategori::get();
        return view('barang.edit', compact('barang','usr','stn','ktg'));
    }

    public function bedit($id)
    {
        $barang = Barang::where('uuid', $id)->firstOrFail();
        $usr = User::get();
        $stn = Satuan::get();
        $ktg = Kategori::get();
        return view('bidang-b.edit', compact('barang','usr','stn','ktg'));
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
            'tahun' => 'required',
        ]);
        $brg =  \App\Models\Barang::find($id);
        $brg->user_id = $request->user_id;
        $brg->satuan_id = $request->satuan_id;
        $brg->kategori_id = $request->kategori_id;
        $brg->name = $request->name;
        $brg->harga = $request->harga;
        $brg->jumlah = $request->jumlah;
        $brg->stock = $request->stock;
        $brg->tahun = $request->tahun;
        $brg->save();

        return redirect()->route('barang.index')->with('success','Company has been created successfully.');
    }

    public function bupdate(Request $request, $id)
    {

        $request->validate([
             'user_id' => 'required',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'stock' => 'required',
            'tahun' => 'required',
        ]);
        $brg =  \App\Models\Barang::find($id);
        $brg->user_id = $request->user_id;
        $brg->satuan_id = $request->satuan_id;
        $brg->kategori_id = $request->kategori_id;
        $brg->name = $request->name;
        $brg->harga = $request->harga;
        $brg->jumlah = $request->jumlah;
        $brg->stock = $request->stock;
        $brg->tahun = $request->tahun;
        $brg->save();

        return redirect()->route('barang.bindex')->with('success','Company has been created successfully.');
    }
    // public function show(Barang $barang)
    // {
    //     return view('barang.show',compact('barang'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangs= Barang::find($id);
        $barangs->delete();
        return redirect()->route('barang.index')->with('success','Company has been deleted successfully');
    }

    public function bdestroy($id)
    {
        $barangs= Barang::find($id);
        $barangs->delete();
        return redirect()->route('barang.bindex')->with('success','Company has been deleted successfully');
    }

//-------------------------------------------------------------------------------------------------------
//EX
public function export()
    {

        return Excel::download(new BarangExport, 'barang.xlsx' );
    }



public function exportbid()
    {

        return Excel::download(new BarangbidExport, 'barang-bidang.xlsx' );
    }

}
