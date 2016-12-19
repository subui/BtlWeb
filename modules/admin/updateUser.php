<?php
	require '../../config/connectdb.php';
	if(isset($_POST["username_up"]) && isset($_POST["password_up"]) && isset($_POST["hoKH_up"]) && isset($_POST["tenKH_up"]) && isset($_POST["diachi_up"]) && isset($_POST["sdt_up"]))
	{	
		
		$id = $_POST["id_kh_up"];
		$user = $_POST["username_up"];
		$pwd = $_POST["password_up"];
		$firstName = $_POST["hoKH_up"];
		$lastName = $_POST["tenKH_up"];
		$address = $_POST["diachi_up"];
		$phone = $_POST["sdt_up"];
		$mail = $_POST["email_up"];
		$number_contract = $_POST["number_hd_up"];
		$sql = "UPDATE khachhang SET username='".$user."', password='".$pwd."', hoKH='".$firstName."', tenKH='".$lastName."', diachi ='".$address."', sdt='".$phone."', email='".$mail."', number_hd='".$number_contract."' ";
		$sql .=" WHERE id_kh = '".$id."'";
		echo $id ." ".$user . " ". $pwd." ".$firstName." ".$lastName." ".$address." ".$phone." ".$mail." ".$number_contract." ";
		$result = mysql_query($sql, $_connection);
		if($result){
			echo "Cập nhật thành công";
			header("location: ../../views/admin/quanlykhachhang.tpl.php");
		} else {
			echo "Cập nhật bị lỗi";
		}
	} else{
		echo "Không đủ dữ liệu";
	}
	require '../../config/closeConnectDb.php';
?>