<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bán hàng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/demo.js"></script>
  <link rel="stylesheet" href="style/demo.css" />
  <link rel="stylesheet" href="style/front.css">
  <link rel="stylesheet" type="text/css" href="style/login.css">

  <?php if (!isset($_GET['page'])) { ?>

  <link rel="stylesheet" type="text/css" href="views/front/style_front.css">

  <?php } ?>

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
  .alert {
    margin-bottom: 10px !important;
  }
  .alert-link {
    font-weight: normal !important;
  }
  input[type=number] {
    width: 60px;
  }
  </style>
</head>

<body>

  <!-- Navigation -->
  <?php
  include 'templates/nav.php';
  if (isset($_GET['page'])) {
    ?>

    <img src="heading-products.jpg" width="1360" height="50">
    <div class="container-fluid text-center" style="margin-top: 20px">
      <div class="alert-giohang"></div>
      <div class="row content">

        <?php
        if ($_GET['page'] == 'sp') {
          include 'views/category/danhmuc.php';
          include 'views/category/content.php';
        } elseif ($_GET['page'] == 'giohang') {
          include 'views/customer/giohang.tpl.php';
        }

        ?>

      </div>
    </div>

    <?php
  } else {
    include 'templates/slide.php';
    include 'templates/content.php';
  }
  ?>


  <br>

  <br>
  <br>

  <div class="">
    <section style="height:80px;"></section>

    <?php include 'templates/footer.php'; ?>
    <section style="text-align:center; margin:10px auto;">
      <p>Designed by <a href="#">Hoàng Long</a>
      </p>
    </section>

  </div>

</body>

</html>
<?php
ob_flush();
?>
