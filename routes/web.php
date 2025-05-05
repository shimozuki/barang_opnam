<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;

use Carbon\Carbon;

//  jika user belum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
});

//ALL
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/Home', [HomeController::class, 'index']);
    //----------
    //  Edit Profil ALL
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    ///----------
    // Data Satuan
    Route::get('/satuan', [App\Http\Controllers\SatuanController::class, 'index'])->name('satuan.index');
    Route::get('satuan/create', [App\Http\Controllers\SatuanController::class, 'create'])->name('satuan.create');
    Route::post('satuan/store', [App\Http\Controllers\SatuanController::class, 'store'])->name('satuan.store');
    Route::get('satuan/{satuan}', [App\Http\Controllers\SatuanController::class, 'edit'])->name('satuan.edit');
    Route::patch('satuan/{satuan}/edit', [App\Http\Controllers\SatuanController::class, 'update'])->name('satuan.update');
    Route::delete('satuan/{satuan}', [App\Http\Controllers\SatuanController::class, 'destroy'])->name('satuan.destroy');
    //----------
    //Data kategori
    Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [App\Http\Controllers\KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori/store', [App\Http\Controllers\KategoriController::class, 'store'])->name('kategori.store');
    Route::get('kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('kategori.edit');
    Route::patch('kategori/{kategori}/edit', [App\Http\Controllers\KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('kategori.destroy');
    //-------
    ///excel
    Route::post('/kategori-import', [App\Http\Controllers\KategoriController::class, 'import'])->name('kategori.import');
    Route::get('/kategori-export', [App\Http\Controllers\KategoriController::class, 'export'])->name('kategori.export');
});
//Route::get('/redirect', [RedirectController::class, 'cek']);
// Route::get('/barangs', [App\Http\Controllers\BarangController::class, 'barang'])->name('barang.barang');
// Route::get('/barang/create', [App\Http\Controllers\BarangController::class, 'create'])->name('barang.create');
// Route::post('/barang/create', [App\Http\Controllers\BarangController::class, 'store'])->name('barang.store');
// Route::patch('/barangs/edits', [App\Http\Controllers\BarangController::class, 'edits'])->name('barang.edits');


//ADMIN
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    // Route::get('/autocomplete-search', [App\Http\Controllers\BarangmasukController::class, 'autocompleteSearch'])->name('barang_masuk.autocompleteSearch');
    Route::get('/Superadmin', [SuperadminController::class, 'index']);
    Route::get('/redirect', [RedirectController::class, 'cek']);

    //pdf
    Route::get('/Laporan', [PDFController::class, 'index'])->name('laporan.index');
    Route::get('barangbrg-pdf/{start_date}/{end_date}', [PDFController::class, 'cetak_pdf'])->name('barang.cetak_pdf');
    Route::get('barang-pdf/{start_date}/{end_date}', [PDFController::class, 'cetakbarang'])->name('barang.cetakbarang');
    Route::get('barang-masuk-pdf/{start}/{end}', [PDFController::class, 'bidangmasuk'])->name('barang.bidangmasuk');
    Route::get('barang-keluar-pdf/{mulai}/{sampai}', [PDFController::class, 'bidangkeluar'])->name('barang.bidangkeluar');

    //excel

    Route::get('/barang-export', [App\Http\Controllers\BarangController::class, 'export'])->name('barang.export');
    Route::get('/barang-masuk-export', [App\Http\Controllers\BarangmasukController::class, 'export'])->name('barang.export');
    Route::get('/barang-keluar-exp', [App\Http\Controllers\BarangkeluarController::class, 'exportkeluar'])->name('barang.exportkeluar');
    //pengguna
    Route::get('/pengguna', [App\Http\Controllers\PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('pengguna/create', [App\Http\Controllers\PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('pengguna/store', [App\Http\Controllers\PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('pengguna/{pengguna}', [App\Http\Controllers\PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('pengguna/update/{pengguna}', [App\Http\Controllers\PenggunaController::class, 'update']);
    Route::delete('pengguna/{pengguna}', [App\Http\Controllers\PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    ////barang
    Route::get('/barang', [App\Http\Controllers\BarangController::class, 'index'])->name('barang.index');
    Route::get('barang/create', [App\Http\Controllers\BarangController::class, 'create'])->name('barang.create');
    Route::post('barang/store', [App\Http\Controllers\BarangController::class, 'store'])->name('barang.store');
    Route::get('barang/{barang}', [App\Http\Controllers\BarangController::class, 'edit'])->name('barang.edit');
    Route::post('barang/update/{barang}', [App\Http\Controllers\BarangController::class, 'update']);
    Route::delete('barang/{barang}', [App\Http\Controllers\BarangController::class, 'destroy'])->name('barang.destroy');
    //barangmasuk
    Route::get('/barang-masuk', [App\Http\Controllers\BarangmasukController::class, 'index'])->name('barang_masuk.index');
    Route::get('barang-masuk/create', [App\Http\Controllers\BarangmasukController::class, 'create'])->name('barang_masuk.create');
    Route::post('barang-masuk/store', [App\Http\Controllers\BarangmasukController::class, 'store'])->name('barangmasuk.store');
    Route::get('barang-masuk/{barang}', [App\Http\Controllers\BarangmasukController::class, 'edit'])->name('barangmasuk.edit');
    Route::post('barang-masuk/update/{barang}', [App\Http\Controllers\BarangmasukController::class, 'update']);
    Route::delete('barang-masuk/{barang}', [App\Http\Controllers\BarangmasukController::class, 'destroy'])->name('barangmasuk.destroy');
    //barangkeluar
    Route::get('/barang-keluar', [App\Http\Controllers\BarangkeluarController::class, 'index'])->name('barangkeluar.index');
    Route::get('barang-keluar/create', [App\Http\Controllers\BarangkeluarController::class, 'create'])->name('barangkeluar.create');
    Route::post('barang-keluar/store', [App\Http\Controllers\BarangkeluarController::class, 'store'])->name('barangkeluar.store');
    Route::get('barang-keluar/{barang}', [App\Http\Controllers\BarangkeluarController::class, 'edit'])->name('barangkeluar.edit');
    Route::post('barang-keluar/update/{barang}', [App\Http\Controllers\BarangkeluarController::class, 'update']);
    Route::delete('barang-keluar/{barang}', [App\Http\Controllers\BarangkeluarController::class, 'destroy'])->name('barangkeluar.destroy');
});

// Route::get('/ADMIN', [PegawaiController::class, 'index']);

//     // Route::resource('/ruang', \App\Http\Controllers\RuangController::class);
//     //Pegawai admin
//     Route::get('/ADMIN', [PegawaiController::class, 'index']);
///halaman Dasboard

// Route::resource('/satuan', \App\Http\Controllers\SatuanController::class);
// // Route::get('/satuan', [App\Http\Controllers\SatuanController::class, 'index'])->name('satuan.index');
// // Route::get('/satuan/create', [App\Http\Controllers\SatuanController::class, 'create'])->name('satuan.create');
// Route::get('/satuan/edit/{id}', [App\Http\Controllers\SatuanController::class, 'edit'])->name('satuan.edit');
// Route::patch('/satuan/update/{id}', [App\Http\Controllers\SatuanController::class, 'update']);


//HOME
// Route::get('/Home', [HomeController::class, 'Home']);
// // cetak
// // Route::get('/kategori-laporan', function () {
// //     if (request()->start_date || request()->end_date) {
// //         $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
// //         $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
// //         $data = App\Models\Kategori::whereBetween('created_at',[$start_date,$end_date])->get();
// //     } else {
// //         $data = App\Models\Kategori::latest()->get();
// //     }

// //     return view('cetak.cetak', compact('data'));});
// //pdf
// Route::get('kategori-pdf', [PDFController::class, 'generatePDF'])->name('kategori.generatePDF');
// BIDANG
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/Dashboard-bidang', [PegawaiController::class, 'index']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
    //barang
    Route::get('/Barang-bidang', [App\Http\Controllers\BarangController::class, 'bindex'])->name('barang.bindex');
    Route::get('/Barang-bidang/create', [App\Http\Controllers\BarangController::class, 'bcreate'])->name('barang.bcreate');
    Route::post('/barang-bidang/store', [App\Http\Controllers\BarangController::class, 'bstore'])->name('barang.bstore');
    Route::get('/barang-bidang/{barang}', [App\Http\Controllers\BarangController::class, 'bedit'])->name('barang.bedit');
    Route::post('/barang-bidang/update/{barang}', [App\Http\Controllers\BarangController::class, 'bupdate']);
    Route::delete('/barang-bidang/{barang}', [App\Http\Controllers\BarangController::class, 'bdestroy'])->name('barang.bdestroy');

    Route::get('/barang-masuk-bidang', [App\Http\Controllers\BarangmasukController::class, 'bindex'])->name('barang_masuk.bindex');

    Route::get('barang-masuk-bidang/create', [App\Http\Controllers\BarangmasukController::class, 'bcreate'])->name('barang_masuk.bcreate');
    Route::post('barang-masuk-bidang/store', [App\Http\Controllers\BarangmasukController::class, 'bstore'])->name('barangmasuk.bstore');
    Route::get('barang-masuk-bidang/{barang}', [App\Http\Controllers\BarangmasukController::class, 'bedit'])->name('barangmasuk.bedit');
    Route::post('barang-masuk-bidang/update/{barang}', [App\Http\Controllers\BarangmasukController::class, 'bupdate']);
    Route::delete('barang-masuk-bidang/{barang}', [App\Http\Controllers\BarangmasukController::class, 'bdestroy'])->name('barangmasuk.bdestroy');

    Route::get('/barang-keluar-bidang', [App\Http\Controllers\BarangkeluarController::class, 'kindex'])->name('barangkeluar.kindex');
    Route::get('barang-keluar-bidang/create', [App\Http\Controllers\BarangkeluarController::class, 'kcreate'])->name('barangkeluar.kcreate');
    Route::post('barang-keluar-bidang/store', [App\Http\Controllers\BarangkeluarController::class, 'kstore'])->name('barangkeluar.kstore');
    Route::get('barang-keluar-bidang/{barang}', [App\Http\Controllers\BarangkeluarController::class, 'kedit'])->name('barangkeluar.kedit');
    Route::post('barang-keluar-bidang/update/{barang}', [App\Http\Controllers\BarangkeluarController::class, 'kupdate']);
    Route::delete('barang-keluar-bidang/{barang}', [App\Http\Controllers\BarangkeluarController::class, 'kdestroy'])->name('barangkeluar.kdestroy');

    //excel
    Route::get('/barang-bidang-export', [App\Http\Controllers\BarangController::class, 'exportbid'])->name('barang.exportbid');
    // Route::get('/barang-keluar-export', [App\Http\Controllers\BarangkeluarController::class, 'exportklr'])->name('barang-keluar.exportklr');
    // Route::get('/barang-masuk-export', [App\Http\Controllers\BarangmasukController::class, 'exportmsk'])->name('bidang.exportmsk');

    //pdf
    Route::get('/laporan-bidang', [PDFController::class, 'bidang'])->name('laporan.bidang');
    Route::get('bidang-pdf/{start_date}/{end_date}', [PDFController::class, 'laporan_bidang'])->name('pdf.laporan_bidang');
    Route::get('masuk-pdf/{dari}/{mana}', [PDFController::class, 'masuk_bidang'])->name('pdf.masuk_bidang');
    Route::get('keluar-pdf/{disini}/{disana}', [PDFController::class, 'keluar_bidang'])->name('pdf.keluar_bidang');
});

Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/Admin', [AdminController::class, 'index']);

    Route::get('/Laporan-admin', [PDFController::class, 'aindex'])->name('laporan.aindex');
    Route::get('barangbrg-pdf-admin/{start_date}/{end_date}', [PDFController::class, 'acetak_pdf'])->name('barang.acetak_pdf');
    Route::get('barang-pdf-admin/{start_date}/{end_date}', [PDFController::class, 'acetakbarang'])->name('barang.acetakbarang');
    Route::get('barang-masuk-pdf-admin/{start}/{end}', [PDFController::class, 'abidangmasuk'])->name('barang.abidangmasuk');
    Route::get('barang-keluar-pdf-admin/{mulai}/{sampai}', [PDFController::class, 'abidangkeluar'])->name('barang.abidangkeluar');

    //excel

    Route::get('/barang-export', [App\Http\Controllers\BarangController::class, 'export'])->name('barang.export');
    Route::get('/barang-masuk-export', [App\Http\Controllers\BarangmasukController::class, 'export'])->name('barang.exportmasuk');
    Route::get('/barang-keluar-exp', [App\Http\Controllers\BarangkeluarController::class, 'exportkeluar'])->name('barang.exportkeluar');

    ////barang
    Route::get('/barang-admin', [App\Http\Controllers\BarangController::class, 'aindex'])->name('barang-admin.aindex');
    Route::get('barang-admin/create', [App\Http\Controllers\BarangController::class, 'acreate'])->name('barang-admin.acreate');
    Route::post('barang-admin/store', [App\Http\Controllers\BarangController::class, 'astore'])->name('barang-admin.astore');
    Route::get('barang-admin/{barang}', [App\Http\Controllers\BarangController::class, 'aedit'])->name('barang-admin.aedit');
    Route::post('barang-admin/aupdate/{barang}', [App\Http\Controllers\BarangController::class, 'aupdate']);
    Route::delete('barang-admin/{barang}', [App\Http\Controllers\BarangController::class, 'adestroy'])->name('barang-admin.adestroy');
    //barangmasuk
    Route::get('/barang-masuk-admin', [App\Http\Controllers\BarangmasukController::class, 'aindex'])->name('barang_masuk.aindex');
    Route::get('barang-masuk-admin/create', [App\Http\Controllers\BarangmasukController::class, 'acreate'])->name('barang_masuk.acreate');
    Route::post('barang-masuk-admin/store', [App\Http\Controllers\BarangmasukController::class, 'astore'])->name('barangmasuk.astore');
    Route::get('barang-masuk-admin/{barang}', [App\Http\Controllers\BarangmasukController::class, 'aedit'])->name('barangmasuk.aedit');
    Route::post('barang-masuk-admin/update/{barang}', [App\Http\Controllers\BarangmasukController::class, 'aupdate']);
    Route::delete('barang-masuk-admin/{barang}', [App\Http\Controllers\BarangmasukController::class, 'adestroy'])->name('barangmasuk.adestroy');
    //barangkeluar
    Route::get('/barang-keluar-admin', [App\Http\Controllers\BarangkeluarController::class, 'aindex'])->name('barangkeluar.aindex');
    Route::get('barang-keluar-admin/create', [App\Http\Controllers\BarangkeluarController::class, 'acreate'])->name('barangkeluar.acreate');
    Route::post('barang-keluar-admin/store', [App\Http\Controllers\BarangkeluarController::class, 'astore'])->name('barangkeluar.astore');
    Route::get('barang-keluar-admin/{barang}', [App\Http\Controllers\BarangkeluarController::class, 'aedit'])->name('barangkeluar.aedit');
    Route::post('barang-keluar-admin/update/{barang}', [App\Http\Controllers\BarangkeluarController::class, 'aupdate']);
    Route::delete('barang-keluar-admin/{barang}', [App\Http\Controllers\BarangkeluarController::class, 'adestroy'])->name('barangkeluar.adestroy');
});
