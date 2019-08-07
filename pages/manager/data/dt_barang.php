  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang
      </h1>
      <ol class="breadcrumb">
        <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><button type="button" class="btn btn-primary" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambah"><i class="glyphicon glyphicon-plus"></i></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Model</th>
                <th>Harga</th>
                <th><span class="glyphicon glyphicon-cog"></span></th>
              </tr>
            </thead>
            <tbody>
              <!-- Data barang -->
              <?php
              $query="SELECT * from barang order by id_barang asc";
              $tampil = mysql_query($query);
              $no = 1; // nomor baris
              while ($r = mysql_fetch_array($tampil)) {
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$r[id_barang]</td>
                        <td style='text-transform: capitalize;'>$r[nm_barang]</td>
                        <td style='text-transform: capitalize;'>$r[model]</td>
                        <td>$r[harga]</td>
                        <td> "; ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" value='<?php echo $r['id_barang'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubah"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                        <button type="button" class="btn btn-danger" value='<?php echo $r['id_barang'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                    </tr>
                  <?php
                  $no++;}
              ?>
              <!-- End Data Barang -->
            </table>
          </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--**************************************** Modals ****************************************-->
  <!--****************** Tambah ******************-->
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Barang</h4>
        </div>
        <div class="modal-body">
          <!-- general form elements -->
            <!-- form start -->
            <form role="form" method="POST" action="proses/prs_barang.php">
              <div class="box-body">
                <div class="form-group">
                  <?php
                    $query = mysql_query("SELECT max(id_barang) as maxNO FROM barang");
                    $row = mysql_fetch_array($query);
                    $idMax = $row['maxNO'];
                    $idMax++;
                    $id = sprintf('%05s', $idMax);
                  ?>
                  <label>ID Barang</label>
                  <input name="id" type="text" class="form-control" value="<?php echo $id ?>" readonly="">
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama Barang" maxlength="30" required="">
                </div>
                <div class="form-group">
                  <label>Model</label>
                  <input name="model" type="text" class="form-control" placeholder="Masukkan Model Barang" maxlength="30" required="">
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input name="harga" type="text" class="form-control" placeholder="Masukkan Harga Barang" maxlength="6" onkeypress="return isNumberKey(event)" required="">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          <!-- /.box -->
        </div>
      </div>
    </div>
  </div>
  <!--****************** Ubah ******************-->
  <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Barang</h4>
        </div>
        <div class="modal-body">
          <!-- general form elements -->
            <!-- form start -->
            <form role="form" method="POST" action="proses/prs_barang.php">
              <div class="box-body">
                <!-- Ubah Data -->
                <span id="dub"></span>
                <!-- End Ubah Data -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button name="ubah" type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </form>
          <!-- /.box -->
        </div>
      </div>
    </div>
  </div>
  <!--****************** Hapus ******************-->
  <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Barang</h4>
        </div>
        <div class="modal-body">
          <!-- general form elements -->
            <!-- form start -->
            <form role="form" method="POST" action="proses/prs_barang.php">
              <div class="box-body">
                Yakin ingin menghapus data?
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" id="id" name="id" value="">
                <button name="hapus" type="submit" class="btn btn-primary">Hapus</button>
              </div>
            </form>
          <!-- /.box -->
        </div>
      </div>
    </div>
  </div>
  <!--**************************************** /Modals ****************************************-->
  <!-- Ubah & hapus data -->
  <script>
  function ubahdata(id_barang){
      var ajaxbos = new XMLHttpRequest();
          ajaxbos.onreadystatechange= function(){
              if(ajaxbos.readyState==4 && ajaxbos.status==200){
                  document.getElementById("dub").innerHTML= ajaxbos.responseText;
              }
          };
          ajaxbos.open("GET","ubah/ubh_barang.php?q="+id_barang+"&s=#",true);
          ajaxbos.send();
      }
  function hapusdata(id_barang){
      document.getElementById('id').value=id_barang;
  }
</script>
