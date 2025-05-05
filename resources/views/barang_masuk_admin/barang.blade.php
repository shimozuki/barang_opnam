@extends('Temp.app', ['title' => 'Halaman pegawai', 'page_heading' => 'Daftar pegawai'])

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">DataTables.Net</h4>
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
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Add Row</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Add Row
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">bidang</th>
                                        <th scope="col">satuan</th>
                                        <th scope="col">kondisi</th>
                                        <th scope="col">barang</th>
                                        <th scope="col">harga</th>
                                        <th scope="col">jumlah barang</th>
                                        <th scope="col">stok barang</th>
                                        <th scope="col">aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($barangs as $no => $post)
                            <tr>

                                <th>{{ ++$no }}</th>

                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->kategori->name }}</td>
                                <td>{{ $post->satuan->name }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->harga }}</td>
                                <td>{{ $post->jumlah }}</td>
                                <td>{{ $post->stock }}</td>
                                {{-- <td>{{ $post->satuans->name }}</td>
                                <td>{{ $post->kategoris->name }}</td> --}}

                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $post->id) }}" method="Post">
                                        <a href="{{ route('pengguna.update', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                              <div class="alert alert-danger">
                                  Data Post belum Tersedia.
                              </div>
                          @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@push('modal')
@include('barang.create')
@endpush
@push('js')
@include('barang.script')
@endpush
