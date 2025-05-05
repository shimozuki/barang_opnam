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

class SuperadminController extends Controller
{
    public function index()
     {
        $user = User::findOrFail(Auth::id());
        $count = DB::table('barangs')->count();
        $brgmsk = DB::table('barang_masuks')->count();
        $brgklr = DB::table('barang_keluars')->count();
        $user = DB::table('users')->count();
        $totalbg = Barang::sum('jumlah');
        $totals = Barang::sum('stock');
        $totalmsk = Barangmasuk::sum('jml');
        $totalklr = Barangkeluar::sum('jml');
    //     $totalmsk = DB::table('barang_masuks')
    //         ->select(DB::raw('SUM(barang_masuks.jml * barangs.harga) as baru'))
    //         ->join('barangs', 'barangs.id', '=', 'barang_masuks.barang_id')
    //         ->get()
    //         ->first()
    //         ->baru;
	// $totalklr = DB::table('barang_keluars')
    //         ->select(DB::raw('SUM(barang_keluars.jml * barangs.harga) as baru'))
    //         ->join('barangs', 'barangs.id', '=', 'barang_keluars.barang_id')
    //         ->get()
    //         ->first()
    //         ->baru;

        // $totar = DB::table('barangs')
        // ->join('barang_masuks', 'barangs.id', '=', 'barang_masuks.barang_id')
        // ->select('barangs.stock as stock', DB::raw("count(barang_masuks.barang_id) as count"))
        // ->get();



    // $totalmsk = Barangmasuk::sum('stock');
        return view('superadmin.index', compact('user','count','brgmsk','brgklr','user','totals','totalmsk','totalklr','totalbg'));
    }
}
