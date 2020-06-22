<?php include 'koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="admin/assets/img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('admin/assets/img/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-49">
						Login : BFN BAKERY
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "email addres is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Type your email addres">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="lupa.php">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>
					<br>
					</br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="kembali" href="index.php">
								kembali
							</button>
						</div>
					</div>

					

					<div class="flex-col-c p-t-155">
						<!-- <span class="txt1 p-b-17">
							Or Sign Up Using
						</span> -->

						<a href="daftar2.php" class="txt2">
							Tidak Mempunyai akun silahkan Mendaftar Disini !!!
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php 
if (isset($_POST['login']))
{
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$_POST[email]'
    AND password_pelanggan='$_POST[pass]'");
    $yangcocok = $ambil->num_rows;
        if ($yangcocok > 0) 
        {

        	$data = mysqli_fetch_assoc($ambil);

        	if ($data['level']=="admin"){

            $_SESSION['pelanggan']=$data['nama_pelanggan'];
            echo "<div class='alert alert-info'>Login sukses</div>";
 			echo "<meta http-equiv='refresh' content='1;url=admin/index.php'>";
        }
        else if ($data['level']=="costumer"){

           	$_SESSION['nama_pelanggan']=$data['nama_pelanggan'];
           	$_SESSION['id_pelanggan']=$data['id_pelanggan'];
            echo "<div class='alert alert-info'>Login sukses</div>";
 			echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        }
        else
        {
        	echo "<div class='alert alert-danger'>Login Gagal</div>";
        	echo "<meta http-equiv='refresh' content ='1;url=login.php'>";
                                        
        }
    }
}

else if (isset($_POST['kembali']))
{
        	echo "<meta http-equiv='refresh' content ='1;url=index.php'>";

} ?>








	

	<div id="dropDownSelect1"></div>

	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="admin/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="admin/assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="admin/assets/js/custom.js"></script>
	

</body>
</html>