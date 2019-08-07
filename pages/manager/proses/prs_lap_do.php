<?php
  include('../../../connection/config.php');
  session_start(); //Mendapatkan Session

  date_default_timezone_set('Asia/Jakarta');
  function tglIndonesia($str){
        $tr   = trim($str);
        $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
        return $str;
    }

  $thn = $_POST['tahun'];
  $bln = $_POST['bulan'];

  ob_start();
  //Report
  require ("../../../html2pdf/html2pdf.class.php");
  $content = ob_get_clean();

  $content.= "
  <style>
  p.kop{
    margin: 5px 0 0 45px;
  }
  </style>
  <table class='kop' border='0'>
  <tr>
    <td align='center'><img src='../../../images/logo.jpeg' width='180' height='60'></td>
    <td width='555'>
      <h4 align='center'>PT. TRIJAYA ABADI KUSUMA</h4>
      <p class='kop'>  Jl. Prabu Siliwangi No.1, Gembor, Periuk, Kota Tangerang, Banten 15133</p>
    </td>
  </tr>
  </table> <br>
  <hr> <br>
  <h4 align='center'>DELIVERY ORDER</h4>
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
      <tr bgcolor='#CCCCCC'>
        <th style='width: 30px; height: 20px'>#</th>
        <th style='width: 110px;'>No.DO</th>
        <th style='width: 70px;'>No.PO</th>
        <th style='width: 120px;'>Nama Pelanggan</th>
        <th style='width: 82px;'>Tgl.DO</th>
        <th style='width: 110px;'>Total Harga</th>
        <th style='width: 110px;'>Denda</th>
        <th style='width: 100px;'>Keterlambatan</th>
      </tr>";
      // Menampilkan data
      $query = mysql_query("
        SELECT a.*, b.*, c.*, d.*
        FROM do a 
        JOIN salinan_po b ON a.no_po=b.no_po
        JOIN detil_po c ON b.no_po=c.no_po
        JOIN barang d ON c.id_barang=d.id_barang
        WHERE YEAR(a.tgl_do)='$thn' AND MONTH(a.tgl_do)='$bln'
        GROUP BY no_do");
      $no = 1; // nomor baris
      while ($r = mysql_fetch_array($query)) {
        $dnd = 'Rp ' . number_format( $r['denda'], 0 , '' , '.' ) . ',-';
        $ttl = 'Rp ' . number_format( $r['total_harga'], 0 , '' , '.' ) . ',-';
        //Menghitung keterlambatan
        $start_date = new DateTime($r['tgl_pengiriman']);
        $end_date = new DateTime($r['tgl_do']);
        $interval = $start_date->diff($end_date);

      $content.="<tr bgcolor='#FFFFFF'>
        <td>$no</td>
        <td>$r[no_do]</td>
        <td>$r[no_po]</td>
        <td>$r[nm_customer]</td>
        <td>$r[tgl_do]</td>
        <td>$ttl</td>
        <td>$dnd</td>
        <td>$interval->days Hari</td>
      </tr>";
      $no++;
      }
    $content.="</table></p><br><br>";
//echo 'Rp ' . number_format( $row_do["grand"], 0 , '' , '.' ) . ',-'; '</td>';
  $filename="Laporan DO ".date('d-m-y').".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya

  ob_end_clean();
  // conversion HTML => PDF
  try
  {
    $html2pdf = new HTML2PDF('P', 'A4','en', false, 'ISO-8859-15');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->pdf->IncludeJS('print(TRUE)');
    $html2pdf->Output($filename);
  }
  catch(HTML2PDF_exception $e) { echo $e; }
?>

