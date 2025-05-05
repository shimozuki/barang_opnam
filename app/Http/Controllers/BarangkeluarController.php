<?php

namespace App\Http\Controllers;
use App\Models\Barangkeluar;
use App\Models\Barang;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\BarangkeluarExport;
use App\Exports\BarangkeluarbidExport;
use Maatwebsite\Excel\Facades\excel;

class BarangkeluarController extends Controller
{
    public function index()
    {
        $barang = Barang::get();
        $barang_keluar= Barangkeluar::orderBy('id', 'desc')->get();
        return view('barang_keluar.index', compact('barang_keluar','barang'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'tujuan' => 'required',
            'jml' => 'required',

        ]);
        $store = new \App\Models\Barangkeluar();
        $store->barang_id = $request->barang_id;
        $store->tujuan = $request->tujuan;
        $store->jml = $request->jml;
        $store->save();
        return redirect()->route('barangkeluar.index')->with('success','Company has been created successfully.');
    }
        public function create()
        {
            $brg = Barang::get();
             //nomorkode:
            //  $now = Carbon::now();
            //  $thnBulan = $now->month . $now->year . $now->day;
            //  $cek = Barangkeluar::count();
            //  if ($cek == 0 ){
            //      $urut = 100001;
            //      $nomer = 'BK' .$thnBulan . $urut;
            //      // dd($nomer);
            //  }else {
            //      $ambil = Barangkeluar::all()->last();
            //      $urut = (int)substr($ambil->kode, -6) +1;
            //      $nomer = 'BK' .$thnBulan . $urut;
            //  }
             // echo 'sdas';
            return view('barang_keluar.create',compact('brg'));
        }
        public function edit($id)
        {
            $barang_keluar = Barangkeluar::where('uuid', $id)->firstOrFail();
            $barang = Barang::get();
            return view('barang_keluar.edit', compact('barang','barang_keluar'));
        }
        public function update(Request $request, $id)
        {

            $request->validate([
                //  'user_id' => 'required',
            'barang_id' => 'required',
            'jml' => 'required',
            'tujuan' => 'required',

        ]);
            $masuk =  \App\Models\Barangkeluar::find($id);
            $masuk->barang_id = $request->barang_id;
            $masuk->jml = $request->jml;
            $masuk->tujuan = $request->tujuan;

            $masuk->save();

            return redirect()->route('barangkeluar.index')->with('success','Company has been created successfully.');
        }
        public function destroy($id)
        {
            $masuk= Barangkeluar::find($id);
            $masuk->delete();
            return redirect()->route('barangkeluar.index')->with('success','Company has been deleted successfully');
        }

        public function exportkeluar()
        {

            return Excel::download(new BarangkeluarExport, 'barang-keluar.xlsx' );
        }
//-----------------------------------------------------------------------------------------------------------------------------///
        //BIDANG

