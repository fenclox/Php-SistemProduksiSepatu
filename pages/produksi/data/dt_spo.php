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
              <th>No.PO</th>
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
                <a class='btn btn-success' target='_blank' href='proses/prs_ctk.php?nopo=$r[no_po]'><i class='fa fa-print'></i></a>
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
              <th>No.PO</th>
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
              <th>No.PO</th>
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
        <form method="POST" action="proses/prs_acc.php">
          <div class="row">
          <div class="col-xs-10">
            <div class="form-group"><label>No.PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="po" maxlength="8" readonly value="<?php echo $row['no_po']; ?>">
          </div>
          </div>
          <div class="col-md-offset-10 col-xs-2" style="margin: 23px 0 0 0">
            <button type="submit" name="acc" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i></button>
          </div>
        </div>
          <div class="form-group"><label>Tanggal PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['tgl_po']; ?>" readonly style="width: 82.5%"></div>
        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="pegawai">
      <!-- table detil -->
        <?php
          $query2 = mysql_query("SELECT detil_po.id_barang as brgdetil, ukuran, warna, barang.id_barang, nm_barang, model, jumlah_pesan from salinan_po, detil_po, barang where salinan_po.no_po=detil_po.no_po and barang.id_barang=detil_po.id_barang and detil_po.no_po = '".$row['no_po']."' ORDER by barang.nm_barang asc");

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
        <form method="POST" action="proses/prs_acc.php">
          <div class="row">
          <div class="col-xs-10">
            <div class="form-group"><label>No.PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="po" maxlength="8" readonly value="<?php echo $row['no_po']; ?>">
          </div>
          </div>
          <div class="col-md-offset-10 col-xs-2" style="margin: 23px 0 0 0">
            <button type="submit" name="acc2" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></button>
          </div>
        </div>
          <div class="form-group"><label>Tanggal PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['tgl_po']; ?>" readonly style="width: 82.5%"></div>
        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="pegawai">
      <!-- table detil -->
        <?php
          $query2 = mysql_query("SELECT detil_po.id_barang as brgdetil, ukuran, warna, barang.id_barang, nm_barang, model, jumlah_pesan from salinan_po, detil_po, barang where salinan_po.no_po=detil_po.no_po and barang.id_barang=detil_po.id_barang and detil_po.no_po = '".$row['no_po']."' ORDER by barang.nm_barang asc");

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
        <h3 id="myModalLabel">Buat DO</h3>
      </div>
      <div class="modal-body">
        <form method="POST" action="proses/prs_acc.php">
          <div class="row">
          <div class="col-xs-10">
            <div class="form-group"><label>No.PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="po" maxlength="8" readonly value="<?php echo $row['no_po']; ?>">
          </div>
          </div>
          <div class="col-md-offset-10 col-xs-2" style="margin: 23px 0 0 0">
            <button type="submit" name="do" class="btn btn-danger"><i class="glyphicon glyphicon-ok"></i></button>
          </div>
        </div>
          <div class="form-group"><label>Tanggal PO</label><input class="form-control" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['tgl_po']; ?>" readonly style="width: 82.5%"></div>
        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="pegawai">
      <!-- table detil -->
        <?php
          $query2 = mysql_query("SELECT b.id_barang as brgdetil, (harga*jumlah_pesan) as sub_total, tgl_pengiriman, c.id_barang, nm_barang, model, jumlah_pesan, ukuran, warna, harga from salinan_po a, detil_po b, barang c where a.no_po=b.no_po and c.id_barang=b.id_barang and b.no_po = '".$row['no_po']."' GROUP BY b.id_barang");

          $query_do = mysql_query("select sum(sub_total) as grand, tgl_pengiriman from detil_po a, salinan_po b where a.no_po='".$row['no_po']."' and a.no_po=b.no_po GROUP by a.no_po ");
          $row_do = mysql_fetch_array($query_do);
          echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
              echo '<thead>';
                  echo '<tr>';
                      echo '<th width="15%">ID Barang</th>';
                      echo '<th width="20%">Nama Barang</th>';
                      echo '<th width="15%">Jumlah</th>';
                      echo '<th>Ukuran</th>';
                      echo '<th>Warna</th>';
                      echo '<th width="25%">Subtotal</th>';
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
                          echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['sub_total'];"</td>";
                      echo '</tr>';
                  }
              } 
              echo '</tbody>';
              //Tgl kirim & Grand
              echo '<input type="hidden" class="form-control" name="grand" readonly value="'.$row_do["grand"].'">';
              echo '<input type="hidden" class="form-control" name="tglkirim" readonly value="'.$row_do["tgl_pengiriman"].'">';
              //End
              echo '<tfooter>';
                echo '<tr>';
                echo '<td colspan="5">'; echo '<b>Grand total</b></td>';
                echo '<td>'; echo 'Rp ' . number_format( $row_do["grand"], 0 , '' , '.' ) . ',-'; '</td>';
                echo '</tr>';
              echo '</tfooter>';
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