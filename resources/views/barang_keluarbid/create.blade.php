@extends('Temp.app', ['title' => 'Halaman pegawai', 'page_heading' => 'Daftar pegawai'])

@section('content')
<div class="content">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">Barang</h4>
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
                <div class="card-title">Form Input Barang Keluar</div>
              </div>
          <div class="card-body">
            <form action="{{ route('barangkeluar.kstore') }}" method="Post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

              <div class="form-group">
                <label for="largeSelect">Nama Barang</label>
                <select class="form-control form-control"  name="barang_id" id="barang_id">
                    <option selected>Pilih Barang</option>
                  @foreach ($brg as $barang)
                  <option value="{{ $barang->id }}">{{ $barang->name }} | {{ $barang->jumlah }}</option>
                  @endforeach

                </select>
                <!-- error message untuk title -->

              </div>
              <div class="form-group">
                <label class="font-weight-bold">Jumlah</label>
                <input type="number" class="form-control @error('jml') is-invalid @enderror" id="jml" name="jml"  placeholder="masukkan jumlah">
                <!-- error message untuk title -->
                @error('jml')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Tujuan</label>
                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan"  placeholder="Masukan data">

                <!-- error message untuk title -->
                @error('tujuan')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>


              <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
              <button type="reset" class="btn btn-md btn-warning">RESET</button>

          </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


@endsection
