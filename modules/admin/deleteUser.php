<?php
	require '../../config/connectdb.php';
	if( isset($_POST["id_KH"]) && isset($_POST["Delete"])) {
		
		$sql = "DELETE FROM khachhang WHERE	id_kh ='".$_POST["id_KH"]."'";
		$result = mysql_query($sql);
		if( $result ){
			header("location:../../views/admin/quanlykhachhang.tpl.php");
		} else {
			echo "Có lỗi xảy ra!";
		}	
	}
	require '../../config/closeConnectDb.php';
?>