<?php
  include "../../../Connection/config.php";
  $po   = $_POST['no'];
  $nm   = $_POST['nama'];
  $krm  = $_POST['kirim'];
  $r_krm = str_replace("/","-",$krm);
  $pgw  = $_POST['pegawai'];
  $brg  = $_POST['barang'];
  $jml  = $_POST['jumlah'];
  $uk   = $_POST['ukuran'];
  $wrn  = $_POST['warna'];

  $q = mysql_query("select harga from barang where id_barang='$brg'");
  while ($row = mysql_fetch_array($q)){
    $hrg = $row['harga'];
  }
  $sub = $hrg*$jml;

  $querypo = mysql_query("INSERT into salinan_po values ('$po','$nm',CURDATE(),'$r_krm','$pgw','0')");
  $querydpo = mysql_query("INSERT into detil_po values ('$po','$brg','$jml','$uk','$wrn','$sub')");
  
  header("Location: ../index.php?hal=espodtl&no_po=$po");
?>