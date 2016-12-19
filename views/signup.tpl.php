<?php
	ob_start();
    session_start();
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
    <link rel="stylesheet" href="../style/login.css">
    <style type="text/css">
        .form_style{
            width: 60% !important;
            float: right;
        }
    </style>
    <script type="text/javascript">
		$(document).ready(function(){
		    $(".btn-primary").click(function(){
		    	var pwd = document.form_signup.password.value;
	    		var re_pwd = document.form_signup.re_password.value;
	    		if(pwd===re_pwd){    			
					return true;
	    		}else{
					document.form_signup.re_password.focus();
					$("[data-toggle='popover']").popover('show');
					return false;
				}   
		    });
		});
    </script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <a class="navbar-brand" href="../index.php">
                        <img height="20" width="20" src="logo.png" class="img-responsive pull-left" alt="Responsive image"> PartTime</a>
                    <li>
                        <a href="quanao.tpl.php">Quần áo</a>
                    </li>
                    <li>
                        <a href="giaydep.tpl.php">Giày</a>
                    </li>
                    <li><a href="phukien.tpl.php">Phụ kiện</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                   <li class="dropdown">
                        <?php if(isset($_SESSION["admin"])) { ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Quản trị viên<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="../views/admin/quanlysanpham.tpl.php">Quản lý Sản phẩm</a>
                                </li>
                                <li><a href="../views/admin/quanlykhachhang.tpl.php">Quản lý Khách hàng</a>
                                </li>
                                <li><a href="../views/admin/quanlyhoadon.tpl.php">Quản lý Hóa đơn</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../modules/logout.php">Đăng xuất</a>
                                </li>
                             </ul>
                        
                        <?php }else if (isset($_SESSION["customer"])) { ?>
                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["customer"]; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="customer/thongtincanhan.tpl.php">Thông tin cá nhân</a>
                                </li>
                                <li><a href="customer/donhang.tpl.php">Đơn hàng</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../modules/logout.php">Đăng xuất</a>
                                </li>
                             </ul>
                            <li><a href="customer/giohang.tpl.php">Giỏ hàng (0)</a>

                         <?php } else { ?>
  
                            <a href="../modules/login.php" class="dropdown-toggle"> Đăng nhập<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../modules/signup.php">Đăng Ký</a>
                                </li>
                            </ul>
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
    <br>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-1 sidenav text-left">
            </div>
            <div class="col-sm-2 sidenav text-left">
                <div class="row">
                    <br>
                    <div class="btn-group btn-breadcrumb">
                        <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
                        <a href="#" class="btn btn-default">Đăng ký</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 text-left">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    	<?php if(!isset($_SESSION["admin"]) && !isset($_SESSION["customer"])) {?>
                        <form class="form_sign_1 form-signin" method="POST" action="" name="formUpdate">
                            <fieldset>
                            <br>
                                <h3 style="color:#F63; font-weight: bold;">Đăng ký thông tin</h3>
                                <hr class="colorgraph">
                                <div class="form-group">
                                   ID Khách hàng <input type="text" name="id_kh" id="id_kh" class="form_style form-control input-md" placeholder="ID khách hàng" readonly="readonly">
                                </div>
                                <div class="form-group">
                                   Tài khoản <input type="text" name="username" id="username" class="form_style form-control input-md" placeholder="Username" required="" autofocus="">
                                </div>
                                <div class="form-group">
                                    Mật khẩu <input type="text" name="password" id="password" class="form_style  form-control input-md" placeholder="Mật khẩu" required="" autofocus="">
                                </div>
                                <div class="form-group">
                                    Họ <input type="text" name="hoKH" id="hoKH" class="form_style form-control input-md" placeholder="Firt Name" required="" autofocus="">
                                </div>
                                <div class="form-group">
                                    Tên <input type="text" name="tenKH" id="tenKH" class="form_style form-control input-md" placeholder="Last Name" required="" autofocus="">
                                </div>
                                <div class="form-group">
                                    Địa chỉ <input type="text" name="diachi" id="diachi" class="form_style form-control input-md" placeholder="Adđress" required="" autofocus="">
                                </div>
                                <div class="form-group">
                                    Số điện thoại <input type="text" name="sdt" id="sdt" class="form_style form-control input-md" placeholder="Phone" required="" autofocus="">
                                </div>
                                <div class="form-group">
                                    Email <input type="text" name="email" id="email" class="form_style form-control input-md" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    Số hợp đồng <input type="text" name="number_hd" id="number_hd" class="form_style form-control input-md" placeholder="Number Contract" >
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-sm-6">
                                        <input type="submit" class="btn btn-md btn-success btn-block" value="Đăng ký">
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="../../modules/signup.php" name="addUser" class="btn btn-md btn-primary btn-block" >Đăng nhập</a>
                                    </div>
                                </div>
                            </fieldset><br>
                        </form>
                        <?php } else { ?>
							<h2 class="form-signin-heading">Bạn đã đăng nhập</h2>		   
						<?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1 sidenav">

        </div>
    </div>
    </div>
    <br>
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
<?php ob_flush();?>