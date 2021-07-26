<?php
    if( empty( $_SESSION['id_user'] ) ){

    	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    	header('Location: ./');
    	die();
    } else {
?>

<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
</head>
<body onload="window.print()">
    <div class="container">

<?php

    $id_transaksi = $_REQUEST['id_transaksi'];

    $sql = mysqli_query($koneksi, "SELECT no_nota, nama, jenis, bayar, kembali, total, tanggal, id_user FROM ajc_transaksi WHERE id_transaksi='$id_transaksi'");

    list($no_nota, $nama, $jenis, $bayar, $kembali, $total, $tanggal, $id_user) = mysqli_fetch_array($sql);

    echo '
        <div style="background-image:url(image/1.jpg)">
        <center><h3><b>Cuci Bersih Mobil Motor</b></h3></center>
        <hr/>
        <h4>Nota Nomor : <b>'.$no_nota.'</b></h4>
        <table class="table table-bordered">
         <thead>
           <tr class="info">
             <th width="15%">Nama Pelanggan</th>
             <th width="12%">Jenis</th>
             <th width="10%">Bayar</th>
             <th width="10%">Kembali</th>
             <th width="10%">Total Bayar</th>
             <th width="10%">Tanggal</th>
           </tr>
         </thead>
         <tbody>

           <tr>
             <td><b>'.$nama.'</b></td>
             <td><b>'.$jenis.'<b/></td>
             <td><b>RP. '.number_format($bayar).'<b/></td>
             <td><b>RP. '.number_format($kembali).'<b/></td>
             <td><b>RP. '.number_format($total).'</b></td>
             <td><b>'.date("d M Y", strtotime($tanggal)).'</b></td>
             <tr/>

        </tbody>
    </table>

    <div style="margin: 0 0 50px 75%;">
        <p style="margin-bottom: 60px;"><b>Petugas Kasir</b></p>
        <p>';

        $sql = mysqli_query($koneksi, "SELECT nama FROM ajc_user WHERE id_user='$id_user'");
        list($nama) = mysqli_fetch_array($sql);

        echo "<b><u>$nama</u></b>";

        echo '</p>
    </div>

    <center>-------------------- Terima Kasih ------------------- </center>

    </div>
    </div>
</body>
</html>';
}
?>
