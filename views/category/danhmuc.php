<?php
  require 'config/connectdb.php';
  $sql = "Select * from loaisanpham where group_id=".(isset($_GET['category']) ? $_GET['category'] : "1");
  $result = mysql_query($sql);
  if ($result) {
    $row = mysql_fetch_array($result);
  }
  require 'config/closeConnectDb.php';
?>
<div class="col-sm-2 sidenav text-left">
  <div class="row">

    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="btn-group btn-breadcrumb">
        <a href="index.php" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
        <a href="#" class="btn btn-default"><?= $row['group_name'] ?></a>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-9" align="center">
      <h4><strong>DANH MỤC</strong></h4>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="list-group">
        <?php
          require 'config/connectdb.php';
          $sql = "Select * from loaisanpham";
          $result = mysql_query($sql);
          if ($result) {
            while($row = mysql_fetch_assoc($result)) {
        ?>
              <a class="list-group-item" href="index.php?page=sp&category=<?= $row['group_id'] ?>"><i class="btn-md"></i><?= $row['group_name'] ?></a>
        <?php
            }
          }
          require 'config/closeConnectDb.php';
        ?>
      </div>
    </div>

  </div>
</div>
