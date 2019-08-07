<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Laporan Data Pegawai
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <form method="post" action="proses/prs_lap_pegawai.php">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <h5>Klik tombol di bawah ini untuk melihat laporan seluruh data pegawai.</h5>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" style="margin-top: 10px">Proses</button>
              </div>
            </div>
            <!-- /.input group -->
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->