<?php
    ob_start();
    session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hóa Đơn Thanh Toán</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <script src="../../bootstrap/js/jquery.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css">
  body{
    margin:40px;
    background: #3c3d41!important;
  }
  .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
  }
  .btn-circle.btn-sm {
    width: 25px;
    height: 25px;
    padding: 3px 3px;
    font-size: 12px;
    line-height: 1.33;
    border-radius: 25px;
  }

  </style>
</head>

<body style="background-color:#9CC">



  <div id="login-overlay" class="modal-lg modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class='container-fluid'>
          <div class='row' style='padding-top:25px; padding-bottom:25px;'>
            <div class='col-md-12'>
              <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                  <h2 style="text-align: center;">
                    Thông tin đơn hàng của bạn
                  </h2>
                  <hr/>
                  <a href="../../index.php?page=sp&category=1" class="btn btn-info" style="width: 100%;">Thêm sản phẩm vào giỏ hàng</a>
                  <hr/>
                  <div class="shopping_cart">
                    <form class="form-horizontal" role="form" action="donhang.tpl.php" method="post" id="payment-form">
                      <div class="panel-group active" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <b>Đơn hàng của bạn</b>
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="items">
                                <div class="col-md-9">
                                  <table class="table table-striped">
                                    <tr>
              <?php
                  require '../../config/connectdb.php';
                  $sum = 0;
                  if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                      foreach ($_SESSION['giohang'] as $key => $value) {
                        $sql = "select * from sanpham where id_sp = '$key'";
                        $result = mysql_query($sql);
                        while ($row = mysql_fetch_array($result)){
                        $sum += $value * $row['price'];

              ?>
                                    </tr>
                                    <tr>
                                      <td>
                                        <ul>
                                          <li><?php echo $row['name']; ?></li>
                                        </ul>
                                      </td>
                                      <td>
                                        <b><?php echo number_format($value * $row['price']); ?></b>
                                      </td>
                                    </tr>
                          <?php
                               }
                             }
                           }
                          ?>
                                  </table>
                                </div>
                                <div class="col-md-3">
                                  <div style="text-align: center;">
                                    <h3>Tổng hóa đơn</h3>
                                    <h3><span style="color:green;"><?= number_format($sum + 30000); ?></span></h3>
                                  </div>
                                </div>
                              </div>
                              <input class="btn btn-success" type="submit" value="Thanh toán" name="submit">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
  <?php
        if (isset($_POST['submit'])) {
          require '../../config/connectdb.php';
          $idSp = ""; $priceSp = ""; $soLuong = ""; $number = 0;
          foreach ($_SESSION['giohang'] as $key => $value) {
            $idSp .= $key.",";
            $soLuong .= $value.",";
            $sum = 0;
            $sql = "select * from sanpham where id_sp = '$key'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_array($result)){
              $priceSp .= $row['price'].",";
              $sum += $value * $row['price'];
            }
          }
          $sql = "INSERT INTO donhang(id_kh,id_sp,soluong,price,thanhtien) VALUES ('".$_SESSION["id_kh"]."','".$idSp."','".$soLuong."','".$priceSp."','".$sum."')";
          $result = mysql_query($sql);
          if (!$result) {
            echo "<script>alert('Giao dịch không thành công')</script>";
            return;
          }

          $sql = "select number_hd from khachhang where id_kh = '".$_SESSION['id_kh']."'";
          $result = mysql_query($sql);
          $row = mysql_fetch_assoc($result);
          $number += $row['number_hd'] +1;

          $sql = "update khachhang set number_hd='".$number."' where id_kh='".$_SESSION['id_kh']."'";
          $result = mysql_query($sql);

          if($result){
            foreach ($_SESSION['giohang'] as $key => $value) {
              $sql = "select * from sanpham where id_sp = '$key'";
              $result = mysql_query($sql);
              $row = mysql_fetch_array($result);
              $sl_goc = $row['status'];
              $sl_conlai = $sl_goc - $value;
              $sql = "update sanpham set status = ".$sl_conlai." where id_sp = '".$key."'";
              $result = mysql_query($sql);
            }
            echo "<script>alert('Giao dịch thành công')</script>";
            unset($_SESSION['giohang']);
            unset($_SESSION['sl']);
          } else {
            echo "<script>alert('Không thành công')</script>";
          }

          require '../../config/closeConnectDb.php';
        }
  ?>
