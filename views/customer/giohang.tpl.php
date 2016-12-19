<div class="container-fluid text-left">
  <div class="row content">
    <div class="col-sm-2 sidenav text-left">
      <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-10">
          <div class="btn-group btn-breadcrumb">
            <a href="index.php" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-default">Giỏ hàng</a>
          </div>
        </div>
      </div>
      <br>
    </div>
    <div class="col-sm-10">
      <div class="container-form">
        <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th class="text-center">Giá bán</th>
                  <th class="text-center">Tổng cộng</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <?php
                require 'config/connectdb.php';
                // $sql = "Select * from donhang";
                // $result = mysql_query($sql);
                // if($result) {
                //   while($row = mysql_fetch_array($result)) {
                //     $query_sp = mysql_query("select img1, name from sanpham where id_sp = '".$row['id_sp']."'");
                //     $row_sp = mysql_fetch_array($query_sp);
                if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                  $sum = 0;
                  foreach ($_SESSION['giohang'] as $key => $value) {
                    $sql = "select * from sanpham where id_sp = '$key'";
                    $result = mysql_query($sql);
                    $row = mysql_fetch_array($result);
                    $sum += $value * $row['price'];
                    ?>
                    <tr id="<?= $key ?>">
                      <td class="col-sm-8 col-md-6">
                        <div class="media">
                          <a class="thumbnail pull-left" href="#"> <img class="media-object" src="libraries/img/<?= $row['img1'] ?>" style="width: 72px; height: 72px;"> </a>
                          <div class="media-body">
                            <br>
                            <h4 class="media-heading"><a href="#"><?= $row['name'] ?></a></h4>
                            <span></span><span class="text-success"><strong></strong></span>
                          </div>
                        </div>
                      </td>
                      <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" value="<?= $value ?>">
                      </td>
                      <td class="col-sm-1 col-md-1 text-center"><strong class="price" value="<?= $row['price'] ?>"><?= number_format($row['price']) ?></strong></td>
                      <td class="col-sm-2 col-md-2 text-center"><strong class="sum" value="<?= $value * $row['price'] ?>"><?= number_format($value * $row['price']) ?></strong></td>
                      <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-link btn-lg trash">
                          <span class="glyphicon glyphicon-trash"> </span>
                        </button>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
                <tr>
                  <td>   </td>
                  <td>   </td>
                  <td>   </td>
                  <td><h5>Đơn giá</h5></td>
                  <td class="text-right"><h5><strong id="dongia"><?= number_format($sum) ?>đ</strong></h5></td>
                </tr>
                <tr>
                  <td>   </td>
                  <td>   </td>
                  <td>   </td>
                  <td><h5>Phí giao hàng</h5></td>
                  <td class="text-right"><h5><strong>30.000đ</strong></h5></td>
                </tr>
                <tr>
                  <td>   </td>
                  <td>   </td>
                  <td>   </td>
                  <td><h3>Tổng cộng</h3></td>
                  <td class="text-right"><h3><strong id="tongcong"><?= number_format($sum + 30000) ?>đ</strong></h3></td>
                </tr>
                <tr>
                  <td>   </td>
                  <td>   </td>
                  <td>
                    <button type="button" class="btn btn-default">
                      <span class="glyphicon glyphicon-shopping-cart"></span>Tiếp tục mua sắm
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success">
                      Cập nhật <span class="glyphicon glyphicon-refresh"></span>
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success">
                      Thanh toán <span class="glyphicon glyphicon-play"></span>
                    </button>
                  </td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="col-sm-0 sidenav">

</div>
<br>
<script>
  $('input').on('input', function() {
    var parent = $(this).parent().parent();
    var id = parent.attr('id');
    var value = $(this).val();
    var price = parent.find('.price').attr('value');
    parent.find('.sum').attr('value', value * price);
    parent.find('.sum').text((value * price).toLocaleString());
    var sum = 0;
    $.each($('.sum'), function(a, b){
      sum += parseInt(b.getAttribute('value'));
    });
    $('#dongia').text(sum.toLocaleString() + "đ");
    $('#tongcong').text((sum + 30000).toLocaleString() + "đ");

    $.ajax("views/category/cart.php?action=add&id=" + id + "&value=" + value)
      .error((msg) => console.log(msg));
  });

  $('.trash').on('click', function() {
    var parent = $(this).parent().parent();
    var id = parent.attr('id');

    $.ajax("views/category/cart.php?action=remove&id=" + id)
      .done(() => {
        parent.remove();
        var sum = 0;
        $.each($('.sum'), function(a, b){
          sum += parseInt(b.getAttribute('value'));
        });
        $('#dongia').text(sum.toLocaleString() + "đ");
        $('#tongcong').text((sum + 30000).toLocaleString() + "đ");
      })
      .error((msg) => console.log(msg));
  });
</script>
