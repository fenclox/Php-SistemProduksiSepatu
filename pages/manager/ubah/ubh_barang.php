<?php
  include "../../../Connection/config.php";
  
  $tampil = mysql_query("SELECT * FROM barang where id_barang='".$_GET['q']."'");
  $r = mysql_fetch_array($tampil);
?>
<div class="form-group">
  <label>ID Barang</label>
  <input name="id" type="text" class="form-control" value="<?php echo $r['id_barang'];?>" readonly="">
</div>
<div class="form-group">
  <label>Nama Barang-</label>
  <input name="nama" type="text" class="form-control" value="<?php echo $r['nm_barang'];?>" placeholder="Masukkan Nama Barang" maxlength="50" required="">
</div>
<div class="form-group">
  <label>Model</label>
  <input name="model" class="form-control" value="<?php echo $r['model'];?>" placeholder="Masukkan Model" required="" maxlength="15">
</div>
<div class="form-group">
  <label>Harga</label>
  <input name="harga" type="text" class="form-control" value="<?php echo $r['harga'];?>" placeholder="Masukkan Harga" maxlength="6" required="" onkeypress="return isNumberKey(event)" style="text-transform: capitalize;">
</div>