<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	{{-- <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style> --}}
    <div class="container mt-4">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>bidang</th>
            <th>satuan</th>
            <th>kategori</th>
            <th>barang</th>

            <th >harga</th>
            <th >jumlah </th>
            <th >stok </th>
            <th >Tahun </th>

        </tr>
        @forelse ($rep as $no => $post)
                        <tr>

                            <th>{{ ++$no }}</th>

                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->kategori->name }}</td>
                            <td>{{ $post->satuan->name }}</td>
                            <td>{{ $post->name }}</td>
                            <td> {{ number_format($post->harga) }}</td>
                            <td>{{ $post->jumlah }}</td>
                            <td> {{ number_format($post->stock) }}</td>
                            <td>{{ $post->tahun }}</td>
        </tr>
        @endforeach
    </table>
    </div>
</body>
</html>
