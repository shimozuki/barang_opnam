<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Example 1</title>
  <style type="text/css">
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #5D6975;
      text-decoration: underline;
    }

    body {
      position: relative;
      margin: 0 auto;
      color: #001028;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 12px;
      font-family: Arial;
    }

    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }

    #logo {
      text-align: center;
      margin-bottom: 10px;
    }

    #logo img {
      width: 90px;
    }

    h1 {
      border-top: 1px solid #5D6975;
      border-bottom: 1px solid #5D6975;
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 0 0 20px 0;
      background: url(dimension.png);
    }

    #project {
      float: left;
    }

    #project span {
      color: #5D6975;
      text-align: right;

      margin-right: 10px;
      display: inline-block;
      font-size: 0.8em;
    }

    #company {
      float: right;
      text-align: right;
    }

    #project div,
    #company div {
      white-space: nowrap;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
      background: #F5F5F5;
    }

    table th,
    table td {
      text-align: center;
    }

    table th {
      padding: 5px 20px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      white-space: nowrap;
      font-weight: normal;
    }

    table .service,
    table .desc {
      text-align: left;
    }

    table td {
      padding: 20px;
      text-align: right;
    }

    table td.service,
    table td.desc {
      vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
      font-size: 1.2em;
    }

    table td.grand {
      border-top: 1px solid #5D6975;
      ;
    }

    #notices .notice {
      color: #5D6975;
      font-size: 1.2em;
    }

    footer {
      color: #5D6975;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }
  </style>
</head>

<body>
  <header class="clearfix">
    <div id="logo">
      <img src="logo.webp">
    </div>
    <h1>INVOICE BARANG</h1>
    <div id="company" class="clearfix">
      <div>PT ANTAR NUSA TEKNIK SUMBAWA</div>
      <div>Brang Bara, Kec. Sumbawa, Kabupaten Sumbawa, Nusa Tenggara Barat,<br /> 84313</div>
      <div>0857-9234-9639</div>
      <div><a href="bpprdkotajambi@gmail.com">antsumbawa@gmail.com</a></div>
    </div>
    <div id="project">
      <div><span>APLIKASI</span> STOK OPNAME</div>
      <div><span>BIDANG</span> {{ Auth::user()->name}}</div>
      <div><span>EMAIL</span> <a href="#">{{ Auth::user()->email}}</a></div>
      <div><span>-</span></div>
      <div><span>PRIODER</span> {{ $start }} - {{ $end }}</div>
      <div><span>Tanggal Cetak</span> {{ $today }} </div>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>bidang</th>
          <th>satuan</th>
          <th>kategori</th>
          <th>barang</th>

          <th>harga</th>
          <th>jumlah barang </th>
          <th>pagu </th>

        </tr>
      </thead>
      <tbody>
        @forelse ($rep as $no => $post)
        <tr>

          <td>{{ ++$no }}</td>

          <td class="service">{{ $post->user->name }}</td>

          <td class="service">{{ $post->satuan->name }}</td>
          <td class="service">{{ $post->kategori->name }}</td>
          <td class="service">{{ $post->name }}</td>

          <td class="service"> Rp.{{ number_format($post->harga) }}</td>
          <td class="service">{{ $post->jumlah }}</td>
          <td class="total"> {{ $post->stock }}</td>

        </tr>

        @endforeach
        <tr>
          <td colspan="6" class="grand total">TOTAL</td>
          <td class="grand total">{{ ($totalbg) }}</td>
          <td class="grand total">Rp.{{ number_format($totals) }}</td>
        </tr>
      </tbody>
    </table>
    <div id="notices">
      <div>NOTICE:</div>
      <div class="notice">stock opname - invoice barang</div>
    </div>
  </main>
  <footer>
    sistem pengelolahan data dan informasi PT ANTAR NUSA TEKNIK SUMBAWA
  </footer>
</body>

</html>