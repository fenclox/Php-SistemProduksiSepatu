  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Buat Salinan PO
      </h1>
      <ol class="breadcrumb">
        <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
              <!-- FORM ENTRY PO -->
              <div class="row">
              <div class="col-md-6">
              <form method="POST" action="proses/prs_espo.php">
                <div class="form-group"><label>No. PO</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="no" readonly
                value="<?php
                    $ymd    =  date('ymd'); 
                    //menjadikan 6 digit pertama kode -> ymd (tahun,bulan,tanggal) dan mereset kode setelah ymd berganti
                    $query = "select MAX(RIGHT(no_po,2)) as max_id from salinan_po where LEFT(no_po, 6)='$ymd' ORDER BY no_po"; 
                    $sql   = mysql_query($query);
                    $hasil = mysql_fetch_array($sql);
                    $maxid = 0;
                    $maxid = $hasil['max_id'];
                    $maxid++;
                    switch (strlen($maxid)) {
                      case 1 :
                          $idfix = "0" . $maxid;
                          break;
                      default :
                          $idfix = $maxid;
                          break;
                    };
                    $no_po = $ymd.$idfix;
                echo $no_po;
                ?>">
                </div>
                <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <input name="nama" type="text" maxlength="50" class="form-control" placeholder="Nama Pelanggan" data-trigger="manual" style="text-transform: capitalize;" required="">
                </div>
                <div class="form-group">
                  <label>Tanggal Pengiriman</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input name="kirim" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Pengiriman" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label>Barang</label>
                  <select class="form-control select2" style="width: 100%;" name="barang" required="">
                    <?php
                    $query = mysql_query("select * from barang ORDER by id_barang asc");
                    while ($row = mysql_fetch_array($query)){
                    echo "<option value=$row[id_barang]>$row[nm_barang] $row[model]</option>";
                    }
                    ?>
                  </select>
                </div>
                  <button name="proses" type="submit" class="btn btn-primary">Proses</button>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>Jumlah Barang</label>
                  <input name="jumlah" type="text" maxlength="4" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Jumlah Barang" data-trigger="manual" required="">
                </div>
                <div class="form-group">
                  <label>Ukuran</label>
                  <select name="ukuran" class="form-control">
                    <?php 
                      for($i=38; $i<=45; $i++){
                        echo "<option value=".$i.">".$i."</option>";
                      }
                    ?>  
                  </select> 
                </div>
                <div class="form-group">
                  <label>Warna</label>
                  <select name="warna" class="form-control" required="">
                    <option value="Hitam">Hitam</option>
                    <option value="Putih">Putih</option>
                    <option value="Biru">Biru</option>
                    <option value="Navy">Navy</option>
                    <option value="Maroon">Maroon</option>
                  </select>
                </div>
                <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="pegawai">
              </form>
              </div>
              </div>
              <!-- END FORM ENTRY PO -->
          </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>