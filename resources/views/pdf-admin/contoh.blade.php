<!DOCTYPE html>
<html>
<head>
	<title>contoh surat pengunguman</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td><img src="LOGO.jpg" width="90" height="90"></td>
				<td>
				<center>
					<font size="4">PEMERINTAHAN KOTA JAMBI</font><br>
					<font size="5"><b>BADAN PENGELOLAAN PAJAK DAN RETRIBUSI DAERAH</b></font><br>

				</center>
				</td>

			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>


	</center>
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

</body>
</html>
