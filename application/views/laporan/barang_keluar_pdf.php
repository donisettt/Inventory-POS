<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $judul ?></title>
<style>

body{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
#customers {
  border-collapse: collapse;
  width: 100%;
  
}

#customers td {
  border: 0px solid $#ddd;
  padding: 8px;
  font-size: 12px;
}
#customers th{
  padding: 8px;
  font-size: 12px;
}


#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:rgb(13, 39, 233);
  color: white;
}
</style>
</head>
<body>
<table border="0" width="100%">
    <tr>
        <td align="center"><h1>PT Mardoni Jaya</h1></td>
    </tr>
    <tr>
        <td align="center">
            <h3>Laporan Barang Keluar</h3>
            <?php if($tglawal == '' || $tglakhir == ''): ?>
                <p>Periode : Semua Tanggal</p>
            <?php else: ?>
                <p><?= tgl_indo($tglawal) ?> - <?= tgl_indo($tglakhir) ?></p>
            <?php endif; ?>
            
        </td>
    </tr>
</table>
<br>
<table id="customers">
  <tr>
    <th>No</th>
    <th>No Transaksi</th>
    <th>Customer</th>
    <th>Tanggal Keluar</th>
    <th>Nama Barang</th>
    <th>Jumlah Keluar</th>
  </tr>
      <?php $no=1; foreach ($data as $d) { ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $d->id_barang_keluar ?></td>
          <td><?= $d->nama_customer ?></td>
          <td><?= tgl_indo($d->tgl_keluar) ?></td>
          <td><?= $d->nama_barang ?></td>
          <td><?= $d->jumlah_keluar ?></td>
        </tr>
      <?php } ?>
</table>

</body>
</html>
