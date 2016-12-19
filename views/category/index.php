<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh mục Sản phẩm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <script src="../../bootstrap/js/jquery.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script src="../../js/demo.js"></script>
  <link rel="stylesheet" href="../../style/demo.css" />
  <link rel="stylesheet" href="../../style/front.css">
  <link rel="stylesheet" type="text/css" href="../../style/login.css">
  <style type="text/css">
  .img-size{
    max-width: 400px;
    max-height: 300px;
  }
  body{
    font-size: 14px !important;
  }
  @media (min-width: 768px){
    .lead {
      font-size: 13px;
    }
  }
  .caption .row{
    margin-right: 0px !important;
    margin-left: 0px !important;
  }
  .alert-giohang {
    position: fixed;
    z-index: 9999;
    right: 10px;
    width: 400px;
  }
  </style>
</head>

<body>
  <!-- Navigation -->
  <?php include 'nav.php'; ?>

  <img src="heading-products.jpg" width="1360" height="50">
  <div class="container-fluid text-center" style="margin-top: 20px">
    <div class="alert-giohang"></div>
    <div class="row content">

      <?php
      if (isset($_GET['page'])) {
        if ($_GET['page'] == 'sp') {
          include 'danhmuc.php';
          include 'content.php';
        } elseif ($_GET['page'] == 'giohang') {
          include '../customer/giohang.tpl.php';
        }
      }
      ?>

    </div>
  </div>

  <br><br><br><br>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

</body>

</html>
<?php ob_flush();?>
