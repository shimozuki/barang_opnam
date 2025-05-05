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
                              <a href="" onclick="this.href='bidang-pdf/'+ document.getElementById('start_date').value +
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
                                <input type="date" class="form-control" id="dari" name="dari"  >

                              </div>
                              <div class="form-group">
                                <label class="font-weight-bold">Tanggal akhir</label>
                                <input type="date" class="form-control" id="mana" name="mana"  >

                              </div>
                              <a href="" onclick="this.href='masuk-pdf/'+ document.getElementById('dari').value +
                                '/' + document.getElementById('mana').value"
                                target="_blank" class="btn btn-sm btn-primary">cetak</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="card-title" >Barang keluar</div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal awal</label>
                                <input type="date" class="form-control" id="disini" name="disini"  >

                              </div>
                              <div class="form-group">
                                <label class="font-weight-bold">Tanggal akhir</label>
                                <input type="date" class="form-control" id="disana" name="disana"  >

                              </div>
                              <a href="" onclick="this.href='keluar-pdf/'+ document.getElementById('disini').value +
                                '/' + document.getElementById('disana').value"
                                target="_blank" class="btn btn-sm btn-primary">cetak</a>
                        </div>
                    </div>
                </div>

            </div>

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




