<?php
  include 'config/connectdb.php';
  $sql = "SELECT * FROM sanpham WHERE id_sp = '".$_GET['id']."'";
  $result = mysql_query($sql);
  if ($result) $row = mysql_fetch_array($result);

  $sql = "SELECT * FROM loaisanpham WHERE group_id = '".$row['group_id']."'";
  $result = mysql_query($sql);
  if ($result) $row_loaisp = mysql_fetch_array($result);
?>
<div class="container-fluid text-left">
  <div class="row content">
    <div class="col-sm-2 sidenav text-left">
      <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-10">
          <div class="btn-group btn-breadcrumb">
            <a href="index.php" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-default"><?= $row_loaisp['group_name'] ?></a>
          </div>
        </div>
      </div>
      <br>
    </div>
    <div class="col-sm-10">

      <div>
        <br><br>
        <div class="container-fluid">
          <div class="wrapper row">
            <div class="preview col-md-6">

              <img src="libraries/img/<?= $row['img1'] ?>" width="400" height="auto">


            </div>
            <div class=" col-md-6">
              <h3 class="product-title"><a href="#"><?= $row['name'] ?></a></h3>
              <div>
                <label>Còn hàng</label>
              </div>
              <div>
                <label><?= $row_loaisp['group_name'] ?></label>
              </div>
              <div>
                <label class="list-unstyled glyphicon glyphicon-ok"> Đổi hàng trong vòng hai ngày kể từ ngày mua</label>
                <br>
                <label class="list-unstyled glyphicon glyphicon-ok"> Tư vấn online 24/7</label>
                <br>
                <label class="list-unstyled glyphicon glyphicon-ok"> Ship hàng toàn quốc</label>
                <br>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-4">
                  <label for="Số lượng">Số lượng</label>
                </div>
                <div class="col-md-9">
                  <input type="number" class="col-md-3" id="Số lượng">
                </div>
              </div>
              <br>
              <h2 class="price"><span><?= number_format($row['price']) ?>đ</span></h2>

              <h5 class="sizes">sizes:
                <span class="size" data-toggle="tooltip" title="small">s</span>
                <span class="size" data-toggle="tooltip" title="medium">m</span>
                <span class="size" data-toggle="tooltip" title="large">l</span>
                <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
              </h5>
              <h5 class="colors">colors:
                <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                <span class="color green"></span>
                <span class="color blue"></span>
              </h5>
              <div class="action">
                <button class="btn btn-success btn-giohang" id="<?= $_GET['id'] ?>">Thêm vào giỏ</button>
                <button class="like btn btn-success" type="button"><span class="glyphicon glyphicon-heart"></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$('.btn-giohang').on('click', function() {
  var id = $(this).attr('id');
  $.ajax("views/category/cart.php?action=add&id=" + id)
    .done((msg) => {
      var strId = "" + id;;
      for (var i = 0; i < 10; i++) {
        strId += Math.floor(Math.random() * 10);
      }
      $('.alert-giohang').append('<div class="alert alert-success alert-dismissible fade in" id="' + strId + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><a href="index.php?page=giohang" class="alert-link">Đã thêm <strong>' + msg + '</strong> vào giỏ hàng</a></div>');
      window.setTimeout(function() {
        $("#" + strId).fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
      }, 3000);
    });
});
</script>
