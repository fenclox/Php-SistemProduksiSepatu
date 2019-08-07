<?php
  include('../../../connection/config.php');
  session_start(); //Mendapatkan Session

  date_default_timezone_set('Asia/Jakarta');
  function tglIndonesia($str){
        $tr   = trim($str);
        $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
        return $str;
    }

  $nopo=$_GET['nopo'];
  //Menampilkan tanggal
  $q1 = "select no_po, tgl_po from salinan_po where no_po='$nopo'";
  $q2 = mysql_query($q1);
  while($data = mysql_fetch_array($q2)){
    $tgl = $data['tgl_po'];
    $id = $data['no_po'];
  };

  $u_tgl = date("Y-m-d", strtotime($tgl));
  $v_tgl = tglIndonesia(date(" d F Y", strtotime($u_tgl)));

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
  <h4 align='center'>DETIL PO</h4>

  <table>
  <tr>
    <td width='365'><h5 align='left'> Nomor PO : &nbsp; $id</h5></td>
    <td width='370'><h5 align='right'>Tanggal PO : &nbsp; $v_tgl</h5></td>
  </tr>
  </table>

  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
      <tr bgcolor='#CCCCCC'>
        <th style='width: 30px; height: 20px'>#</th>
        <th style='width: 120px;'>ID Barang</th>
        <th style='width: 290px;'>Nama Barang</th>
        <th style='width: 75px;'>Jumlah</th>
        <th style='width: 75px;'>Ukuran</th>
        <th style='width: 145px;'>Warna</th>
      </tr>";
      // Menampilkan data
      $query = mysql_query("SELECT detil_po.id_barang as brgdetil, ukuran, warna, barang.id_barang, nm_barang, model, jumlah_pesan from salinan_po, detil_po, barang where salinan_po.no_po=detil_po.no_po and barang.id_barang=detil_po.id_barang and detil_po.no_po = '$nopo' ORDER by barang.nm_barang asc");
      $no = 1; // nomor baris
      while ($r = mysql_fetch_array($query)) {
      $content.="<tr bgcolor='#FFFFFF'>
        <td>$no</td>
        <td>$r[id_barang]</td>
        <td>$r[nm_barang] $r[model]</td>
        <td>$r[jumlah_pesan]</td>
        <td>$r[ukuran]</td>
        <td>$r[warna]</td>
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

