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
use Carbon\Carbon;

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



    public function cetakbarang($start_date, $end_date)
    {
        // Ubah tanggal agar mencakup seluruh hari
        $start = Carbon::parse($start_date)->startOfDay();
        $end = Carbon::parse($end_date)->endOfDay();

        // Ambil data barang dalam rentang tanggal
        $rep = Barang::with('user', 'satuan', 'kategori')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        // Tanggal hari ini untuk tampilan di laporan
        $today = now()->format('d-m-Y');

        // Hitung total jumlah & stok
        $totalbg = Barang::whereBetween('created_at', [$start, $end])->sum('jumlah');
        $totals = Barang::whereBetween('created_at', [$start, $end])->sum('stock');

        // Hitung total barang masuk dan keluar
        $totalms = Barangmasuk::whereBetween('created_at', [$start, $end])->sum('jml');
        $totalkl = Barangkeluar::whereBetween('created_at', [$start, $end])->sum('jml');

        // Generate PDF dari view
        $pdf = PDF::loadView('pdf-admin.barangpdf', compact(
            'rep',
            'today',
            'totals',
            'totalbg',
            'totalms',
            'totalkl'
        ));

        return $pdf->stream('laporan-barang.pdf');
    }

    public function bidangmasuk($start_date, $end_date)
    {
        // Format tanggal ke awal dan akhir hari
        $start = Carbon::parse($start_date)->startOfDay();
        $end = Carbon::parse($end_date)->endOfDay();

        // Ambil data barang masuk
        $rep = Barangmasuk::with('barang')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        // Tanggal hari ini untuk header laporan
        $today = now()->format("d-m-Y");

        // Jumlah total barang (semua entri di tabel barangs)
        $count = DB::table('barangs')->count();

        // Total stok dan jumlah berdasarkan barang yang dibuat pada range tersebut
        $totals = Barang::whereBetween('created_at', [$start, $end])->sum('stock');
        $totalbg = Barang::whereBetween('created_at', [$start, $end])->sum('jumlah');

        // Total jumlah barang masuk dalam rentang tanggal
        $totalms = Barangmasuk::whereBetween('created_at', [$start, $end])->sum('jml');

        // Generate PDF
        $pdf = PDF::loadView('pdf-admin.barangmsk', compact(
            'rep',
            'today',
            'count',
            'totals',
            'totalbg',
            'totalms'
        ));

        return $pdf->stream('admin-bidang.pdf');
    }

    public function bidangkeluar($start_date, $end_date)
    {
        // Pastikan tanggal awal dan akhir mencakup seluruh hari
        $start = Carbon::parse($start_date)->startOfDay();
        $end = Carbon::parse($end_date)->endOfDay();

        // Ambil data barang keluar dengan relasi barang
        $rep = Barangkeluar::with('barang')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        // Informasi tambahan untuk laporan
        $today = now()->format('d-m-Y'); // Tanggal cetak hari ini
        $count = Barang::count(); // Total jenis barang
        $totals = Barang::whereBetween('created_at', [$start, $end])->sum('stock'); // Total stok dalam rentang
        $totalbg = Barang::whereBetween('created_at', [$start, $end])->sum('jumlah'); // Total jumlah
        $totalkl = Barangkeluar::whereBetween('created_at', [$start, $end])->sum('jml'); // Total keluar

        // Generate PDF
        $pdf = PDF::loadView('pdf-admin.barangklr', compact(
            'rep',
            'today',
            'count',
            'totals',
            'totalbg',
            'totalkl'
        ));

        return $pdf->stream('laporan-barang-keluar.pdf');
    }



    //admin

    public function acetakbarang($start_date, $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barang::with('user', 'satuan', 'kategori')->whereBetween('created_at', [$start_date, $end_date])->get();
        $today = date("F j, Y");

        $totals = Barang::whereBetween('created_at', [$start_date, $end_date])->sum('stock');
        $totalbg = Barang::whereBetween('created_at', [$start_date, $end_date])->sum('jumlah');

        $totalms = Barangmasuk::whereBetween('created_at', [$start_date, $end_date])->sum('jml');
        $totalkl = Barangkeluar::whereBetween('created_at', [$start_date, $end_date])->sum('jml');
        $cek = PDF::loadView('pdf-admin.barangpdf', compact('rep', 'today', 'totals', 'totalbg', 'totalms', 'totalkl'));

        return $cek->stream('barang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
    public function abidangmasuk($start_date, $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barangmasuk::with('barang')->whereBetween('created_at', [$start_date, $end_date])->get();
        $today = date("F j, Y");
        $count = DB::table('barangs')->count();
        $totals = Barang::whereBetween('created_at', [$start_date, $end_date])->sum('stock');
        // $totals = Barang::sum('stock');
        $totalbg = Barang::whereBetween('created_at', [$start_date, $end_date])->sum('jumlah');
        // $data = DB::table('barang_masuks')
        // ->leftJoin('barangs', 'barang_masuks.id', '=', 'barangs.barang_masuk_id')
        // ->get();
        $totalms = Barangmasuk::whereBetween('created_at', [$start_date, $end_date])->sum('jml');
        $cek = PDF::loadView('pdf-admin.barangmsk', compact('rep', 'today', 'count', 'totals', 'totalbg', 'totalms'));

        return $cek->stream('admin-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
    public function abidangkeluar($start_date, $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barangkeluar::with('barang')->whereBetween('created_at', [$start_date, $end_date])->get();
        $today = date("F j, Y");
        $count = DB::table('barangs')->count();
        $totals = Barang::whereBetween('created_at', [$start_date, $end_date])->sum('stock');
        $totalbg = Barang::whereBetween('created_at', [$start_date, $end_date])->sum('jumlah');
        $totalkl = Barangkeluar::whereBetween('created_at', [$start_date, $end_date])->sum('jml');
        $cek = PDF::loadView('pdf-admin.barangklr', compact('rep', 'today', 'count', 'totals', 'totalbg', 'totalkl'));

        return $cek->stream('admin-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }



    //BIDANG PDF
    public function laporan_bidang($start_date, $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barang::where('user_id', Auth::user()->id)->with('user', 'satuan', 'kategori')->whereBetween('created_at', [$start_date, $end_date])->get();
        $today = date("F j, Y");

        $totals = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at', [$start_date, $end_date])->sum('stock');
        $totalbg = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at', [$start_date, $end_date])->sum('jumlah');
        $cek = PDF::loadView('pdf-bidang.bidangpdf',  compact('rep', 'today', 'totalbg', 'totals'));

        return $cek->stream('barang-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
    public function masuk_bidang($start_date, $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barangmasuk::where('user_id', Auth::user()->id)->with('barang')->whereBetween('created_at', [$start_date, $end_date])->get();
        $today = date("F j, Y");

        $totals = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at', [$start_date, $end_date])->sum('stock');
        $totalbg = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at', [$start_date, $end_date])->sum('jumlah');
        $totalms = Barangmasuk::where('user_id', Auth::user()->id)->whereBetween('created_at', [$start_date, $end_date])->sum('jml');
        $cek = PDF::loadView('pdf-bidang.masukpdf', compact('rep', 'today', 'totalbg', 'totalms', 'totals'));

        return $cek->stream('masuk-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
    public function keluar_bidang($start_date, $end_date)
    {
        // dd([$start_date, $end_date]);
        $rep = Barangkeluar::where('user_id', Auth::user()->id)->with('barang')->whereBetween('created_at', [$start_date, $end_date])->get();
        $today = date("F j, Y");

        $totals = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at', [$start_date, $end_date])->sum('stock');
        $totalbg = Barang::where('user_id', Auth::user()->id)->whereBetween('created_at', [$start_date, $end_date])->sum('jumlah');
        $totalkl = Barangkeluar::where('user_id', Auth::user()->id)->whereBetween('created_at', [$start_date, $end_date])->sum('jml');
        $cek = PDF::loadView('pdf-bidang.keluarpdf',  compact('rep', 'today', 'totalbg', 'totalkl', 'totals'));

        return $cek->stream('keluar-bidang.pdf');
        //return view('barangpdf', compact('rep','data'));
    }
}
