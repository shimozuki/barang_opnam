@extends('Temp.app', ['title' => 'Halaman ketegori', 'page_heading' => 'Daftar ketegori'])

@section('content')<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Kategori</h4>
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
                    <a href="#">Data</a>
                </li>
            </ul>
        </div>
<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center">
            {{-- <form action="{{ route('kategori.import') }}" method="Post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <button class="btn btn-info" class="form-control">upload</button>
            </form>

            <a href="{{ route('kategori.export') }}"><button class="btn btn-success btn-round ml-auto" >
                <i class="fa fa-plus"></i>
                Add Row
            </button>
        </a>
        <a href="{{ route('kategori.generatePDF') }}"><button class="btn btn-success btn-round ml-auto" >
            <i class="fa fa-plus"></i>
            Add Row
        </button>
    </a> --}}

    {{-- <a href="{{ route('kategori.export') }}" class="btn btn-sm btn-danger" >
        <i class="fa fa-print"></i>
        Add Row
    </a> --}}
    <a href="{{ route('kategori.create') }}"><button class="btn btn-primary btn-round ml-auto" >

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
                        <th scope="col">keterangan</th>
                        <th scope="col">aksi</th>
                      </tr>
                </thead>

                <tbody>
                    @forelse ($kategoris as $no => $post)
                        <tr>

                            <th>{{ ++$no }}</th>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->keterangan }}</td>


                        {{-- <td>{{ $post->satuans->name }}</td>
                        <td>{{ $post->kategoris->name }}</td> --}}

                        <td class="text-center" nowrap>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $post->id) }}" method="Post">
                                <a href="{{ route('kategori.edit', $post->id) }}" class="btn btn-sm btn-warning">EDIT</a>
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
                          Data Kategori belum Tersedia.
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
