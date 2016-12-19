<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="collapse navbar-collapse js-navbar-collapse">
      <ul class="nav navbar-nav navbar-left">
        <a class="navbar-brand" href="index.php">
          <img height="20" width="20" src="logo.png" class="img-responsive pull-left" alt="Responsive image">  PartTIME
        </a>
        <?php
        require 'config/connectdb.php';
        $sql = "Select * from loaisanpham";
        $result = mysql_query($sql);
        if ($result) {
          while($row = mysql_fetch_assoc($result)) {
            ?>
            <li><a href="index.php?page=sp&category=<?= $row['group_id'] ?>"><?= $row['group_name'] ?></a></li>
            <?php
          }
        }
        require 'config/closeConnectDb.php';
        ?>
      </ul>
      <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Tìm Kiếm" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
          </div>
        </form>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">

          <?php if (isset($_SESSION["admin"])) { ?>

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Quản trị viên<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="../admin/quanlysanpham.tpl.php">Quản lý Sản phẩm</a>
              </li>
              <li><a href="../admin/quanlykhachhang.tpl.php">Quản lý Khách hàng</a>
              </li>
              <li><a href="../admin/quanlyhoadon.tpl.php">Quản lý Hóa đơn</a>
              </li>
              <li class="divider"></li>
              <li><a href="../../modules/logout.php">Đăng xuất</a>
              </li>
            </ul>

            <?php } else if (isset($_SESSION["customer"])) { ?>

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["customer"]; ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../customer/thongtincanhan.tpl.php">Thông tin cá nhân</a>
                </li>
                <li><a href="../customer/donhang.tpl.php">Đơn hàng</a>
                </li>
                <li class="divider"></li>
                <li><a href="../../modules/logout.php">Đăng xuất</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="index.php?page=giohang">Giỏ hàng (<?= isset($_SESSION['sl']) ? $_SESSION['sl'] : 0 ?>)</a>

              <?php } else { ?>

                <a href="../../modules/login.php" class="dropdown-toggle"> Đăng nhập</a>

                <?php } ?>
              </li>
            </ul>
          </div>
          <!-- /.nav-collapse -->
        </div>
        <!-- /.container-fluid -->
      </nav>
