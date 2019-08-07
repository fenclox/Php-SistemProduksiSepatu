<?php
  //Include file header.php
  include 'header.php';
  //cek session, kalo ga ada, lempar ke login.
  if(isset($_GET['hal'])){
      switch($_GET['hal']){
          case 'beranda' : include 'beranda.php'; break;
          case 'spo'     : include 'data/dt_spo.php'; break;
          case 'espo'    : include 'data/dt_espo.php'; break;
          case 'espodtl' : include 'data/dt_espodtl.php'; break;

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>