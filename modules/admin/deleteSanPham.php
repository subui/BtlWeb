<?php
	require '../../config/connectdb.php';
	if( isset($_POST['loaiSP_del']) && isset($_POST['tenSP_del']) && isset($_POST['id_sp_del']) ){

		$idSP = $_POST['id_sp_del'];
		$loaiSP = $_POST['loaiSP_del'];
		$tenSP = $_POST['tenSP_del'];

		$sql = "DELETE FROM sanpham WHERE id_sp ='".$idSP."'";

		$result = mysql_query($sql);
		if($result){
			echo "Xóa thành công!";
			header("Location:../../views/admin/quanlysanpham.tpl.php");
		} else {
			echo "Thao tác ko thành công!";
			header("Location:../../views/admin/quanlysanpham.tpl.php");
		}
	}
	require '../../config/closeConnectDb.php';
?>