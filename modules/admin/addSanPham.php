<?php
	require '../../config/connectdb.php';
	if(isset($_FILES['hinhAnh']) && isset($_POST['loaiSP']) && isset($_POST['tenSP']) && isset($_POST['thongTin']) && isset($_POST['gia']) && isset($_POST['soLuong'])) {		
		
		/* upload file */
		move_uploaded_file($_FILES['hinhAnh']['tmp_name'], '../../libraries/img/'.$_FILES['hinhAnh']['name']);
		//$tmp_image = $_FILES['hinhAnh']['tmp_name'];

		/*insert content to database */
		$loaiSP = $_POST['loaiSP'];
		$tenSP = $_POST['tenSP'];
		$thongTin = $_POST['thongTin'];
		$gia = $_POST['gia'];
		$soLuong = $_POST['soLuong'];
		$hinhAnh = $_FILES['hinhAnh']['name'];

		if (strcmp($loaiSP,'quanAo')==0){
			$sql = "INSERT INTO sanpham(group_id,name,info,price,status,img1) values (1,'".$tenSP."','".$thongTin."','".$gia."','".$soLuong."','".$hinhAnh."')";
		} else if( strcmp($loaiSP, 'giayDep')==0){
			$sql = "INSERT INTO sanpham(group_id,name,info,price,status,img1) values (2,'".$tenSP."','".$thongTin."','".$gia."','".$soLuong."','".$hinhAnh."')";
		} else {
			$sql = "INSERT INTO sanpham(group_id,name,info,price,status,img1) values (3,'".$tenSP."','".$thongTin."','".$gia."','".$soLuong."','".$hinhAnh."')";
		}
		echo $sql;
		$result = mysql_query($sql);
		if($result){
			echo "Thêm sản phẩm thành công!";
			require '../../config/closeConnectDb.php';
			header("Location:../../views/admin/quanlysanpham.tpl.php");
		} else {
			echo "có lỗi xảy ra!";
			require '../../config/closeConnectDb.php';
		}
	}
	require '../../config/closeConnectDb.php';
?>