<?php
	session_start();
	if( isset($_SESSION["admin"]) || isset($_SESSION["customer"])){
		session_destroy();
		header("location:../views/front/trangchu.tpl.php");
	} else {
		echo "Bạn đã đăng nhập";
		echo "<br><a href='../views/front/trangchu.tpl.php'>Quay lại trang chủ</a>";
	}
?>