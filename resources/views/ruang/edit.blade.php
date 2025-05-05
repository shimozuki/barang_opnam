@extends('Temp.app', ['title' => 'Halaman pegawai', 'page_heading' => 'Daftar pegawai'])

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('ruang.update',$ruang->id) }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $ruang->name) }}" placeholder="Masukkan Judul Post">
                        
                            <!-- error message untuk title -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan', $ruang->keterangan) }}" placeholder="Masukkan Judul Post">
                        
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

@endsection