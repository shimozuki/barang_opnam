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
                <div class="card-title">Form Input Barang Masuk</div>
              </div>
          <div class="card-body">
            <form action="{{ route('barangmasuk.astore') }}" method="Post" enctype="multipart/form-data">
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




              <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
              <button type="reset" class="btn btn-md btn-warning">RESET</button>

          </form>
          {{-- <form action="{{ route('barangmasuk.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nama-barang">Nama Barang</label>
              <select name="nama-barang" id="nama-barang" class="form-control" required>
                <option value="" selected disabled>-- Pilih Barang --</option>

              </select>
            </div>
            <div class="form-group">
              <label for="warna">Harga</label>
              <input type="text" name="harga" id="harga" class="form-control" readonly required>
            </div>
            <div class="form-group">
              <label for="size">jmlah</label>
              <input type="text" name="jml" id="jml" class="form-control" readonly required>
            </div>
            <div class="form-group">
              <label for="harga">Stock</label>
              <input type="text" name="stock" id="stock" class="form-control" readonly required>
            </div>
            <hr>
            <input type="submit" value="Simpan" class="btn btn-primary">
          </form> --}}

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
{{-- <script>
	$('#nama-barang').on('change', (event) => {
		getBarang(event.target.value).then(barang => {
			$('#harga').val(barang.harga);
			$('#jml').val(barang.jml);
			$('#stock').val(barang.stock);
		});
	});

	async function getBarang(id) {
		let response = await fetch('/api/home/' + id)
		let data = await response.json();

		return data;
	}
</script> --}}
@endsection
