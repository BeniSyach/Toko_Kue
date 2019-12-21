<?php include 'koneksi.php';

 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar</title>
	<!-- BOOTSTRAP STYLES-->
     <!-- FONTAWESOME STYLES-->
        <!-- CUSTOM STYLES-->
   <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style-portfolio.css">
        <link rel="stylesheet" href="css/picto-foundry-food.css" />
        <link rel="stylesheet" href="css/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="favicon-1.ico" type="image/x-icon">

</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> BFN BAKERY : Daftar</h2>
               
                <h5>( Pendaftaran akun baru )</h5>
                 <br />
            </div>
        </div>
 <div class="row">
     <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
        <strong>  New User ? Register Yourself </strong>  
         </div>
         <div class="panel-body">
         <form role="form" method="post">
<br/>
         <div class="form-group input-group">
          <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
         <input type="text" class="form-control" name="nama" placeholder="Your Name" required="" />
            </div>
           <div class="form-group input-group">
            <span class="input-group-addon">@</span>
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="" />
            </div>
            <div class="form-group input-group">
           <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
           <input type="password" class="form-control" name="pass" placeholder="Enter Password" required="" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">No.HP</span>
                <input type="text" class="form-control" name="telp" placeholder="No telphone" required="" />
            </div>
              <div class="form-group input-group">
                  <span class="input-group-addon">Alamat</span>
                    <textarea class="form-control" name="alamat" required placeholder="alamat Lengkap">
                   </textarea>
             </div>
                 <div class="form-group input-group">
                   <span class="input-group-addon">Kota</span>
                   <input type="text" class="form-control" name="kota" placeholder="Kota" required="" />
             </div>
                    <div class="input-group-btn" >
                    <button class="btn btn-primary" name="register">Daftar</button>
                </div>
                                 
                                     
                                    <hr />
                                    Already Registered ?  <a href="login.php" >Login here</a>
                                    </form>
                                    <?php 
                                        if (isset($_POST['register']))
                                        {
                                            
                                            $nama=$_POST["nama"];
                                            $password=$_POST["pass"];
                                            $email=$_POST["email"];
                                            $telp=$_POST["telp"];
                                            $alamat=$_POST["alamat"];
                                            $kota=$_POST["kota"];

                                            $ambil=$koneksi->query("SELECT*FROM pelanggan WHERE email_pelanggan ='$email'");
                                            $cocok=$ambil->num_rows;
                                            

                                                if ($cocok==1) 
                                            {
                                                echo "<script>alert('Alamat email sudah terdaftar,gunakan email yang lain');</script>";
                                                echo "<script>location='daftar2.php';</script>";
                                            }
                                            else 
                                            {

                                              $koneksi->query("INSERT INTO pelanggan
                                                    (email_pelanggan,nama_pelanggan,password_pelanggan,telphone_pelanggan,nama_kota,alamat_pelanggan) VALUES ('$email','$nama','$password','$telp','$kota','$alamat')");
                                                
                                                echo "<script>alert('silahkan login');</script>";
                                                echo "<script>location='login.php';</script>";
                                            }
                                      
                                        }
                                        ?>





                            </div>
                           
                        </div>
                    </div>
                

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
