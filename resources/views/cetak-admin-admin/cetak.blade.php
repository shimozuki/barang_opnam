@extends('Temp.app', ['title' => 'Halaman pegawai', 'page_heading' => 'Daftar pegawai'])

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Laporan</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Report</a>
                    </li>

                </ul>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="card-title" >Barang</div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal awal</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"  >

                              </div>
                              <div class="form-group">
                                <label class="font-weight-bold">Tanggal akhir</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"  >

                              </div>
                              <a href="" onclick="this.href='barang-pdf-admin/'+ document.getElementById('start_date').value +
                                '/' + document.getElementById('end_date').value"
                                target="_blank" class="btn btn-sm btn-primary">cetak</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="card-title" >Barang Masuk</div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal awal</label>
                                <input type="date" class="form-control" id="start" name="start"  >

                              </div>
                              <div class="form-group">
                                <label class="font-weight-bold">Tanggal akhir</label>
                                <input type="date" class="form-control" id="end" name="end"  >

                              </div>
                              <a href="" onclick="this.href='barang-masuk-pdf-admin/'+ document.getElementById('start').value +
                                '/' + document.getElementById('end').value"
                                target="_blank" class="btn btn-sm btn-primary">cetak</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="card-title" >Barang Keluar</div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal awal</label>
                                <input type="date" class="form-control" id="mulai" name="mulai"  >

                              </div>
                              <div class="form-group">
                                <label class="font-weight-bold">Tanggal akhir</label>
                                <input type="date" class="form-control" id="sampai" name="sampai"  >

                              </div>
                              <a href="" onclick="this.href='barang-keluar-pdf-admin/'+ document.getElementById('mulai').value +
                                '/' + document.getElementById('sampai').value"
                                target="_blank" class="btn btn-sm btn-primary">cetak</a>

                        </div>
                    </div>
                </div>

            </div>


{{-- <div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <form action="/kategori-laporan" method="GET">
                    <div class="input-group">
                        <input type="date" class="form-control" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-primary"  type="submit">GET</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div> --}}
</div>

<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>

	<script >
		$(document).ready(function() {

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});
		});
	</script>

@endsection




