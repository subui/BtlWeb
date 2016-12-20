<?php
	ob_start();
    session_start();

    if (isset($_POST['update'])){
        $user = $_POST["username"];
        $pwd = $_POST["password"];
        $firstName = $_POST["hoKH"];
        $lastName = $_POST["tenKH"];
        $address = $_POST["diachi"];
        $phone = $_POST["sdt"];
        $mail = $_POST["email"];
        $sql = "UPDATE khachhang SET username='".$user."', password='".$pwd."', hoKH='".$firstName."', tenKH='".$lastName."', diachi ='".$address."', sdt='".$phone."', email='".$mail."'";
        $sql .=" WHERE id_kh = '".$_SESSION['id_kh']."'";
        // echo $id ." ".$user . " ". $pwd." ".$firstName." ".$lastName." ".$address." ".$phone." ".$mail." ".$number_contract." ";
				include '../../config/connectdb.php';
        $result = mysql_query($sql);
        if($result){
            echo "<script>alert('Cập nhật thành công')</script>";
        } else {
            echo "<script>alert('Cập nhật bị lỗi')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thông tin cá nhân</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../bootstrap/js/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../style/login.css">
    <style type="text/css">
        .form_style{
            width: 60% !important;
            float: right;
        }
    </style>
    <script type="text/javascript">
		$(document).ready(function(){
		    $(".btn-primary").click(function(){
		    	var pwd = document.form_signup.password.value;
	    		var re_pwd = document.form_signup.re_password.value;
	    		if(pwd===re_pwd){
					return true;
	    		}else{
					document.form_signup.re_password.focus();
					$("[data-toggle='popover']").popover('show');
					return false;
				}
		    });
		});
    </script>
</head>

<body>

    <!-- Navigation -->
    <?php include '../admin/nav.php'; ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-1 sidenav text-left">
            </div>
            <div class="col-sm-2 sidenav text-left">
                <div class="row">
                    <br>
                    <div class="btn-group btn-breadcrumb">
                        <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
                        <a href="#" class="btn btn-default">Thông tin cá nhân</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 text-left">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    	<?php
											    require '../../config/connectdb.php'; if(isset($_SESSION["id_kh"])) {
                                $sql = "select * from khachhang where id_kh = '".$_SESSION["id_kh"]."'";
                                $result = mysql_query($sql);
                                if($result){
                                    $row = mysql_fetch_assoc($result);
                        ?>
                        <form class="form_sign_1 form-signin" method="POST" action="thongtincanhan.tpl.php" name="formUpdate">
                            <fieldset>
                            <br>
                                <h3 style="color:#F63; font-weight: bold;">Chỉnh sửa thông tin</h3>
                                <hr class="colorgraph">
                                <div class="form-group">
                                   ID Khách hàng <input type="text" name="id_kh" id="id_kh" class="form_style form-control input-md" placeholder="ID khách hàng" readonly="readonly" value="<?php echo $row['id_kh']?>">
                                </div>
                                <div class="form-group">
                                   Tài khoản <input type="text" name="username" id="username" class="form_style form-control input-md" placeholder="Username" required="" autofocus="" value="<?php echo $row['username']?>">
                                </div>
                                <div class="form-group">
                                    Mật khẩu <input type="text" name="password" id="password" class="form_style  form-control input-md" placeholder="Mật khẩu" required="" autofocus="" value="<?php echo $row['password']?>">
                                </div>
                                <div class="form-group">
                                    Họ <input type="text" name="hoKH" id="hoKH" class="form_style form-control input-md" placeholder="Firt Name" required="" autofocus="" value="<?php echo $row['hoKH']?>">
                                </div>
                                <div class="form-group">
                                    Tên <input type="text" name="tenKH" id="tenKH" class="form_style form-control input-md" placeholder="Last Name" required="" autofocus="" value="<?php echo $row['tenKH']?>">
                                </div>
                                <div class="form-group">
                                    Địa chỉ <input type="text" name="diachi" id="diachi" class="form_style form-control input-md" placeholder="Adđress" required="" autofocus="" value="<?php echo $row['diachi']?>" >
                                </div>
                                <div class="form-group">
                                    Số điện thoại <input type="text" name="sdt" id="sdt" class="form_style form-control input-md" placeholder="Phone" required="" autofocus="" value="<?php echo $row['sdt']?>">
                                </div>
                                <div class="form-group">
                                    Email <input type="text" name="email" id="email" class="form_style form-control input-md" placeholder="Email" value="<?php echo $row['email']?>">
                                </div>
                                <div class="form-group">
                                    Số đơn hàng <input type="text" readonly="readonly" name="number_hd" id="number_hd" class="form_style form-control input-md" placeholder="Number Contract" value="<?php echo $row['number_hd']?>">
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-sm-6">
                                        <input type="submit" class="btn btn-md btn-success btn-block" value="Cập nhật" name='update'>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-sm-6">
                                        <a href="../../index.php" name="addUser" class="btn btn-md btn-danger btn-block" >Hủy bỏ</a>
                                    </div>
                                </div>
                            </fieldset><br>
                        </form>
                        <?php }} else { ?>
							<h2 class="form-signin-heading">Bạn đã đăng nhập</h2>
						<?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1 sidenav">

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

    <!----------- Footer ------------>
    <?php include '../../templates/footer.php'; ?>
</body>

</html>
