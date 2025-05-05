<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Satuan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function index()
    {
        $user = User::get();
    $stn = Satuan::get();
    $brg = Barang::orderBy('id', 'desc')->get();
        return view('cetak-admin.cetak', compact('user', 'stn', 'brg'));
    }
    public function aindex()
    {
        $user = User::get();
    $stn = Satuan::get();
    $brg = Barang::orderBy('id', 'desc')->get();
        return view('cetak-admin-admin.cetak', compact('user', 'stn', 'brg'));
    }

    public function bidang()
    {
        $user = User::get();
    $stn = Satuan::get();
    $brg = Barang::orderBy('id', 'desc')->get();
        return view('cetak-bidang.cetak', compact('user', 'stn', 'brg'));
    }



    public function cetakbarang($start_date , $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barang::with('user','satuan','kategori')->whereBetween('created_at',[$start_date,$end_date])->get();
        $today = date("F j, Y");

        $totals = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('stock');
        $totalbg = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('jumlah');

        $totalms = Barangmasuk::whereBetween('created_at',[$start_date,$end_date])->sum('jml');
        $totalkl = Barangkeluar::whereBetween('created_at',[$start_date,$end_date])->sum('jml');
        $cek = PDF::loadView('pdf-admin.barangpdf',compact('rep','today','totals','totalbg','totalms','totalkl'));

        return $cek->stream('barang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
    public function bidangmasuk($start_date , $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barangmasuk::with('barang')->whereBetween('created_at',[$start_date,$end_date])->get();
        $today = date("F j, Y");
        $count = DB::table('barangs')->count();
        $totals = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('stock');
        // $totals = Barang::sum('stock');
        $totalbg = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('jumlah');
        $totalms = Barangmasuk::whereBetween('created_at',[$start_date,$end_date])->sum('jml');
        $cek = PDF::loadView('pdf-admin.barangmsk', compact('rep','today','count','totals','totalbg','totalms'));

        return $cek->stream('admin-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
    public function bidangkeluar($start_date , $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barangkeluar::with('barang')->whereBetween('created_at',[$start_date,$end_date])->get();
        $today = date("F j, Y");
        $count = DB::table('barangs')->count();
        $totals = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('stock');
        $totalbg = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('jumlah');
        $totalkl = Barangkeluar::whereBetween('created_at',[$start_date,$end_date])->sum('jml');
        $cek = PDF::loadView('pdf-admin.barangklr', compact('rep','today','count','totals','totalbg','totalkl'));

        return $cek->stream('admin-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }



//admin

public function acetakbarang($start_date , $end_date)
{
    // dd([$start_date, $end_date]);
    $rep = Barang::with('user','satuan','kategori')->whereBetween('created_at',[$start_date,$end_date])->get();
    $today = date("F j, Y");

    $totals = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('stock');
    $totalbg = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('jumlah');

    $totalms = Barangmasuk::whereBetween('created_at',[$start_date,$end_date])->sum('jml');
    $totalkl = Barangkeluar::whereBetween('created_at',[$start_date,$end_date])->sum('jml');
    $cek = PDF::loadView('pdf-admin.barangpdf',compact('rep','today','totals','totalbg','totalms','totalkl'));

    return $cek->stream('barang.pdf');
    //return view('barangpdf', compact('rep','data'));
}
public function abidangmasuk($start_date , $end_date)
{
    // dd([$start_date, $end_date]);
    $rep = Barangmasuk::with('barang')->whereBetween('created_at',[$start_date,$end_date])->get();
    $today = date("F j, Y");
    $count = DB::table('barangs')->count();
    $totals = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('stock');
    // $totals = Barang::sum('stock');
    $totalbg = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('jumlah');
    // $data = DB::table('barang_masuks')
    // ->leftJoin('barangs', 'barang_masuks.id', '=', 'barangs.barang_masuk_id')
    // ->get();
    $totalms = Barangmasuk::whereBetween('created_at',[$start_date,$end_date])->sum('jml');
    $cek = PDF::loadView('pdf-admin.barangmsk', compact('rep','today','count','totals','totalbg','totalms'));

    return $cek->stream('admin-bidang.pdf');
    //return view('barangpdf', compact('rep','data'));
}
public function abidangkeluar($start_date , $end_date)
{
    // dd([$start_date, $end_date]);
    $rep = Barangkeluar::with('barang')->whereBetween('created_at',[$start_date,$end_date])->get();
    $today = date("F j, Y");
    $count = DB::table('barangs')->count();
    $totals = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('stock');
    $totalbg = Barang::whereBetween('created_at',[$start_date,$end_date])->sum('jumlah');
    $totalkl = Barangkeluar::whereBetween('created_at',[$start_date,$end_date])->sum('jml');
    $cek = PDF::loadView('pdf-admin.barangklr', compact('rep','today','count','totals','totalbg','totalkl'));

    return $cek->stream('admin-bidang.pdf');
    //return view('barangpdf', compact('rep','data'));
}



    //BIDANG PDF
    public function laporan_bidang($start_date , $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barang::where('user_id', Auth::user()->id)->with('user','satuan','kategori')->whereBetween('created_at',[$start_date,$end_date])->get();
        $today = date("F j, Y");

        $totals = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at',[$start_date,$end_date])->sum('stock');
        $totalbg = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at',[$start_date,$end_date])->sum('jumlah');
        $cek = PDF::loadView('pdf-bidang.bidangpdf',  compact('rep','today','totalbg','totals'));

        return $cek->stream('barang-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
    public function masuk_bidang($start_date , $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barangmasuk::where('user_id', Auth::user()->id)->with('barang')->whereBetween('created_at',[$start_date,$end_date])->get();
        $today = date("F j, Y");

        $totals = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at',[$start_date,$end_date])->sum('stock');
        $totalbg = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at',[$start_date,$end_date])->sum('jumlah');
        $totalms = Barangmasuk::where('user_id', Auth::user()->id)->whereBetween('created_at',[$start_date,$end_date])->sum('jml');
        $cek = PDF::loadView('pdf-bidang.masukpdf', compact('rep','today','totalbg','totalms','totals'));

        return $cek->stream('masuk-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
    public function keluar_bidang($start_date , $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barangkeluar::where('user_id', Auth::user()->id)->with('barang')->whereBetween('created_at',[$start_date,$end_date])->get();
        $today = date("F j, Y");

        $totals = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at',[$start_date,$end_date])->sum('stock');
        $totalbg = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at',[$start_date,$end_date])->sum('jumlah');
        $totalkl = Barangkeluar::where('user_id', Auth::user()->id)->whereBetween('created_at',[$start_date,$end_date])->sum('jml');
        $cek = PDF::loadView('pdf-bidang.keluarpdf',  compact('rep','today','totalbg','totalkl','totals'));

        return $cek->stream('keluar-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
}
