<?php ob_start();
	session_start();

		if( isset($_POST["Delete"])) {
			require '../../config/connectdb.php';
			$sql = "DELETE FROM donhang WHERE	id_kh ='".$_POST["id_dh"]."'";
			$result = mysql_query($sql);
			if( $result ){
				header("location:quanlykhachhang.tpl.php");
			} else {
				echo "Có lỗi xảy ra!";
			}
			require '../../config/closeConnectDb.php';
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
	    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="../../style/login.css">
		<script src="../../bootstrap/js/jquery.min.js"></script>
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
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
	    		/*delete*/
	    		document.formDelete.id_dh.value = rowKH[parameter][0];
	    		document.formDelete.id_kh.value = rowKH[parameter][1];
	    		document.formDelete.id_sp.value = rowKH[parameter][2];
	    	}
	    </script>
	</head>
	<body>
		<!-- Navigation -->
		<?php if(isset($_SESSION["admin"])) {
			require '../../config/connectdb.php';
			$sql = "SELECT * FROM donhang";
	        $result = mysql_query($sql);
		?>
	    <?php include '../category/nav.php' ?>
		<div class="container-fluid">
			<?php if(isset($_SESSION["admin"])){ ?>
		    <div class="row col-sm-12 custyle">
		    	<div class="col-lg-12"><br><br><br><br>
	                <!-- Basic charts strats here-->
	                <div class="panel panel-danger">
	                    <div class="panel-heading">
	                        <h3><i class="fa fa-fw fa-file-text-o"></i> Danh sách Hóa đơn</h3>
	                    </div>
	                    <div class="panel-body table-responsive">
	                        <table class="table table-bordered" id="fitness-table">
	                            <thead>
	                                <tr>
	                                	<th>ID Hóa Đơn</th>
	                                    <th>ID Khách Hàng</th>
	                                    <th>ID sản phẩm</th>
	                                    <th>Số lượng</th>
	                                    <th>Giá</th>
	                                    <th>Thành tiền</th>
	                                    <th>Ngày lập hóa đơn</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            <?php
	                            	$index = 0;
	                            	if(mysql_num_rows($result) > 0){
	                            		while( $row = mysql_fetch_assoc($result)){
	                            ?>
	                            <script type="text/javascript">
	                            	oneRow.push("<?php echo $row["id_dh"]; ?>");
	                            	oneRow.push("<?php echo $row["id_kh"]; ?>");
	                            	oneRow.push("<?php echo $row["id_sp"]; ?>");
	                            	oneRow.push("<?php echo $row["soluong"]; ?>");
	                            	oneRow.push("<?php echo $row["price"]; ?>");
	                            	oneRow.push("<?php echo $row["thanhtien"]; ?>");
	                            	oneRow.push("<?php echo $row["ngaythang"]; ?>");
	                            	rowKH.push(oneRow);
	                            	oneRow = [];
	                            </script>
                                <tr>
                                    <td><?php echo $row['id_dh']; ?></td>
                                    <td><?php echo $row['id_kh']; ?></td>
                                    <td><?php echo $row['id_sp']; ?></td>
                                    <td><?php echo $row['soluong']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['thanhtien']; ?></td>
                                    <td><?php echo $row['ngaythang']; ?></td>
                                    <td>
                                        <button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#myModal_1"  onclick="showInfo(<?php echo $index; ?>);"><i class="fa fa-trash-o"></i> Delete
                                    </td>
                                </tr>

	                            <?php  	$index++;
	                            	}} else {
	                            		echo "lỗi DB";
	                            	}

	                            ?>
	                            </tbody>
	                        </table>
	                    </div>
	                    <div class="panel-heading panel_style">
		                    <div class="row">
	                        	<h6 class="panel-title col-sm-9"><i class="fa fa-fw fa-file-text-o"></i> Tổng số hóa đơn: <?php echo $index;?></h6>
	                   		</div>
                   		</div>
	                </div>
	            </div>
		    <?php } else {?>
		    	<p>Bạn không có quyền quản trị viên. Click <a href="../../index.php" ?>vào đây</a> để trở lại trang chủ.</p>
		    <?php } ?>
		    </div>
		</div>
		<?php } else {?>
			<p>Bạn không có quyền quản trị viên. Click <a href="../Demo.tpl.php" ?>vào đây</a> để trở lại trang chủ.</p>
		<?php  } ?>

		<div class="modal fade modal-style" id="myModal_2" role="dialog">
		    <form class="form_sign_1 form-signin" method="POST" action="../../modules/admin/deleteUser.php" name="formDelete">
				<fieldset>
	            <br>
					<h3 style="color:#F63; font-weight: bold;">Xóa thông tin khách hàng</h3>
					<hr class="colorgraph">
					<div class="form-group">
	                   ID Khách hàng <input type="text" name="id_hd" id="id_hd" class="form_style form-control input-md" placeholder="ID Hóa đơn" readonly="readonly">
					</div>
					<div class="form-group">
	                    Họ <input type="text" name="id_kh" id="id_kh" class="form_style form-control input-md" placeholder="ID khách hàng" readonly="readonly">
					</div>
					<div class="form-group">
	                    Tên <input type="text" name="id_sp" id="id_sp" class="form_style form-control input-md" placeholder="ID Sản phẩm" readonly="readonly">
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

	</body>
</html>
<?php ob_flush(); ?>
