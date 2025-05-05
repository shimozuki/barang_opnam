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
                <div class="card-title">Form Edit Barang Keluar</div>
              </div>
          <div class="card-body">
            <form action="/barang-keluar-admin/update/{{ $barang_keluar->id }}" method="Post" enctype="multipart/form-data">
                {{ csrf_field() }}
              {{-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> --}}
              <div class="form-group">
                <label for="largeSelect">Nama Barang</label>
                <select name="barang_id" class="form-control" id="role">
                    @foreach ($barang as $brg)
                    <option value="{{ $brg->id }}">{{ $brg->name }}| {{ $brg->stock }} </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Jumlah</label>
                <input value="{{$barang_keluar->jml}}" type="text" class="form-control @error('jml') is-invalid @enderror" id="jml" name="jml" value="{{ old('jml') }}" placeholder="Masukkan data">
                <!-- error message untuk title -->
                @error('jml')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Tujuan</label>
                <input value="{{$barang_keluar->tujuan}}" type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan') }}" placeholder="Masukkan data">
                <!-- error message untuk title -->
                @error('tujuan')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
              </div>


              <button type="submit" class="btn btn-md btn-primary">Update</button>
              <button type="reset" class="btn btn-md btn-warning">RESET</button>

          </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
