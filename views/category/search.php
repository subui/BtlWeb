<?php
function khong_dau($str) { // hàm chuyển tiếng việt có dấu thành không dấu
  // In thường
  $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
  $str = preg_replace("/(đ)/", 'd', $str);
  // In đậm
  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
  $str = preg_replace("/(Đ)/", 'D', $str);
  return $str; // Trả về chuỗi đã chuyển
}

$q = strtolower(khong_dau($_GET['q']));
?>
<img src="heading-products.jpg" width="1360" height="50">
<div class="container-fluid text-center" style="margin-top: 20px">
  <div class="alert-giohang"></div>
  <div class="row content">
    <div class="col-sm-2 sidenav text-left">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <div class="btn-group btn-breadcrumb">
            <a href="index.php" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-default">Tìm kiếm</a>
          </div>
        </div>
      </div>
      <br>
    </div>
    <div class="col-sm-9 text-left">
      <h3 id="timkiem">Tìm thấy mặt hàng với từ khóa: <i><?= $_GET['q'] ?></i></h3>
      <div class="container-fluid">
        <div class="well well-sm">
          <strong>Tìm Kiếm</strong>
          <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span> List</a>
            <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span> Grid</a>
          </div>
        </div>
        <div id="products" class="row list-group">
          <?php
          $count = 0;
          require 'config/connectdb.php';
          $sql = "Select * from sanpham";
          $result = mysql_query($sql);
          if($result) {
            while($row = mysql_fetch_assoc($result)) {
              $name = strtolower(khong_dau($row['name']));
              if (strpos($name, $q) !== false) {
                $count++;
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
          }
          require 'config/closeConnectDb.php';

          if ($count > 0) {
            echo '<script>$("#timkiem").html("Tìm thấy '.$count.' mặt hàng với từ khóa: <i>'.$_GET['q'].'</i>");</script>';
          } else {
            echo '<script>$("#timkiem").html("Không tìm thấy mặt hàng nào với từ khóa: <i>'.$_GET['q'].'</i>");</script>';
          }

          ?>
        </div>
      </div>
    </div>
  </div>
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
    $('.alert-giohang').append('<div class="alert alert-success alert-dismissible fade in" id="' + strId + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><a href="index.php?page=giohang" class="alert-link">Đã thêm <strong>' + msg + '</strong> vào giỏ hàng</a></div>');
    window.setTimeout(function() {
      $("#" + strId).fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 3000);
  });
});
</script>
