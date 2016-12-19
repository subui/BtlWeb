<?php
  session_start();
  if ($_GET['action'] == 'add') {
    if (isset($_GET['value'])) {
      $value = $_GET['value'];
    } else {
      if (array_key_exists($_GET['id'], $_SESSION['giohang'])) {
        $value = $_SESSION['giohang'][$_GET['id']] + 1;
      } else {
        $value = 1;
      }
    }

    $_SESSION['giohang'][$_GET['id']] = $value;

    require '../../config/connectdb.php';
    $sql = "Select * from sanpham where id_sp='".$_GET['id']."'";
    $result = mysql_query($sql);
    if ($result) {
      $row = mysql_fetch_array($result);
      echo $row['name'];
    }
    require '../../config/closeConnectDb.php';
  } else {
    unset($_SESSION['giohang'][$_GET['id']]);
    $_SESSION['sl']--;
  }
  // print_r($_SESSION['giohang']);
?>
