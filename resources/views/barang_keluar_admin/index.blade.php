@extends('Temp.app', ['title' => 'Halaman pegawai', 'page_heading' => 'Daftar pegawai'])

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data</h4>
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
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Barang keluar</a>
                    </li>
                </ul>
            </div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">

                <a href="{{ route('barangkeluar.acreate') }}">
                    <button class="btn btn-primary btn-round ml-auto" >
                    Create Data
                </button>
            </a>
            </div>
        </div>
        <div class="card-body">


            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-head-bg-info table-hover" >
                    <thead>
                        <tr>
                            <th scope="col">No</th>

                            <th scope="col">BIDANG</th>
                            <th scope="col">BARANG </th>
                            <th scope="col">JUMLAH KELUAR</th>
                            <th scope="col">JUMLAH BARANG</th>
                            <th scope="col">PAGU </th>
                            <th scope="col">TUJUAN </th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barang_keluar as $no => $post)
                        <tr>

                            <th>{{ ++$no }}</th>

                            <td>{{ $post->barang->user->name }}</td>
                            <td>{{ $post->barang->name }}</td>
                            <td>{{ $post->jml }}</td>
                            <td>{{ $post->barang->jumlah }}</td>
                            <td>Rp.{{ number_format ($post->barang->stock) }}</td>
                            <td>{{ $post->tujuan }}</td>


                            {{-- <td>{{ $post->satuans->name }}</td>
                            <td>{{ $post->kategoris->name }}</td> --}}

                            <td class="text-center" nowrap>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangkeluar.adestroy', $post->id) }}" method="Post">
                                    <a href="/barang-keluar-admin/{{ $post->uuid }}" class="btn btn-sm btn-warning">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>

                            </td>
                        </tr>
                      @empty
                          <div class="alert alert-danger">
                              Data belum Tersedia.
                          </div>
                      @endforelse
                    </tbody>
                </table>
                {{-- <a href="{{ route('barang.exportkeluar') }}" class="btn btn-sm btn-dark" >
                    <i class="fa fa-print"></i>
                    export
                </a> --}}
            </div>
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

