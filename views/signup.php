<?php
	ob_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Đăng ký</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../style/login_form.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	    <script src="../bootstrap/js/JQueryLib.js"></script>
	    <script src="../bootstrap/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="../style/login.css">
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
	    <style type="text/css">
	    	.error{	color: red;	}
	    </style>
	</head>
	<body>
		<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top nav-fix">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <a class="navbar-brand" href="#">
                        <img height="20" width="20" src="logo.png" class="img-responsive pull-left" alt="Responsive image">  PartTIME</a>
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quần áo</a>
                    </li>
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Giày</a>
                    </li>
                    <li><a href="#">Phụ kiện</a>
                    </li>
                     <li><a href="#">Giới thiệu</a>
                    </li>
                     <li><a href="#">Liên hệ</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <?php if(isset($_SESSION["admin"])) { ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Quản trị viên<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Quản lý Sản phẩm</a>
                                </li>
                                <li><a href="../admin/quanlykhachhang.tpl.php">Quản lý Khách hàng</a>
                                </li>
                                <li><a href="#">Quản lý Hóa đơn</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../../modules/logout.php">Đăng xuất</a>
                                </li>
                             </ul>
                        
                        <?php }else if (isset($_SESSION["customer"])) { ?>
                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["customer"]; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Thông tin cá nhân</a>
                                </li>
                                <li><a href="#">Đơn hàng</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../../modules/logout.php">Đăng xuất</a>
                                </li>
                             </ul>
                            <li><a href="#">Giỏ hàng (0)</a>

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
		<div class="wrapper">
			<?php if(!isset($_SESSION["admin"]) && !isset($_SESSION["customer"])) {?>
			    <form class="form-signup" name="form_signup" method="POST" action="">       
				    <h2 class="form-signin-heading">Đăng ký</h2>
				    <table >
					    <tr>
					    	<td>Tên tài khoản:</td>
					    	<td><input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" /></td>
					    <tr>      
					    <tr>
					    	<td>Mật Khẩu:</td>
					    	<td><input type="password" class="form-control" name="password" placeholder="Password" required="" autofocus="" /></td>
					    <tr>
					    <tr>
					    	<td>Nhập lại Mật Khẩu:</td>
					    	<td><input type="password" class="form-control" name="re_password" placeholder="Password" required="" autofocus="" data-toggle="popover" data-content="Mật khẩu không trùng khớp"/>
					    	</td>
					    <tr>
					    <tr>
					    	<td>Họ:</td>
					    	<td><input type="text" class="form-control" name="hoKH" placeholder="" required="" autofocus="" /></td>
					    <tr>
					    <tr>
					    	<td>Tên:</td>
					    	<td><input type="text" class="form-control" name="tenKH" required="" autofocus="" /></td>
					    <tr>
					    <tr>
					    	<td>Địa Chỉ:</td>
					    	<td><input type="text" class="form-control" name="diaChi" placeholder="" required="" autofocus="" /></td>
					    <tr>
					    <tr>
					    	<td>Số điện thoại:</td>
					    	<td><input type="text" class="form-control" name="sdt" placeholder="" required="" autofocus="" /></td>
					    <tr>
					    <tr>
					    	<td>Email:</td>
					    	<td><input type="text" class="form-control" name="email" placeholder="" required="" autofocus="" /></td>
					    <tr><br>	
				    </table>
				    <input class="btn btn-lg btn-primary btn-block col-sm-3" type="submit" value="Đăng ký"/>
				    <p><?php echo signUp();?></p> 
			    </form>
		    <?php } else {?>
		    	<h2 class="form-signin-heading">Bạn đã đăng nhập</h2>		   
		    <?php }?>
  		</div>
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
	</body>
</html>
<?php ob_flush(); ?>