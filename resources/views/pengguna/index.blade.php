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

                <a href="{{  route('pengguna.create')  }}"><button class="btn btn-primary btn-round ml-auto" >

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
                          <th scope="col">nama</th>
                          <th scope="col">email</th>
                          <th scope="col">hak akses</th>
                          <th scope="col">aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($users as $no => $post)
                          <tr>

                              <th>{{ ++$no }}</th>
                              <td>{{ $post->name }}</td>
                              <td>{{ $post->email }}</td>
                              <td>{{ $post->role_id }}</td>
                              <td class="text-center">
                                  <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $post->id) }}" method="Post">
                                      <a href="{{ route('pengguna.edit', $post->id) }}" class="btn btn-sm btn-warning">EDIT</a>
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


{{-- @extends('Temp.app', ['title' => 'Halaman pegawai', 'page_heading' => 'Daftar pegawai'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('pengguna.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                    <table class="table table-bordered">
                        <thead>
                          <tr>

                            <th scope="col">No</th>
                            <th scope="col">nama</th>
                            <th scope="col">email</th>
                            <th scope="col">hak akses</th>
                            <th scope="col">aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($users as $no => $post)
                            <tr>

                                <th>{{ ++$no }}</th>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->email }}</td>
                                <td>{{ $post->role->role_name }}</td>

                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $post->id) }}" method="Post">
                                        <a href="{{ route('pengguna.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                      {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
</script>

@endsection --}}
