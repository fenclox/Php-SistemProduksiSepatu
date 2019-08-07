<?php
include "../../../Connection/config.php";

//Proses Tambah
if(isset($_POST['tambah'])){
  $id   = $_POST['id'];
  $nm   = $_POST['nama'];
  $alm  = $_POST['alamat'];
  $tlp  = $_POST['no_telp'];
  $bg   = $_POST['bagian'];
  $psw  = 'test';
  if($bg=='Planning'){
    $lvl ='1';
  } else if($bg=='Produksi'){
    $lvl ='2';
  }
  //INSERT QUERY START
  $sql = mysql_query("insert into pegawai values('$id','$nm','$alm','$tlp','$bg','$psw','$lvl')");
  if ($sql) {
      header("Location: ../index.php?hal=pgw&tmb=success");
    } else {
      header("Location: ../index.php?hal=pgw&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubah'])) {
  $id   = $_POST['id'];
  $nm   = $_POST['nama'];
  $alm  = $_POST['alamat'];
  $tlp  = $_POST['no_telp'];
  $bg   = $_POST['bagian'];
  $psw  = 'test';
  if($bg=='Planning'){
    $lvl ='1';
  } else if($bg=='Produksi'){
    $lvl ='2';
  }
  //UPDATE QUERY START
  $sql = mysql_query("update pegawai set nm_pegawai='$nm',alamat='$alm',no_telp='$tlp',bagian='$bg' where id_pegawai='$id'");
  if ($sql) {
    header("Location: ../index.php?hal=pgw&ubh=success");
  } else {
    header("Location: ../index.php?hal=pgw&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapus'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $sql = mysql_query("delete from pegawai where id_pegawai='$id'");
  if ($sql) {
    header("Location: ../index.php?hal=pgw&hps=success");
  } else {
    header("Location: ../index.php?hal=pgw&hps=fail");
  }
  exit;
}
?>