<?php ob_start();
	session_start();

	function deleteUser(){
		if( isset($_POST["id_KH"]) && isset($_POST["Delete"])) {
			require '../../config/connectdb.php';
			$sql = "DELETE FROM khachhang WHERE	id_kh ='".$_POST["id_KH"]."'";
			$result = mysql_query($sql);
			if( $result ){
				header("location:quanlykhachhang.tpl.php");
			} else {
				echo "Có lỗi xảy ra!";
			}
			require '../../config/closeConnectDb.php';
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Quản lý khách hàng: Admin</title>
		<link rel="stylesheet" type="text/css" href="../../style/login_form.css">
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	    <script src="../../bootstrap/js/JQueryLib.js"></script>
	    <script src="../../bootstrap/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="../../style/login.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <style type="text/css">
	    	.custab{
			    border: 1px solid #ccc;
			    padding: 5px;
			    margin: 5% 0;
			    box-shadow: 3px 3px 2px #ccc;
			    transition: 0.5s;
			    }
			.custab:hover{
			    box-shadow: 3px 3px 0px transparent;
			    transition: 0.5s;
			    }
			.hidden{
				display: none;
			}
			.show{
				display: block;
			}
			.form_style{
				width: 60% !important;
				float: right;
			}
			.form_sign_1{
				max-width: 600px !important;
			}
			.panel_style{
				text-align: right;
			}
	    </style>
	    <script type="text/javascript">
	    	var oneRow = new Array();
	    	var rowKH = new Array();
	    	var index = 0;
	    	/* show infomation to form from table */
	    	function showInfo(parameter){
	    		/*update*/
	    		document.formUpdate.id_kh_up.value = rowKH[parameter][0];
	    		document.formUpdate.username_up.value = rowKH[parameter][1];
	    		document.formUpdate.password_up.value = rowKH[parameter][2];
	    		document.formUpdate.hoKH_up.value = rowKH[parameter][3];
	    		document.formUpdate.tenKH_up.value = rowKH[parameter][4];
	    		document.formUpdate.diachi_up.value = rowKH[parameter][5];
	    		document.formUpdate.sdt_up.value = rowKH[parameter][6];
	    		document.formUpdate.email_up.value = rowKH[parameter][7];
	    		document.formUpdate.number_hd_up.value = rowKH[parameter][8];
	    		/*delete*/
	    		document.formDelete.id_KH.value = rowKH[parameter][0];
	    		document.formDelete.ho_KH.value = rowKH[parameter][3];
	    		document.formDelete.ten_KH.value = rowKH[parameter][4];
	    	}
	    </script>
	</head>
	<body>
		<!-- Navigation -->
		<?php if(isset($_SESSION["admin"])) {
			require '../../config/connectdb.php';
			$sql = "SELECT * FROM khachhang";
	        $result = mysql_query($sql);
		?>
	    <nav class="navbar navbar-inverse navbar-fixed-top">
	        <div class="container-fluid">
	            <div class="collapse navbar-collapse js-navbar-collapse">
	                <ul class="nav navbar-nav navbar-left">
	                    <a class="navbar-brand" href="../front/trangchu.tpl.php">
	                        <img height="20" width="20" src="logo.png" class="img-responsive pull-left" alt="Responsive image"> PartTime</a>
	                    <li><a href="quanlysanpham.tpl.php">Quản lý Sản phẩm</a>
                        </li>
                        <li><a href="quanlykhachhang.tpl.php">Quản lý Khách hàng</a>
                        </li>
                        <li><a href="quanlyhoadon.tpl.php">Quản lý Hóa đơn</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../../modules/logout.php">Đăng xuất</a>
                        </li>
	                </ul>
	                <ul class="nav navbar-nav navbar-right">
	                   <li class="dropdown">
	                        <?php if(isset($_SESSION["admin"])) { ?>
	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Quản trị viên<span class="caret"></span></a>
	                            <ul class="dropdown-menu" role="menu">
	                                <li><a href="quanlysanpham.tpl.php">Quản lý Sản phẩm</a>
	                                </li>
	                                <li><a href="quanlykhachhang.tpl.php">Quản lý Khách hàng</a>
	                                </li>
	                                <li><a href="quanlyhoadon.tpl.php">Quản lý Hóa đơn</a>
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
	                                <li><a href="../../modules/logout.php">Đăng xuất</a>
	                                </li>
	                             </ul>
	                            <li><a href="../customer/giohang.tpl.php">Giỏ hàng (0)</a>

	                         <?php } else { ?>
	  
	                            <a href="../modules/login.php" class="dropdown-toggle"> Đăng nhập<span class="caret"></span></a>
	                            <ul class="dropdown-menu">
	                                <li><a href="../../modules/signup.php">Đăng Ký</a>
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
		<div class="container-fluid">
			<?php if(isset($_SESSION["admin"])){ ?>
		    <div class="row col-sm-12 custyle">
		    	<div class="col-lg-12"><br><br><br><br>
	                <!-- Basic charts strats here-->
	                <div class="panel panel-danger">
	                    <div class="panel-heading">
	                        <h3><i class="fa fa-fw fa-file-text-o"></i> Danh sách khách hàng</h3>
	                    </div>
	                    <div class="panel-body table-responsive">
	                        <table class="table table-bordered" id="fitness-table">
	                            <thead>
	                                <tr>
	                                	<th>ID Khách hàng</th>
	                                    <th>Tên đăng nhập</th>
	                                    <th>Mật khẩu</th>
	                                    <th>Họ</th>
	                                    <th>Tên</th>
	                                    <th>Địa chỉ</th>
	                                    <th>Số điên thoại</th>
	                                    <th>Email</th>
	                                    <th>Số hợp đồng</th>
	                                    <th>Thao tác</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            <?php
	                            	$index = 0;                               
	                            	if(mysql_num_rows($result) > 0){
	                            		while( $row = mysql_fetch_assoc($result)){
	                            ?>
	                            <script type="text/javascript">
	                            	oneRow.push("<?php echo $row["id_kh"]; ?>");
	                            	oneRow.push("<?php echo $row["username"]; ?>");
	                            	oneRow.push("<?php echo $row["password"]; ?>");
	                            	oneRow.push("<?php echo $row["hoKH"]; ?>");
	                            	oneRow.push("<?php echo $row["tenKH"]; ?>");
	                            	oneRow.push("<?php echo $row["diachi"]; ?>");
	                            	oneRow.push("<?php echo $row["sdt"]; ?>");
	                            	oneRow.push("<?php echo $row["email"]; ?>");
	                            	oneRow.push("<?php echo $row["number_hd"]; ?>");
	                            	rowKH.push(oneRow);
	                            	oneRow = [];
	                            </script>
                                <tr>
                                    <td><?php echo $row['id_kh']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['hoKH']; ?></td>
                                    <td><?php echo $row['tenKH']; ?></td>
                                    <td><?php echo $row['diachi']; ?></td>
                                    <td><?php echo $row['sdt']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['number_hd']; ?></td>
                                    <td>
                                        <button type="button" name="Edit" id="<?php echo $row['id_kh'];?>" class="edit btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="showInfo(<?php echo $index; ?>);"><i class="fa fa-fw fa-edit"></i> Edit
                                    </td>
                                    <td>
                                        <button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#myModal_1"  onclick="showInfo(<?php echo $index; ?>);"><i class="fa fa-trash-o"></i> Delete
                                    </td>
                                </tr>
                                                                        
	                            <?php  	$index++;
	                            	}}?>
	                            </tbody>
	                        </table>
	                    </div>
	                    <div class="panel-heading panel_style">
		                    <div class="row">
	                        	<h6 class="panel-title col-sm-9"><i class="fa fa-fw fa-file-text-o"></i> Tổng số tài khoản khách hàng: <?php echo $index;?></h6>
	                        	<div class="col-sm-3">
	                        		<a href="../../modules/signup.php" name="addUser" class="btn btn-md btn-success btn-block" data-toggle="modal" data-target="#myModal_2" >Thêm mới một khách hàng</a>
	                   			</div>
	                   		</div>
                   		</div>
	                </div>
	            </div>
		    <?php } else {?>
		    	<p>Bạn không có quyền quản trị viên. Click <a href="../Demo.tpl.php" ?>vào đây</a> để trở lại trang chủ.</p>	
		    <?php } ?>
		    </div>
		</div>
		<?php } else {?>
			<p>Bạn không có quyền quản trị viên. Click <a href="../Demo.tpl.php" ?>vào đây</a> để trở lại trang chủ.</p>
		<?php  } ?>
		<div class="modal fade modal-style" id="myModal" role="dialog">
		    <form class="form_sign_1 form-signin" method="POST" action="../../modules/admin/updateUser.php" name="formUpdate">
				<fieldset>
	            <br>
					<h3 style="color:#F63; font-weight: bold;">Cập nhật thông tin</h3>
					<hr class="colorgraph">
					<div class="form-group">
	                   ID Khách hàng <input type="text" name="id_kh_up" id="id_kh_up" class="form_style form-control input-md" placeholder="ID khách hàng" readonly="readonly">
					</div>
					<div class="form-group">
	                   Tài khoản <input type="text" name="username_up" id="username_up" class="form_style form-control input-md" placeholder="Username" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Mật khẩu <input type="text" name="password_up" id="password_up" class="form_style  form-control input-md" placeholder="Mật khẩu" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Họ <input type="text" name="hoKH_up" id="hoKH_up" class="form_style form-control input-md" placeholder="Firt Name" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Tên <input type="text" name="tenKH_up" id="tenKH_up" class="form_style form-control input-md" placeholder="Last Name" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Địa chỉ <input type="text" name="diachi_up" id="diachi_up" class="form_style form-control input-md" placeholder="Adđress" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Số điện thoại <input type="text" name="sdt_up" id="sdt_up" class="form_style form-control input-md" placeholder="Phone" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Email <input type="text" name="email_up" id="email_up" class="form_style form-control input-md" placeholder="Email">
					</div>
					<div class="form-group">
	                    Số hợp đồng <input type="text" name="number_hd_up" id="number_hd" class="form_style form-control input-md" placeholder="Number Contract" >
					</div>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-sm-6">
	                        <input type="submit" class="btn btn-md btn-success btn-block" value="Cập nhật">
						</div>
					</div>
				</fieldset><br>
			</form>
		</div>
		<div class="modal fade modal-style" id="myModal_1" role="dialog">
		    <form class="form_sign_1 form-signin" method="POST" action="../../modules/admin/deleteUser.php" name="formDelete">
				<fieldset>
	            <br>
					<h3 style="color:#F63; font-weight: bold;">Xóa thông tin khách hàng</h3>
					<hr class="colorgraph">
					<div class="form-group">
	                   ID Khách hàng <input type="text" name="id_KH" id="id_KH" class="form_style form-control input-md" placeholder="ID khách hàng" readonly="readonly">
					</div>
					<div class="form-group">
	                    Họ <input type="text" name="ho_KH" id="hoKH" class="form_style form-control input-md" placeholder="Firt Name" readonly="readonly">
					</div>
					<div class="form-group">
	                    Tên <input type="text" name="ten_KH" id="tenKH" class="form_style form-control input-md" placeholder="Last Name" readonly="readonly">
					</div>
					<br>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-sm-6">
	                        <input type="submit" name="Delete" class="btn btn-md btn-success btn-block" value="Xóa">
						</div>
						<div class="col-xs-6 col-sm-6 col-sm-6">
	                        <input type="submit" name="Cancel" class="btn btn-md btn-success btn-block" value="Hủy">
						</div>
					</div>
				</fieldset><br>
			</form>			
		</div>
		<div class="modal fade modal-style" id="myModal_2" role="dialog">
			<form class="form_sign_1 form-signin" method="POST" action="../../modules/admin/addUser.php" name="formSignup">
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
                    </div>
                </fieldset><br>
            </form>
        </div>
	</body>
</html>
<?php ob_flush(); ?>