<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
     {
        $user = User::findOrFail(Auth::id());
        $count = DB::table('barangs')->count();
        $brgmsk = DB::table('barang_masuks')->count();
        $brgklr = DB::table('barang_keluars')->count();
        $totalbg = Barang::sum('jumlah');
        $totals = Barang::sum('stock');
        $totalmsk = Barangmasuk::sum('jml');
        $totalklr = Barangkeluar::sum('jml');
        return view('pegawai.index',compact('user','count','brgmsk','brgklr','totals','totalmsk','totalklr','totalbg'));
    }
}
