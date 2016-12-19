<div id="products" class="row list-group">
  <?php
    require 'config/connectdb.php';
    $sql = "Select * from sanpham where group_id='$group_id'";
    $result = mysql_query($sql);
    if($result) {
      while($row = mysql_fetch_assoc($result)) {
  ?>
      <div class="item  col-xs-4 col-lg-4" id="<?= $row['id_sp'] ?>">
        <div class="thumbnail">
          <img class="group list-group-image img-size" src="libraries/img/<?php echo $row['img1']; ?>" alt=""/>
          <div class="caption">
            <h4 class="group inner list-group-item-heading"><?= $row['name']; ?></h4>
            <div class="row">
              Giá: <p class="lead"><?= number_format($row['price']); ?> VNĐ/chiếc</p>
            </div>
            <div class="row">
              <button class="btn btn-success btn-giohang">Thêm vào giỏ</button>
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
<script>
  $('.btn-giohang').on('click', function() {
    var parent = $(this).parent().parent().parent().parent();
    var id = parent.attr('id');
    $.ajax("views/category/cart.php?action=add&id=" + id)
      .done((msg) => {
        $('.alert-giohang').append('<div class="alert alert-success alert-dismissible fade in" id="alert' + id + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Đã thêm ' + msg + ' vào giỏ hàng</div>');
        window.setTimeout(function() {
          $("#alert" + id).fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
        }, 3000);
      });
  });
</script>
