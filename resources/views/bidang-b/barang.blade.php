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
                        <a href="#">Barang</a>
                    </li>
                </ul>
            </div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">

                <a href="{{ route('barang.bcreate') }}"><button class="btn btn-primary btn-round ml-auto" >

                    Create Data
                </button>
            </a>
            </div>
        </div>
        <div class="card-body">


            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-head-bg-info   table-hover" >
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                                        <th scope="col">bidang</th>
                                        {{-- <th scope="col">kategori</th>
                                        <th scope="col">satuan</th> --}}
                                        <th scope="col">barang</th>

                                        <th scope="col">harga</th>
                                        <th scope="col">pagu</th>
                                        <th scope="col">jumlah</th>
                                        <th scope="col">Tahun Pembelian</th>
                                        <th scope="col">aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($barangs as $no => $post)
                        <tr>

                            <th>{{ ++$no }}</th>

                            <td>{{ $post->user->name }}</td>
                            {{-- <td>{{ $post->kategori->name }}</td>
                            <td>{{ $post->satuan->name }}</td> --}}
                            <td>{{ $post->name }}</td>
                            <td>Rp {{ number_format($post->harga) }}</td>
                            <td>{{ $post->jumlah }}</td>
                            <td>Rp {{ number_format($post->stock) }}</td>
                            <td>{{ $post->tahun }}</td>
                            {{-- <td>{{ $post->satuans->name }}</td>
                            <td>{{ $post->kategoris->name }}</td> --}}

                            <td class="text-center" nowrap>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.bdestroy', $post->id) }}" method="Post">
                                    <a href="/barang-bidang/{{ $post->uuid }}" class="btn btn-sm btn-warning">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                                {{-- <a href="/barang/{{ $post->uuid }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                    <a href="{{ route('barang.destroy', $post->id) }}"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Anda yakin ingin menghapus {{ $post->name }} ?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                    </a> --}}
                            </td>
                        </tr>
                      @empty
                          <div class="alert alert-danger">
                              Data belum Tersedia.
                          </div>
                      @endforelse
                    </tbody>

                </table>
                <a href="{{ route('barang.exportbid') }}" class="btn btn-sm btn-dark" >
                    <i class="fa fa-print"></i>
                    export
                </a>
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

