<?php
include "../../../Connection/config.php";

//Proses Tambah
if(isset($_POST['tambah'])){
  $id   = $_POST['id'];
  $nm   = $_POST['nama'];
  $mdl  = $_POST['model'];
  $hrg  = $_POST['harga'];
  //INSERT QUERY START
  $sql = mysql_query("insert into barang values('$id','$nm','$mdl','$hrg')");
  if ($sql) {
      header("Location: ../index.php?hal=brg&tmb=success");
    } else {
      header("Location: ../index.php?hal=brg&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubah'])) {
  $id   = $_POST['id'];
  $nm   = $_POST['nama'];
  $mdl  = $_POST['model'];
  $hrg  = $_POST['harga'];
  //UPDATE QUERY START
  $sql = mysql_query("update barang set nm_barang='$nm',model='$mdl',harga='$hrg' where id_barang='$id'");
  if ($sql) {
    header("Location: ../index.php?hal=brg&ubh=success");
  } else {
    header("Location: ../index.php?hal=brg&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapus'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $sql = mysql_query("delete from barang where id_barang='$id'");
  if ($sql) {
    header("Location: ../index.php?hal=brg&hps=success");
  } else {
    header("Location: ../index.php?hal=brg&hps=fail");
  }
  exit;
}
?>