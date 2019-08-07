<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Beranda
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="callout callout-info">
      <!--h4>Tip!</h4-->
      <?php
      $kd = $_SESSION['id'];
      include "../../connection/config.php";
      $sql = "select nm_pegawai from pegawai where id_pegawai='".$kd."'";
      $query = mysql_query($sql);
      while($data = mysql_fetch_array($query)){
      echo "<p>Selamat datang, ".$data['nm_pegawai']."</p>";
      }
      ?>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <!-- <div class="col-md-4"><img class="img img-responsive" src="../../images/img1.jpg"></div>
          <div class="col-md-4"><img class="img img-responsive" src="../../images/img2.jpg"></div>      
          <div class="col-md-4"><img class="img img-responsive" src="../../images/img3.jpg"></div>
          <div class="col-xs-6 col-md-3"> -->
          <div class="col-xs-6 col-md-3">
            <img class="img img-thumbnail" src="../../images/img1.jpg">
          </div>
          <div class="col-xs-6 col-md-3">
            <img class="img img-thumbnail" src="../../images/img2.jpg">
          </div>
          <div class="col-xs-6 col-md-3">
            <img class="img img-thumbnail" src="../../images/img3.jpg">
          </div>
          <div class="col-xs-6 col-md-3">
            <img class="img img-thumbnail" src="../../images/img4.jpg">
          </div>
        </div>
    </div>
  </div>
  
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->