        public function kindex()
    {
        $use = User::get();
        $barang = Barang::get();
        $barang_keluar= Barangkeluar::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('barang_keluarbid.index', compact('barang_keluar','barang'));
    }
    public function kstore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'barang_id' => 'required',
            'tujuan' => 'required',
            'jml' => 'required',

        ]);
        $store = new \App\Models\Barangkeluar();
        $store->user_id = $request->user_id;
        $store->barang_id = $request->barang_id;
        $store->tujuan = $request->tujuan;

        $store->jml = $request->jml;
        $store->save();
        return redirect()->route('barangkeluar.kindex')->with('success','Company has been created successfully.');
    }
        public function kcreate()
        {
            $use = User::get();
            $brg = Barang::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

            //  //nomorkode:
            //  $now = Carbon::now();
            //  $thnBulan = $now->month . $now->year . $now->day;
            //  $cek = Barangkeluar::count();
            //  if ($cek == 0 ){
            //      $urut = 100001;
            //      $nomer = 'BK' .$thnBulan . $urut;
            //      // dd($nomer);
            //  }else {
            //      $ambil = Barangkeluar::all()->last();
            //      $urut = (int)substr($ambil->kode, -6) +1;
            //      $nomer = 'BK' .$thnBulan . $urut;
            //  }
             // echo 'sdas';
            return view('barang_keluarbid.create',compact('brg','use'));
        }
        public function kedit($id)
        {
            $barang_keluar = Barangkeluar::where('uuid', $id)->firstOrFail();
            $barang = Barang::get();
            return view('barang_keluarbid.edit', compact('barang','barang_keluar'));
        }
        public function kupdate(Request $request, $id)
        {

            $request->validate([
                //  'user_id' => 'required',
            'barang_id' => 'required',
            'jml' => 'required',
            'tujuan' => 'required',

        ]);
            $keluar =  \App\Models\Barangkeluar::find($id);
            $keluar->barang_id = $request->barang_id;
            $keluar->jml = $request->jml;
            $keluar->tujuan = $request->tujuan;
            $keluar->save();

            return redirect()->route('barangkeluar.kindex')->with('success','Company has been created successfully.');
        }
        public function kdestroy($id)
        {
            $keluar= Barangkeluar::find($id);
            $keluar->delete();
            return redirect()->route('barangkeluar.kindex')->with('success','Company has been deleted successfully');
        }
        public function exportklr()
        {

            return Excel::download(new BarangkeluarbidExport, 'barang-keluar.xlsx' );
        }
//admin
public function aindex()
{
    $barang = Barang::get();
    $barang_keluar= Barangkeluar::orderBy('id', 'desc')->get();
    return view('barang_keluar_admin.index', compact('barang_keluar','barang'));
}
public function astore(Request $request)
{
    $request->validate([
        'barang_id' => 'required',
        'tujuan' => 'required',
        'jml' => 'required',

    ]);
    $store = new \App\Models\Barangkeluar();
    $store->barang_id = $request->barang_id;
    $store->tujuan = $request->tujuan;
    $store->jml = $request->jml;
    $store->save();
    return redirect()->route('barangkeluar.aindex')->with('success','Company has been created successfully.');
}
    public function acreate()
    {
        $brg = Barang::get();
         //nomorkode:
        //  $now = Carbon::now();
        //  $thnBulan = $now->month . $now->year . $now->day;
        //  $cek = Barangkeluar::count();
        //  if ($cek == 0 ){
        //      $urut = 100001;
        //      $nomer = 'BK' .$thnBulan . $urut;
        //      // dd($nomer);
        //  }else {
        //      $ambil = Barangkeluar::all()->last();
        //      $urut = (int)substr($ambil->kode, -6) +1;
        //      $nomer = 'BK' .$thnBulan . $urut;
        //  }
         // echo 'sdas';
        return view('barang_keluar_admin.create',compact('brg'));
    }
    public function aedit($id)
    {
        $barang_keluar = Barangkeluar::where('uuid', $id)->firstOrFail();
        $barang = Barang::get();
        return view('barang_keluar_admin.edit', compact('barang','barang_keluar'));
    }
    public function aupdate(Request $request, $id)
    {

        $request->validate([
            //  'user_id' => 'required',
        'barang_id' => 'required',
        'jml' => 'required',
        'tujuan' => 'required',

    ]);
        $masuk =  \App\Models\Barangkeluar::find($id);
        $masuk->barang_id = $request->barang_id;
        $masuk->jml = $request->jml;
        $masuk->tujuan = $request->tujuan;

        $masuk->save();

        return redirect()->route('barangkeluar.aindex')->with('success','Company has been created successfully.');
    }
    public function adestroy($id)
    {
        $masuk= Barangkeluar::find($id);
        $masuk->delete();
        return redirect()->route('barangkeluar.aindex')->with('success','Company has been deleted successfully');
    }

    public function aexportkeluar()
    {

        return Excel::download(new BarangkeluarExport, 'barang-keluar.xlsx' );
    }

}
