<?php
session_start();
require_once("../../Connection/config.php");
$id     = $_POST['id'];
$pass   = $_POST['password'];
$level  = $_POST['level'];

$query = mysql_query("SELECT id_pegawai,password,level FROM pegawai WHERE id_pegawai='$id' AND password='$pass'"); // Membandingkan kode & password
    if(mysql_num_rows($query) == 0){
      ?>
      <script type="text/javascript">
          alert("Login Gagal");
          document.location="index.php";
      </script>
      <?php
    } else{
      $row = mysql_fetch_array($query);

      if ($row['level'] == 0 && $level == 0){ // Membandingkan level
        $_SESSION['id']=$id;
        header("Location:../manager/index.php"); // Mengalihkan file setelah berhasil login
      } else if ($row['level'] == 1 && $level == 1){
        $_SESSION['id']=$id;
        header("Location:../planning/index.php");
      } else if ($row['level'] == 2 && $level == 2){
        $_SESSION['id']=$id;
        header("Location:../produksi/index.php");
      } else {
        ?>
        <script type="text/javascript">
            alert("Login Gagal");
            document.location="index.php";
        </script>
        <?php mysql_error();
      }
    }
?>
