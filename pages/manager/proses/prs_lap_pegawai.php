<?php
  include('../../../connection/config.php');
  session_start(); //Mendapatkan Session

  date_default_timezone_set('Asia/Jakarta');
  function tglIndonesia($str){
        $tr   = trim($str);
        $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
        return $str;
    }

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
  <h4 align='center'>DATA PEGAWAI</h4>
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
      <tr bgcolor='#CCCCCC'>
        <th style='width: 30px; height: 20px'>#</th>
        <th style='width: 80px;'>ID Pegawai</th>
        <th style='width: 200px;'>Nama Pegawai</th>
        <th style='width: 245px;'>Alamat</th>
        <th style='width: 100px;'>No. Telp</th>
        <th style='width: 80px;'>Bagian</th>
      </tr>";
      // Menampilkan data
      $query = mysql_query("SELECT * FROM Pegawai where level!='0'");
      $no = 1; // nomor baris
      while ($r = mysql_fetch_array($query)) {
      $content.="<tr bgcolor='#FFFFFF'>
        <td>$no</td>
        <td>$r[id_pegawai]</td>
        <td>$r[nm_pegawai]</td>
        <td>$r[alamat]</td>
        <td>$r[no_telp]</td>
        <td>$r[bagian]</td>
      </tr>";
      $no++;
      }
    $content.="</table></p><br><br>";

  $filename="Laporan Pegawai ".date('d-m-y').".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya

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

