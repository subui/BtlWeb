<?php
  session_start();
  if ($_GET['action'] == 'add') {
    $_SESSION['giohang'][$_GET['id']] = $_GET['value'];
  } else {
    unset($_SESSION['giohang'][$_GET['id']]);
    $_SESSION['sl']--;
  }
  print_r($_SESSION['giohang']);
?>
