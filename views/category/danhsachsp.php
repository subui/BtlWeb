<div id="products" class="row list-group">
  <?php
  require 'config/connectdb.php';
  if (isset($group_id)) {
    $sql = "Select * from sanpham where group_id='$group_id'";
  } else {
    $sql = "Select * from sanpham";
  }
  $result = mysql_query($sql);
  if($result) {
    while($row = mysql_fetch_assoc($result)) {
      ?>
      <div class="item  col-xs-4 col-lg-4" id="<?= $row['id_sp'] ?>">
        <div class="thumbnail">
          <a href="index.php?page=chitiet&id=<?= $row['id_sp'] ?>">
            <img class="group list-group-image img-size" src="libraries/img/<?php echo $row['img1']; ?>" alt=""/>
          </a>
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
    var strId = "" + id;;
    for (var i = 0; i < 10; i++) {
      strId += Math.floor(Math.random() * 10);
    }
    var name = msg.split(":")[0];
    $('.alert-giohang').append('<div class="alert alert-success alert-dismissible fade in" id="' + strId + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><a href="index.php?page=giohang" class="alert-link" style="font-weight: normal">Đã thêm <strong>' + name + '</strong> vào giỏ hàng</a></div>');
    window.setTimeout(function() {
      $("#" + strId).fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 3000);

    var quantity = msg.split(":")[1];
    $("#sl").text("Giỏ hàng (" + quantity + ")");
  });
});
</script>
