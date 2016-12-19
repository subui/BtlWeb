<?php
    ob_start();
    session_start();

    //function($parameter){

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../login.css">  
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <a class="navbar-brand" href="../../index.php">
                        <img height="20" width="20" src="logo.png" class="img-responsive pull-left" alt="Responsive image">  PartTIME</a>
                    <li>
                        <a href="../category/quanao.tpl.php">Quần áo</a>
                    </li>
                    <li>
                        <a href="../category/giaydep.tpl.php">Giày</a>
                    </li>
                    <li><a href="../category/phukien.tpl.php">Phụ kiện</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <?php if(isset($_SESSION["admin"])) { ?>
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
                        
                        <?php }else if (isset($_SESSION["customer"])) { ?>
                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["customer"]; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="../customer/thongtincanhan.tpl.php">Thông tin cá nhân</a>
                                </li>
                                <li><a href="../customer/donhang.tpl.php">Đơn hàng</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../modules/logout.php">Đăng xuất</a>
                                </li>
                             </ul>
                            <li><a href="../customer/giohang.tpl.php">Giỏ hàng (0)</a>

                         <?php } else { ?>
                            
                            <a href="../../modules/login.php" class="dropdown-toggle"> Đăng nhập</span></a>
                            
                         <?php } ?>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <br>
    <br>
    <br>
    <div class="container-fluid text-left">
        <div class="row content">
            <div class="col-sm-2 sidenav text-left">
                <div class="row">        	
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-10">
                        <div class="btn-group btn-breadcrumb">
                            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
                            <a href="#" class="btn btn-default">Quần áo</a>
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
						
						<img src="ao1.jpg">
						
						
					</div>
					<div class=" col-md-6">
						<h3 class="product-title"><a href="#">Áo Abercrombie & Fitch</a></h3>
						<div>
							<label>Còn hàng</label>
						</div>
                        <div>
							<label>Áo</label>
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
						<h2 class="price"><span>300.000đ</span></h2>
						
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
							<button class="add-to-cart btn btn-sm " type="button">add to cart</button>
							<button class="like btn btn-sm" type="button"><span class="glyphicon glyphicon-heart"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
            
        </div> 
	
        <div class="col-sm-0 sidenav">

        </div>
    </div>
    </div>
    <br>
    <br>
    <br>

    <!----------- Footer ------------>
    <footer class="footer-bs">
        <div class="row">
            <div class="col-md-3 footer-brand animated fadeInLeft">
                <h2><img src="logo.png" width="50" height="50"></h2>
                <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
                <p>© 2014 BS3 UI Kit, All rights reserved</p>
            </div>
            <div class="col-md-4 footer-nav animated fadeInUp">
                <h4>SHOP —</h4>
                <div class="col-md-6">
                    <ul class="pages">
                        <li><a href="#">Trang chủ</a>
                        </li>
                        <li><a href="#">Áo</a>
                        </li>
                        <li><a href="#">Quần</a>
                        </li>
                        <li><a href="#">Giày</a>
                        </li>
                        <li><a href="#">Phụ kiện</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list">
                        <li><a href="#">Giới thiệu</a>
                        </li>
                        <li><a href="#">Liên hệ</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-2 footer-social animated fadeInDown">
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="#">Facebook</a>
                    </li>
                    <li><a href="#">Twitter</a>
                    </li>
                    <li><a href="#">Instagram</a>
                    </li>
                    <li><a href="#">RSS</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 footer-ns animated fadeInRight">
                <h4>Newsletter</h4>
                <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
                <p>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </p>
            </div>
        </div>

    </footer>


    </div>

</body>

</html>
<?php
    ob_flush();
?>