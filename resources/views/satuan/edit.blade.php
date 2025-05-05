@extends('Temp.app', ['title' => 'Halaman pegawai', 'page_heading' => 'Daftar pegawai'])

@section('content')

<div class="content">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">Satuan</h4>
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
          <a href="#">Create</a>
        </li>

      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="card-title">Form Edit Satuan</div>
              </div>
          <div class="card-body">
            <form action="{{ route('satuan.update',$satuan->id) }}" method="Post" enctype="multipart/form-data">
                @csrf
                @method('Patch')
                <div class="form-group">
                    <label class="font-weight-bold">nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $satuan->name) }}" placeholder="Masukkan Judul Post">

                    <!-- error message untuk title -->
                    @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan', $satuan->keterangan) }}" placeholder="Masukkan Judul Post">

                    <!-- error message untuk content -->
                    @error('keterangan')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection


