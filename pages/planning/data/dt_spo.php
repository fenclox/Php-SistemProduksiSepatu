<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Data Salinan PO
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- /////////////////////////////////////// Box /////////////////////////////////////// -->
    <div class="box box-info">
      <div class="box-header">
      <h5>Data yang BELUM di proses oleh bagian <b>Produksi</b></h5>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal PO</th>
              <th>Tanggal Pengiriman</th>
              <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $record = mysql_query("SELECT * from salinan_po a, detil_po b where a.no_po = b.no_po and a.status='0' GROUP BY a.no_po ORDER BY a.tgl_po desc");
            while ($r = mysql_fetch_array($record)) {
            echo "
            <tr>
              <td>$r[no_po]</td>
              <td style='text-transform: capitalize'>$r[nm_customer]</td>
              <td>$r[tgl_po]</td>
              <td>$r[tgl_pengiriman]</td>
              <td width='15%'>
                <button title='Lihat Detil' class='btn btn-warning' data-toggle='modal' href='#' data-target='#detilpoModal".$r['no_po']."'><i class='fa fa-eye'></i></button>&nbsp;
              </td>
            </tr>
            ";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /////////////////////////////////////// =============== /////////////////////////////////////// -->
    <!-- /////////////////////////////////////// Box 2 /////////////////////////////////////// -->
    <div class="box box-success">
      <div class="box-header">
      <h5>Data yang SEDANG di proses oleh bagian <b>Produksi</b></h5>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal PO</th>
              <th>Tanggal Pengiriman</th>
              <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $record = mysql_query("SELECT * from salinan_po a, detil_po b where a.no_po = b.no_po and a.status='1' GROUP BY a.no_po ORDER BY a.tgl_po desc");
            while ($r = mysql_fetch_array($record)) {
            echo "
            <tr>
              <td>$r[no_po]</td>
              <td style='text-transform: capitalize'>$r[nm_customer]</td>
              <td>$r[tgl_po]</td>
              <td>$r[tgl_pengiriman]</td>
              <td width='15%'>
                <button title='Lihat Detil' class='btn btn-warning' data-toggle='modal' href='#' data-target='#detilpoModal2".$r['no_po']."'><i class='fa fa-eye'></i></button>&nbsp;
              </td>
            </tr>
            ";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /////////////////////////////////////// =============== /////////////////////////////////////// -->
    <!-- /////////////////////////////////////// Box 3 /////////////////////////////////////// -->
    <div class="box box-danger">
      <div class="box-header">
      <h5>Data yang SUDAH di kerjakan oleh bagian <b>Produksi</b></h5>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal PO</th>
              <th>Tanggal Pengiriman</th>
              <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $record = mysql_query("SELECT * from salinan_po a, detil_po b where a.no_po = b.no_po and a.status='2' GROUP BY a.no_po ORDER BY a.tgl_po desc");
            while ($r = mysql_fetch_array($record)) {
            echo "
            <tr>
              <td>$r[no_po]</td>
              <td style='text-transform: capitalize'>$r[nm_customer]</td>
              <td>$r[tgl_po]</td>
              <td>$r[tgl_pengiriman]</td>
              <td width='15%'>
                <button title='Buat DO' class='btn btn-warning' data-toggle='modal' href='#' data-target='#detilpoModal3".$r['no_po']."'><i class='fa fa-eye'></i></button>&nbsp;
              </td>
            </tr>
            ";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /////////////////////////////////////// =============== /////////////////////////////////////// -->
    <!-- /////////////////////////////////////// Box 4 /////////////////////////////////////// -->
    <div class="box box-warning">
      <div class="box-header">
      <h5>Data yang SUDAH dibuat <b>DO</b></h5>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal Pengiriman</th>
              <th>Tanggal DO</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $record = mysql_query("SELECT * from salinan_po a, detil_po b, DO C where a.no_po = b.no_po and b.no_po=c.no_po and a.status='3' GROUP BY a.no_po ORDER BY a.tgl_po desc");
            while ($r = mysql_fetch_array($record)) {
            echo "
            <tr>
              <td>$r[no_po]</td>
              <td style='text-transform: capitalize'>$r[nm_customer]</td>
              <td>$r[tgl_pengiriman]</td>
              <td>$r[tgl_do]</td>
            </tr>
            ";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /////////////////////////////////////// =============== /////////////////////////////////////// -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- ////////////////////////////////////////////// Detil 1 ///////////////////////////////////////////////////// -->
<?php  
  $query = "SELECT * from salinan_po a, detil_po b where a.no_po = b.no_po and a.status='0'";
  $record = mysql_query($query);
  
  while ($row = mysql_fetch_array($record)) { 
?>

<div <?php echo 'id="detilpoModal'.$row['no_po'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Detil PO</h3>
      </div>
      <div class="modal-body">
        <form method="POST" action="update/statuspo.php">
          <div class="form-group"><label>No. PO</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="po" maxlength="8" readonly value="<?php echo $row['no_po']; ?>"></div>
          <div class="form-group"><label>Tanggal PO</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['tgl_po']; ?>" readonly></div>

      <!-- table detil -->
        <?php
          $query2 = mysql_query("SELECT detil_po.id_barang as brgdetil, barang.id_barang, nm_barang, model, jumlah_pesan , ukuran, warna from salinan_po, detil_po, barang where salinan_po.no_po=detil_po.no_po and barang.id_barang=detil_po.id_barang and detil_po.no_po = '".$row['no_po']."' ORDER by barang.nm_barang asc");

          echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
              echo '<thead>';
                  echo '<tr>';
                      echo '<th>ID Barang</th>';
                      echo '<th>Nama Barang</th>';
                      echo '<th>Jumlah</th>';
                      echo '<th>Ukuran</th>';
                      echo '<th>Warna</th>';
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
              while ($row = mysql_fetch_array($query2)) {
                  if($row['jumlah_pesan']>'0'){
                      echo "<tr'>";                 
                          echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['id_barang'];echo"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_barang'].' '.$row['model'];"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah_pesan'];"</td>";
                           echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['ukuran'];"</td>";
                           echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['warna'];"</td>";
                      echo '</tr>';
                  }
              }
              echo '</tbody>';
          echo '</table>';
        ?>
        <!-- end table detil -->
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  }
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////// Detil 2 ///////////////////////////////////////////////////// -->
<?php  
  $query = "SELECT * from salinan_po a, detil_po b where a.no_po = b.no_po and a.status='1'";
  $record = mysql_query($query);
  
  while ($row = mysql_fetch_array($record)) { 
?>

<div <?php echo 'id="detilpoModal2'.$row['no_po'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Detil PO</h3>
      </div>
      <div class="modal-body">
        <form method="POST" action="#">
            <div class="form-group"><label>No. PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="po" maxlength="8" readonly value="<?php echo $row['no_po']; ?>"></div>
          <div class="form-group"><label>Tanggal PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['tgl_po']; ?>" readonly></div>
      <!-- table detil -->
        <?php
          $query2 = mysql_query("SELECT detil_po.id_barang as brgdetil, ukuran, warna, barang.id_barang, nm_barang, jumlah_pesan from salinan_po, detil_po, barang where salinan_po.no_po=detil_po.no_po and barang.id_barang=detil_po.id_barang and detil_po.no_po = '".$row['no_po']."' ORDER by barang.nm_barang asc");

          echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
              echo '<thead>';
                  echo '<tr>';
                      echo '<th>ID Barang</th>';
                      echo '<th>Nama Barang</th>';
                      echo '<th>Jumlah</th>';
                      echo '<th>Ukuran</th>';
                      echo '<th>Warna</th>';
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
              while ($row = mysql_fetch_array($query2)) {
                  if($row['jumlah_pesan']>'0'){
                      echo "<tr'>";                 
                          echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['id_barang'];echo"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_barang'];"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah_pesan'];"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['ukuran'];"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['warna'];"</td>";
                      echo '</tr>';
                  }
              }
              echo '</tbody>';
          echo '</table>';

        ?>
        <!-- end table detil -->
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  }
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////// Detil 3 ///////////////////////////////////////////////////// -->
<?php  
  $query = "SELECT * from salinan_po a, detil_po b where a.no_po = b.no_po and a.status='2'";
  $record = mysql_query($query);
  
  while ($row = mysql_fetch_array($record)) { 
?>

<div <?php echo 'id="detilpoModal3'.$row['no_po'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Detil PO</h3>
      </div>
      <div class="modal-body">
        <form method="POST" action="#">
            <div class="form-group"><label>No. PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="po" maxlength="8" readonly value="<?php echo $row['no_po']; ?>"></div>
          <div class="form-group"><label>Tanggal PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['tgl_po']; ?>" readonly></div>
      <!-- table detil -->
        <?php
          $query2 = mysql_query("SELECT detil_po.id_barang as brgdetil, ukuran, warna, barang.id_barang, nm_barang, jumlah_pesan from salinan_po, detil_po, barang where salinan_po.no_po=detil_po.no_po and barang.id_barang=detil_po.id_barang and detil_po.no_po = '".$row['no_po']."' ORDER by barang.nm_barang asc");

          echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
              echo '<thead>';
                  echo '<tr>';
                      echo '<th>ID Barang</th>';
                      echo '<th>Nama Barang</th>';
                      echo '<th>Jumlah</th>';
                      echo '<th>Ukuran</th>';
                      echo '<th>Warna</th>';
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
              while ($row = mysql_fetch_array($query2)) {
                  if($row['jumlah_pesan']>'0'){
                      echo "<tr'>";                 
                          echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['id_barang'];echo"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_barang'];"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah_pesan'];"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['ukuran'];"</td>";
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['warna'];"</td>";
                      echo '</tr>';
                  }
              }
              echo '</tbody>';
          echo '</table>';

        ?>
        <!-- end table detil -->
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  }
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->