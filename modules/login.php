<?php
	session_start();
	require '../views/LogIn.tpl.php';

	function login(){
		$result = null;
		if(isset($_POST['username']) && isset($_POST['password'])){
			require '../config/connectdb.php';
			$username = $_POST['username'];
			$_SESSION['username'] = $_POST['username'];
			$password = $_POST['password'];
			$flag = 0;

			$sql = "SELECT * FROM admin";
			$result = mysql_query($sql);
			if( mysql_num_rows($result) > 0){
				while($row = mysql_fetch_assoc($result)){
					if(  (strcmp($username,$row['username'])==0) && (strcmp($password,$row['password'])==0)  ){
						$_SESSION["admin"] = $username;
						$flag = 1;
						break;
					}
				}
			}
			if( $flag == 0){
				$sql = "SELECT * FROM khachhang";
				$result = mysql_query($sql);
				if( mysql_num_rows($result) > 0){
					while($row = mysql_fetch_assoc($result)){
						if( (strcmp($username,$row['username'])==0) && (strcmp($password,$row['password'])==0) ){
							$_SESSION["customer"] = $row['tenKH'];
							$flag = 1;
							break;
						}
					}
				}
			}
			if($flag == 0){
				$result = "Đăng nhập không thành công!";
				session_unset('username');
			} else{
				header("Location:../index.php");
			}
			require '../config/closeConnectDb.php';
		}
		return $result;
	}
?>
