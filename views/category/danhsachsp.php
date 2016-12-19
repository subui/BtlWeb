<div id="products" class="row list-group">
  <?php
    require 'config/connectdb.php';
    $sql = "Select * from sanpham where group_id='$group_id'";
    $result = mysql_query($sql);
    if($result) {
      while($row = mysql_fetch_assoc($result)) {
  ?>
      <div class="item  col-xs-4 col-lg-4">
        <div class="thumbnail">
          <img class="group list-group-image img-size" src="libraries/img/<?php echo $row['img1']; ?>" alt=""/>
          <div class="caption">
            <h4 class="group inner list-group-item-heading"><?= $row['name']; ?></h4>
            <div class="row">
              Giá: <p class="lead"><?= number_format($row['price']); ?> VNĐ/chiếc</p>
            </div>
            <div class="row">
              <a class="btn btn-success btn-giohang" id="<?= $row['id_sp'] ?>" href="index.php?page=sp&category=<?= $group_id ?>&action=addcart&id=<?= $row['id_sp'] ?>">Thêm vào giỏ</a>
              <!-- <a class="btn btn-success" href="../customer/giohang.tpl.php">Thêm vào giỏ</a> -->
            </div>
          </div>
        </div>
      </div>
  <?php
      }
    }
    require 'config/closeConnectDb.php';
  ?>
</div>
