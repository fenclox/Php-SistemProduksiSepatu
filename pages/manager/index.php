<?php
  //Include file header.php
  include 'header.php';
  //cek session, kalo ga ada, lempar ke login.
  if(isset($_GET['hal'])){
      switch($_GET['hal']){
          case 'beranda' : include 'beranda.php'; break;
          case 'brg'     : include 'data/dt_barang.php'; break;
          case 'pgw'     : include 'data/dt_pegawai.php'; break;
          case 'lappgw'  : include 'data/dt_lap_pegawai.php'; break;
          case 'lapdo'   : include 'data/dt_lap_do.php'; break;

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>