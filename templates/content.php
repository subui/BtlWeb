<br>
<div class="container">
  <div class="row">
    <div class="col-sm-1" align="right"><img src="views/front/policy_1.png" width="40" height="40">
    </div>
    <div class="col-sm-3">
      <strong>FREE SHIP</strong>
      <h5>Cho khách hàng chuyển khoản trước</h5>
    </div>
    <div class="col-sm-1" align="right"><img src="views/front/policy_2.png" width="40" height="40">
    </div>
    <div class="col-sm-3">
      <strong>SHIP TOÀN QUỐC</strong>
      <h5>Nhận hàng rồi thanh toán</h5>
    </div>
    <div class="col-sm-1" align="right"><img src="views/front/policy_3.png" width="40" height="40">
    </div>
    <div class="col-sm-3">
      <strong>24/7</strong>
      <h5>Giải đáp các thắc mắc</h5>
    </div>
  </div>
  <br>
  <br>
  <div class="container text-center">
    <h2><strong>G I À Y D É P</strong></h2>
    <h5>Trending</h5>
    <br>
    <div class="row">
      <?php
      require 'config/connectdb.php';
      $sql = "SELECT * FROM sanpham WHERE group_id='2' and highLight = '1'";
      $result = mysql_query($sql);
      while($row = mysql_fetch_assoc($result)){
        ?>
        <div class="col-sm-3">
          <a href="index.php?page=chitiet&id=<?= $row['id_sp'] ?>" style="color: #000">
            <img src="libraries/img/<?= $row['img1']; ?>" class="img-responsive" style="width:100%" alt="Image">
            <br>
            <h5 align="center"><?php echo $row['name']; ?></h5>
            <h3 align="center"><strong><?= number_format($row['price']) ?>đ</strong></h3>
          </a>
        </div>
        <?php }
        require 'config/closeConnectDb.php';
        ?>
      </div>
    </div>
  </div>
  <br>

  <br>
  <br>
  <br>
  <div class="container text-center">
    <h2><strong>SẢN PHẨM TIÊU BIỂU</strong></h2>
    <br>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <img src="views/front/img_3168_large.jpg" class="img-responsive" style="width:100%" alt="Image">
        <br>
        <h5 align="left"><strong>Hoodie SPAO</strong></h5>
        <h5 align="left">Áo</h5>

        <h3 align="left"><strong>350,000đ</strong></h3>
      </div>
      <div class="col-sm-3">
        <img src="views/front/img_1890_large.jpg" class="img-responsive" style="width:100%" alt="Image">
        <br>
        <h5 align="left"><strong>Roshe One 2</strong></h5>
        <h5 align="left">Giày</h5>

        <h3 align="left"><strong>950,000đ</strong></h3>
      </div>
      <div class="col-sm-3">
        <img src="views/front/img_3366_large.jpg" class="img-responsive" style="width:100%" alt="Image">
        <br>
        <h5 align="left"><strong>Zoom Out Collection</strong></h5>
        <h5 align="left">Giày</h5>

        <h3 align="left"><strong>1,400,000đ</strong></h3>
      </div>
      <div class="col-sm-3">
        <img src="views/front/img_2215_large.jpg" class="img-responsive" style="width:100%" alt="Image">
        <br>
        <h5 align="left"><strong>Zoom pegasus 34</strong></h5>
        <h5 align="left">Giày</h5>

        <h3 align="left"><strong>1,050,000đ</strong></h3>
      </div>
    </div>
    <br>
    <br>
    <button type="button" class="btn btn-primary btn-md">Xem tất cả</button>

  </div>
