@extends('Temp.app', ['title' => 'Halaman pegawai', 'page_heading' => 'Daftar pegawai'])

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">{{ Auth::user()->name}}</h5>
            </div>

        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-success mr-3">
                        <i class="fas fa-th-list"></i>
                    </span>
                    <div>
                        <h5 class="mb-1"><b><a href="">{{$totalbg}} <small>barang</small></a></b></h5>
                        <small class="text-muted">Report Barang</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-warning mr-3">
                        <i class="fas fa-file-import"></i>
                    </span>
                    <div>
                        <h5 class="mb-1"><b><a href="">{{$totalmsk}} <small>Barang Masuk</small></a></b></h5>
                        <small class="text-muted">Report Barang Masuk</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-danger mr-3">
                        <i class="fas fa-file-export"></i>
                    </span>
                    <div>
                        <h5 class="mb-1"><b><a href="">{{$totalklr}} <small>Barang Keluar</small></a></b></h5>
                        <small class="text-muted">Report Barang Keluar</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-primary mr-3">
                        <i class="fas fa-wallet"></i>
                    </span>
                    <div>
                        <h5 class="mb-1"><b><a href="">Rp.{{number_format ($totals)}} <small> Pagu</small></a></b></h5>
                        <small class="text-muted">Report Pagu Barang</small>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
