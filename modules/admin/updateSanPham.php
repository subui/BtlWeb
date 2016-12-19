<?php
	require '../../config/connectdb.php';
	if( isset($_POST['loaiSP_upd']) && isset($_POST['tenSP_upd']) && isset($_POST['thongTin_upd']) && isset($_POST['gia_upd']) && isset($_POST['soLuong_upd']) && isset($_POST['id_sp_upd']) )
	{	
		$hinhAnh = null;
		/* upload file */
		if(isset($_FILES['hinhAnh_upd'])){
			move_uploaded_file($_FILES['hinhAnh_upd']['tmp_name'], '../../libraries/img/'.$_FILES['hinhAnh_upd']['name']);
			$hinhAnh = $_FILES['hinhAnh_upd']['name'];
		}
		$idSP = $_POST['id_sp_upd'];
		$loaiSP = $_POST['loaiSP_upd'];
		$tenSP = $_POST['tenSP_upd'];
		$thongTin = $_POST['thongTin_upd'];
		$gia = $_POST['gia_upd'];
		$soLuong = $_POST['soLuong_upd'];

		$sql = "UPDATE sanpham SET  name='".$tenSP."', info='".$thongTin."', price='".$gia."', status='".$soLuong."', img1 ='".$hinhAnh."' ";
		$sql .=" WHERE id_sp = '".$idSP."'";
		
		//echo $id ." ".$user . " ". $pwd." ".$firstName." ".$lastName." ".$address." ".$phone." ".$mail." ".$number_contract." ";
		$result = mysql_query($sql);
		if($result){
			echo "Cập nhật thành công";
			header("Location:../../views/admin/quanlysanpham.tpl.php");
		} else {
			echo "Cập nhật bị lỗi";
			header("Location:../../views/admin/quanlysanpham.tpl.php");
		}
		
	} else {
		echo "Đã có lỗi";
	}
	require '../../config/closeConnectDb.php';
?>