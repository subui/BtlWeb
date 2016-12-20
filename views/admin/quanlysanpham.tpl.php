<?php ob_start();
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Quản lý khách hàng: Admin</title>
		<link rel="stylesheet" type="text/css" href="../../style/login_form.css">
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	    <script src="../../bootstrap/js/jquery.min.js"></script>
	    <script src="../../bootstrap/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="../../style/login.css">
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
	    	var rowSP = new Array();
	    	var index = 0;
	    	/* show infomation to form from table */
	    	function showInfo(parameter){
	    		/*update*/
	    		document.formUpdate.id_sp_upd.value = rowSP[parameter][0];
	    		document.formUpdate.tenSP_upd.value = rowSP[parameter][2];
	    		document.formUpdate.thongTin_upd.value = rowSP[parameter][3];
	    		document.formUpdate.gia_upd.value = rowSP[parameter][4];
	    		document.formUpdate.soLuong_upd.value = rowSP[parameter][5];
	    		document.formUpdate.loaiSP_upd.value = rowSP[parameter][7];
	    		/*delete*/
	    		document.formDelete.id_sp_del.value = rowSP[parameter][0];
	    		document.formDelete.loaiSP_del.value = rowSP[parameter][7];
	    		document.formDelete.tenSP_del.value = rowSP[parameter][2];

	    	}
	    </script>
	</head>
	<body>
		<!-- Navigation -->
	    <?php include 'nav.php'; ?>

	    <?php
	    	$index = 0;
	    	$quantity = 0;
			function showProduct($parameter) {
				global $index, $quantity;
				$quantity = 0;
		?>
			<table class="table table-bordered" id="fitness-table">
			    <thead>
					<tr>
						<th>ID Sản Phẩm</th>
			        	<th>Hình ảnh</th>
					    <th>Tên Sản phẩm</th>
			            <th>Thông tin</th>
				        <th>Giá bán</th>
			            <th>Số lượng</th>
			 			<th>Ngày thêm mới</th>
			            <th>Thao tác</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php
			         	require '../../config/connectdb.php';
						$sql = "SELECT * FROM sanpham, loaisanpham WHERE sanpham.group_id=loaisanpham.group_id";
						$result = mysql_query($sql);

			        	if(mysql_num_rows($result) > 0){
			        		while( $row = mysql_fetch_assoc($result)){
			        			if($row["group_id"]===$parameter){
			        ?>
			        <script type="text/javascript">
			        	oneRow.push("<?php echo $row["id_sp"]; ?>");
			        	oneRow.push("<?php echo $row["img1"]; ?>");
			        	oneRow.push("<?php echo $row["name"]; ?>");
			        	oneRow.push("<?php echo $row["info"]; ?>");
			        	oneRow.push("<?php echo $row["price"]; ?>");
			        	oneRow.push("<?php echo $row["status"]; ?>");
			        	oneRow.push("<?php echo $row["dateImport"]; ?>");
			        	oneRow.push("<?php echo $row["group_name"]?>");
			        	rowSP.push(oneRow);
			        	oneRow = [];
			        </script>
			        <tr>
			            <td><?php echo $row['id_sp']; ?></td>
			            <td><img src="../../libraries/img/<?php echo $row['img1']; ?>" style="max-width:80px;max-height:70px;"></td>
			            <td><?php echo $row['name']; ?></td>
			            <td><?php echo $row['info']; ?></td>
			            <td><?php echo $row['price']; ?></td>
			            <td><?php echo $row['status']; ?></td>
			            <td><?php echo $row['dateImport']; ?></td>
			    		<td>
			                <button type="button" name="Edit" id="<?php echo $row['id_sp'];?>" class="edit btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="showInfo(<?php echo $index; ?>);"><i class="fa fa-fw fa-edit"></i> Chỉnh sửa
			            </td>
			            <td>
			                <button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#myModal_1"  onclick="showInfo(<?php echo $index; ?>);"><i class="fa fa-trash-o"></i> Xóa
			 		    </td>
			        </tr>

			        <?php
			        	$index++;
			        	$quantity++;
			         }}} ?>

			    </tbody>
			</table>
			<div class="panel panel-danger">
	            <div class="panel-heading panel_style">
				    <div class="row">
				    	<h6 class="panel-title col-sm-9"><i class="fa fa-fw fa-file-text-o"></i> Tổng số sản phẩm<?= strtolower($row['group_name']) ?>: <?php echo $quantity;?></h6>
				    	<div class="col-sm-3">
			    			<input type="submit" class="btn btn-md btn-success btn-block" data-toggle="modal" data-target="#myModal_2" value="Thêm mới một sản phẩm">
						</div>
					</div>
				</div>
			</div>
		<?php
			}
		?>

		<div class="container-fluid">
			<?php if(isset($_SESSION["admin"])){ ?>
		    <div class="row col-sm-12 custyle">
		    	<div class="col-lg-12"><br><br><br><br>
	                <!-- Basic charts strats here-->
	                <div class="panel panel-danger">
	                    <div class="panel-heading">
	                        <h3><i class="fa fa-fw fa-file-text-o"></i> Danh sách Sản phẩm</h3>
	                    </div>
	                    <div class="panel-body table-responsive">
	                    	<h4><i class="fa fa-fw fa-file-text-o"></i> Quần Áo </h4>
	                    	<?php	showProduct('1');	?>
	                    </div>

	               		<div class="panel-body table-responsive">
	                    	<h4><i class="fa fa-fw fa-file-text-o"></i> Giày dép </h4>
	                        <?php showProduct('2'); ?>
	                    </div>

	               		<div class="panel-body table-responsive">
	                    	<h4><i class="fa fa-fw fa-file-text-o"></i> Phụ kiện </h4>
	                        <?php showProduct('3'); ?>
	                    </div>
	                </div>
	            </div>
		    <?php } else {?>
		    	<p>Bạn không có quyền quản trị viên. Click <a href="../Demo.tpl.php" ?>vào đây</a> để trở lại trang chủ.</p>
		    <?php } ?>
		    </div>
		</div>
		<div class="modal fade modal-style" id="myModal_1" role="dialog">
		     <form class="form_sign_1 form-signin" method="POST" action="../../modules/admin/deleteSanPham.php" name="formDelete" enctype="multipart/form-data">
				<fieldset>
	            <br>
					<h3 style="color:#F63; font-weight: bold;">Xóa sản phẩm</h3>
					<hr class="colorgraph">
					<div class="form-group">
	                   ID Sản phẩm <input type="text" name="id_sp_del" id="id_sp_del" class="form_style form-control input-md" placeholder="ID sản phẩm" readonly="readonly">
					</div>
					<div class="form-group">
	                   Loại Sản phẩm <input type="text" name="loaiSP_del" id="loaiSP_del" class="form_style form-control input-md" placeholder="Loại Sản phẩm" readonly="readonly">
					</div>
					<div class="form-group">
	                    Tên sản phẩm <input type="text" name="tenSP_del" id="tenSP_del" class="form_style  form-control input-md" placeholder="Tên sản phẩm" readonly="readonly">
					</div>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-sm-6">
	                        <input type="submit" class="btn btn-md btn-success btn-block" value="Xóa">
						</div><div class="col-xs-6 col-sm-6 col-sm-6">
	                        <button class="btn btn-md btn-success btn-block" id='huy'>Hủy bỏ</button>
						</div>
					</div>
				</fieldset><br>
			</form>
		</div>
		<div class="modal fade modal-style" id="myModal" role="dialog">
		    <form class="form_sign_1 form-signin" method="POST" action="../../modules/admin/updateSanPham.php" name="formUpdate" enctype="multipart/form-data">
				<fieldset>
	            <br>
					<h3 style="color:#F63; font-weight: bold;">Cập nhật sản phẩm</h3>
					<hr class="colorgraph">
					<div class="form-group">
	                   ID Sản phẩm <input type="text" name="id_sp_upd" id="id_kh" class="form_style form-control input-md" placeholder="ID sản phẩm" readonly="readonly">
					</div>
					<div class="form-group">
	                   Loại Sản phẩm <input type="text" name="loaiSP_upd" id="loaiSP_upd" class="form_style form-control input-md" placeholder="Loại Sản phẩm" readonly="readonly">
					</div>
					<div class="form-group">
	                    Tên sản phẩm <input type="text" name="tenSP_upd" id="tenSP_upd" class="form_style  form-control input-md" placeholder="Tên sản phẩm" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Thông tin <input type="textarea" name="thongTin_upd" id="thongTin_upd" class="form_style form-control" placeholder="Thông tin" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Giá <input type="text" name="gia_upd" id="gia_upd" class="form_style form-control input-md" placeholder="Giá bán" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Số lượng <input type="text" name="soLuong_upd" id="soLuong_upd" class="form_style form-control input-md" placeholder="Số lượng" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Hình ảnh <input type="file" name="hinhAnh_upd" id="hinhAnh_upd" class="form_style form-control input-md" placeholder="Image">
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
		<div class="modal fade modal-style" id="myModal_2" role="dialog">
		    <form class="form_sign_1 form-signin" method="POST" action="../../modules/admin/addSanPham.php" name="formAddNew" enctype="multipart/form-data">
				<fieldset>
	            <br>
					<h3 style="color:#F63; font-weight: bold;">Thêm mới sản phẩm</h3>
					<hr class="colorgraph">
					<div class="form-group">
	                   ID Sản phẩm <input type="text" name="id_kh" id="id_kh" class="form_style form-control input-md" placeholder="ID sản phẩm" readonly="readonly">
					</div>
					<div class="form-group">
	                   Loại sản phẩm
	                   <select name="loaiSP" id="loaiSP" class="form_style form-control">
	                   		<option value="quanAo">Quần Áo</option>
	                   		<option value="giayDep">Giày Dép</option>
	                   		<option value="phuKien">Phụ Kiện</option>
	                   </select>
					</div>
					<div class="form-group">
	                    Tên sản phẩm <input type="text" name="tenSP" id="tenSP" class="form_style  form-control input-md" placeholder="Tên sản phẩm" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Thông tin <input type="textarea" name="thongTin" id="thongTin" class="form_style form-control" placeholder="Thông tin" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Giá <input type="text" name="gia" id="gia" class="form_style form-control input-md" placeholder="Giá bán" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Số lượng <input type="text" name="soLuong" id="soLuong" class="form_style form-control input-md" placeholder="Số lượng" required="" autofocus="">
					</div>
					<div class="form-group">
	                    Hình ảnh <input type="file" name="hinhAnh" id="hinhAnh" class="form_style form-control input-md" placeholder="Image">
					</div>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-sm-6">
	                        <input type="submit" class="btn btn-md btn-success btn-block" value="Thêm mới">
						</div>
					</div>
				</fieldset><br>
			</form>
		</div>
<script>
	$("#huy").on('click', () => $('#myModal_1').remove());
</script>
	</body>
</html>
<?php ob_flush(); ?>
