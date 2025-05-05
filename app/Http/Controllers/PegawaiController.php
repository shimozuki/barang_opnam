<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Barang;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class PegawaiController extends Controller
{
    public function index()
     {

        $user = User::findOrFail(Auth::id());
        $count = DB::table('barangs')->where('user_id', Auth::user()->id)->count();
        $brgmsk = DB::table('barang_masuks')->where('barang_id', Auth::user()->id)->count();
        $brgklr = DB::table('barang_keluars')->where('barang_id', Auth::user()->id)->count();
        $totalbg = Barang::where('user_id', Auth::user()->id)->sum('jumlah');
        $totals = Barang::where('user_id', Auth::user()->id)->sum('stock');
        $totalmsk = Barangmasuk::where('user_id', Auth::user()->id)->sum('jml');
        $totalklr = Barangkeluar::where('user_id', Auth::user()->id)->sum('jml');
        return view('pegawai.index', compact('user','count','brgmsk','brgklr','totalbg','totals','totalmsk','totalklr'));

    }
}
