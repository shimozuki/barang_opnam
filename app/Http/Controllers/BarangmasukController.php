<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Barangmasuk;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\BarangmasukExport;
use App\Exports\BarangkeluarExport;
use App\Exports\BarangmasukbidExport;
use Maatwebsite\Excel\Facades\excel;
class BarangmasukController extends Controller
{
public function index()
{
    $barang = Barang::get();
    $barang_masuk= Barangmasuk::orderBy('id', 'desc')->get();
    // $now = Carbon::now();
    // $thnBulan = $now->year . $now->month;
    // $cek = Barangmasuk::count();
    // if ($cek == 0 ){
    //     $urut = 10000001;
    //     $nomer = 'BM' .$thnBulan . $urut;
    //     // dd($nomer);
    // }else {
    //     $ambil = Barangmasuk::all()->last();
    //     $urut = (int)substr($ambil->kode, -8) +1;
    //     $nomer = 'BM' .$thnBulan . $urut;
    // }
    // // echo 'sdas';
    return view('barang_masuk.index', compact('barang_masuk','barang'));
}

public function store(Request $request)
{
    $request->validate([

        'user_id' => 'required',

        'barang_id' => 'required',
        'jml' => 'required',

    ]);
    $store = new \App\Models\Barangmasuk();
    $store->user_id = $request->user_id;
    $store->barang_id = $request->barang_id;

$store->jml = $request->jml;
    $store->save();
    return redirect()->route('barang_masuk.index')->with('success','Company has been created successfully.');
}

    public function create()
    {   $use = User::get();
        $brg = Barang::get();

        return view('barang_masuk.create',compact('brg','use'));
    }

    public function edit($id)
    {
        $barang_masuk = Barangmasuk::where('uuid', $id)->firstOrFail();
        $barang = Barang::get();
        return view('barang_masuk.edit', compact('barang','barang_masuk'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            //  'user_id' => 'required',
        'barang_id' => 'required',
        'jml' => 'required',

    ]);
        $masuk =  \App\Models\Barangmasuk::find($id);
        $masuk->barang_id = $request->barang_id;
        $masuk->jml = $request->jml;

        $masuk->save();

        return redirect()->route('barang_masuk.index')->with('success','Company has been created successfully.');
    }
    public function destroy($id)
    {
        $masuk= Barangmasuk::find($id);
        $masuk->delete();
        return redirect()->route('barang_masuk.index')->with('success','Company has been deleted successfully');
    }
    public function export()
    {

        return Excel::download(new BarangmasukExport, 'barang-masuk.xlsx' );
    }


//---------------------------------------------------------------------------------------------------------------------------------------------------//
    ///BIDANG
    public function bcreate()
    {
        $use = User::get();
        $brg = Barang::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

    // echo 'sdas';
        return view('barang_masukbid.create',compact('brg','use'));
    }
    public function bstore(Request $request)
    {
        $request->validate([

            'user_id' => 'required',
            'barang_id' => 'required',

            'jml' => 'required',

        ]);
        $store = new \App\Models\Barangmasuk();
        $store->user_id = $request->user_id;
        $store->barang_id = $request->barang_id;

    $store->jml = $request->jml;
        $store->save();
        return redirect()->route('barang_masuk.bindex')->with('success','Company has been created successfully.');
    }
    public function bindex()
    {
        // $use = User::get();
        $barang = Barang::get();
        $barang_masuk= Barangmasuk::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('barang_masukbid.index', compact('barang_masuk','barang'));
    }
    public function bedit($id)
    {
        $barang_masuk = Barangmasuk::where('uuid', $id)->firstOrFail();
        $barang = Barang::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('barang_masukbid.edit', compact('barang','barang_masuk'));
    }
    public function bupdate(Request $request, $id)
    {

        $request->validate([
            //  'user_id' => 'required',
        'barang_id' => 'required',
        'jml' => 'required',

    ]);
        $masuk =  \App\Models\Barangmasuk::find($id);
        $masuk->barang_id = $request->barang_id;
        $masuk->jml = $request->jml;

        $masuk->save();

        return redirect()->route('barang_masuk.bindex')->with('success','Company has been created successfully.');
    }
    public function bdestroy($id)
    {
        $masuk= Barangmasuk::find($id);
        $masuk->delete();
        return redirect()->route('barang_masuk.bindex')->with('success','Company has been deleted successfully');
    }
    public function exportmsk()
    {

        return Excel::download(new BarangmasukbidExport, 'barang-masuk.xlsx' );
    }


    //---------------------------------------------------------------------------------------------------------------------------------------------------//
    public function aindex()
    {
        $barang = Barang::get();
        $barang_masuk= Barangmasuk::orderBy('id', 'desc')->get();
        // $now = Carbon::now();
        // $thnBulan = $now->year . $now->month;
        // $cek = Barangmasuk::count();
        // if ($cek == 0 ){
        //     $urut = 10000001;
        //     $nomer = 'BM' .$thnBulan . $urut;
        //     // dd($nomer);
        // }else {
        //     $ambil = Barangmasuk::all()->last();
        //     $urut = (int)substr($ambil->kode, -8) +1;
        //     $nomer = 'BM' .$thnBulan . $urut;
        // }
        // // echo 'sdas';
        return view('barang_masuk_admin.index', compact('barang_masuk','barang'));
    }

    public function astore(Request $request)
    {
        $request->validate([

            'user_id' => 'required',

            'barang_id' => 'required',
            'jml' => 'required',

        ]);
        $store = new \App\Models\Barangmasuk();
        $store->user_id = $request->user_id;
        $store->barang_id = $request->barang_id;

    $store->jml = $request->jml;
        $store->save();
        return redirect()->route('barang_masuk.aindex')->with('success','Company has been created successfully.');
    }

        public function acreate()
        {   $use = User::get();
            $brg = Barang::get();

            return view('barang_masuk_admin.create',compact('brg','use'));
        }

        public function aedit($id)
        {
            $barang_masuk = Barangmasuk::where('uuid', $id)->firstOrFail();
            $barang = Barang::get();
            return view('barang_masuk_admin.edit', compact('barang','barang_masuk'));
        }
        public function aupdate(Request $request, $id)
        {

            $request->validate([
                //  'user_id' => 'required',
            'barang_id' => 'required',
            'jml' => 'required',

        ]);
            $masuk =  \App\Models\Barangmasuk::find($id);
            $masuk->barang_id = $request->barang_id;
            $masuk->jml = $request->jml;

            $masuk->save();

            return redirect()->route('barang_masuk.aindex')->with('success','Company has been created successfully.');
        }
        public function adestroy($id)
        {
            $masuk= Barangmasuk::find($id);
            $masuk->delete();
            return redirect()->route('barang_masuk.aindex')->with('success','Company has been deleted successfully');
        }
        public function aexport()
        {

            return Excel::download(new BarangmasukExport, 'barang-masuk.xlsx' );
        }


}

