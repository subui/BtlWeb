<?php
  if (isset($_GET['category'])) {
    $group_id = $_GET['category'];
  }

  require 'config/connectdb.php';
  if (isset($group_id)) {
    $sql = "Select * from loaisanpham where group_id=$group_id";
    $result = mysql_query($sql);
    if ($result) {
      $row = mysql_fetch_array($result);
    }
  }

  if (isset($_GET['action']) && $_GET['action'] == 'addcart') {
    $sql_kh = "select id_kh from khachhang where username = '".$_SESSION['username']."'";
    $result_kh = mysql_query($sql_kh);
    $row_kh = mysql_fetch_array($result_kh);

    $sql_sp = "select * from sanpham where id_sp = '".$_GET['id']."'";
    $result_sp = mysql_query($sql_sp);
    $row_sp = mysql_fetch_array($result_sp);

    if (!isset($_SESSION['giohang'])) {
      $_SESSION['giohang'] = array();
    }
    if (array_key_exists($_GET['id'], $_SESSION['giohang'])) {
      $_SESSION['giohang'][$_GET['id']] = $_SESSION['giohang'][$_GET['id']] + 1;
    } else {
      $_SESSION['giohang'][$_GET['id']] = 1;
      if (!isset($_SESSION['sl'])) {
        $_SESSION['sl'] = 0;
      }

      $_SESSION['sl']++;
    }

    // $sql_donhang = "insert into donhang (id_kh, id_sp, soluong, price, thanhtien, ngaythang) values ('".$row_kh['id_kh']."', '".$_GET['id']."', 1, ".$row_sp['price'].", ".$row_sp['price'].", '".date("Y-m-d H:i:s")."')";
    // $result = mysql_query($sql_donhang);
    // if ($result) {
    // }
  }
  require 'config/closeConnectDb.php';
?>
<div class="col-sm-9 text-left">
  <br>
  <br>
  <br>
  <div class="container-fluid">
    <div class="well well-sm">
      <strong><?= isset($row) ? $row['group_name'] : 'Sản Phẩm' ?></strong>
      <div class="btn-group">
        <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span> List</a>
        <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span> Grid</a>
      </div>
    </div>
    <?php include 'views/category/danhsachsp.php'; ?>
  </div>
</div>
