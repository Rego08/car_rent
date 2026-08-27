

<!-- <?php
	session_start();
	if (!isset($_SESSION['tuvastamine'])) {
	  header('Location: adminlogin.php');
	  exit();
	  }
    ?> -->
<?php
include ("config.php");
$paring="DELETE FROM cars WHERE id = ".$_GET['del_id']."";
$result= mysqli_query($yhendus, $paring);
header('Location: admin.php');
?>