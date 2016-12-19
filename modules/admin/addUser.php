<?php
	require '../../config/connectdb.php';
	if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["hoKH"]) && isset($_POST["tenKH"]) && isset($_POST["diachi"]) && isset($_POST["sdt"]) && isset($_POST["email"]))
	{

		$user = $_POST["username"];
		$pwd = $_POST["password"];
		$firstName = $_POST["hoKH"];
		$lastName = $_POST["tenKH"];
		$address = $_POST["diachi"];
		$phone = $_POST["sdt"];
		$mail = $_POST["email"];
		//echo $username ." ".$password." ".$hoKH." ".$tenKH." ".$diaChi." ".$sdt." ".$email;
		//echo $user;
		$sql = "SELECT * FROM khachhang";
		$result = mysql_query($sql);
		$flag = 0;
		//Kiểm tra tài khoản trùng lặp
		if(mysql_num_rows($result) > 0){
			while( $row = mysql_fetch_assoc($result)){
				if( $user===$row['username']){
					echo "Tài khoản đã tồn tại";
					$flag = 1;
					break;
				}
			}
		}
		if($flag == 0){
			$sql = "INSERT INTO khachhang(username,password, hoKH, tenKH, diachi,sdt, email)";
			$sql .= "VALUES ('".$user."','".$pwd."','".$firstName."','".$lastName."','".$address."','".$phone."','".$mail."')";
			$result = mysql_query($sql);
			if ($result){
				header("Location:../../views/admin/quanlykhachhang.tpl.php");
			}
		}
	}
	else {
		echo "Có lỗi xảy ra";
	}
	//header("location:../../views/admin/quanlykhachhang.tpl.php");
	require '../../config/closeConnectDb.php';
?>