<?php
include "../../../Connection/config.php";
//Proses ACC
if(isset($_POST['acc'])){
  $po  = $_POST['po'];
  $pgw  = $_POST['pegawai'];
  $sts  = '1';
  
  $query1 = "update salinan_po set status='$sts', id_pegawai='$pgw' where no_po='$po'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=spo");
  } else {
     echo mysql_error();
  }
} else if(isset($_POST['acc2'])){
  $po  = $_POST['po'];
  $pgw  = $_POST['pegawai'];
  $sts  = '2';
  //Ceklis
  $query1 = "update salinan_po set status='$sts', id_pegawai='$pgw' where no_po='$po'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=spo");
  } else {
     echo mysql_error();
  }
} else if(isset($_POST['do'])){
  $time   = date('Hisymd');
  $kd     = rand(0,9);
  $id     = $time.$kd;

  $po   = $_POST['po'];
  $pgw  = $_POST['pegawai'];
  $sts  = '3';
  $grd  = $_POST['grand'];
  $tglkrm= $_POST['tglkirim'];

  if($tglkrm <= date("Y-m-d")){
    $denda = $grd*0.05;
  } else {
    $denda = 0;
  }

  //Ceklis
  $query1 = "update salinan_po set status='$sts', id_pegawai='$pgw' where no_po='$po'";
  $query2 = "INSERT into do values('$id','$po',CURDATE(),$grd,$denda)";
  $sql1 = mysql_query($query1);
  $sql2 = mysql_query($query2);
  if ($sql1 && $sql2) {
    header("Location: ../index.php?hal=spo");
  } else {
     echo mysql_error();
  }
}
?>
