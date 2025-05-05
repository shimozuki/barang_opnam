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
                <div class="card-title">Form Edit Barang</div>
              </div>
          <div class="card-body">
            <form action="/barang/update/{{ $barang->id }}" method="Post" enctype="multipart/form-data">
                {{ csrf_field() }}
              {{-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> --}}
              <div class="form-group">
                  <label class="font-weight-bold">nama</label>
                  <input value="{{$barang->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Judul Post">

                  <!-- error message untuk title -->
                  @error('name')
                      <div class="alert alert-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="form-group">
                <label for="largeSelect">Bidang</label>
                <select name="user_id" class="form-control" id="role">
                    @foreach ($usr as $list)
                        <option value="{{ $list->id }}"
                            {{ $barang->user_id == $list->id ? ' selected' : '' }}>
                            {{ $list->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="largeSelect">Satuan</label>
                <select name="satuan_id" class="form-control" id="role">
                    @foreach ($stn as $satuan)
                    <option value="{{ $satuan->id }}">{{ $satuan->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="largeSelect">Kategori</label>
                <select name="kategori_id" class="form-control" id="role">
                    @foreach ($ktg as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                  <label class="font-weight-bold">Harga</label>
                  <input value="{{$barang->harga}}" type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Judul Post">
                  <!-- error message untuk title -->
                  @error('harga')
                      <div class="alert alert-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Jumlah</label>
                <input value="{{$barang->jumlah}}" type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" placeholder="Masukkan Judul Post">
                <!-- error message untuk title -->
                @error('jumlah')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Stock</label>
                <input value="{{$barang->stock}}" type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}" readonly="">
                <!-- error message untuk title -->
                @error('stock')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="font-weight-bold">Tahun Pembelian</label>
                <input value="{{$barang->tahun}}" type="date" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') }}"  placeholder="Masukkan Tahun" >
                <!-- error message untuk title -->
                @error('tahun')
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah, #harga").keyup(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();

            var stock = parseInt(harga) * parseInt(jumlah);
            $("#stock").val(stock);
        });
    });
</script>
@endsection
