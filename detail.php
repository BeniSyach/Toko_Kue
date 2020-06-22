<?php session_start(); ?>


<?php include 'koneksi.php';?>
<?php $id_produk=$_GET['id'];
$ambildata=$koneksi->query("SELECT *FROM menu WHERE id_produk='$id_produk'");
$pecah=$ambildata->fetch_assoc();


 ?>

<?php include 'navbar.php'; ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>detail produk</title>
 	<style>
        body{
            background-image: url('admin/assets/img/bg-01.jpg');
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>

 <section class="konten">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-6">
 				<img src="foto/<?php echo $pecah["gambar"]; ?>" alt="" class="img-responsive">
 			</div>
 			<div class="col-md-6">
 				<h2><?php echo $pecah['nama']; ?></h2>
 				<h4>Rp. <?php echo number_format($pecah['harga']); ?></h4>

 				<form method="post">
 					<div class="form-group">
 						<div class="input-group">
 							<input type="number" name="jumlah" ,min="1" class="form-control">
 							<div class="input-group-btn" >
 								<button class="btn btn-primary" name="beli">Beli</button>
 							</div>
 						</div>
 					</div>
 				</form>

 				<?php
 				if (isset($_POST["beli"])) 
 				{

 					$jumlah=$_POST["jumlah"];
 					$_SESSION["keranjang"][$id_produk]=$jumlah;

 					echo "<script>alert('produk telah masuk ke keranjang');</script>";
					echo "<script>location='keranjang.php';</script>";
 				}
 				 ?>

 				<h2> </h2>
 				<h5>Deskripsi :</h5>
 				<p><?php echo $pecah['deskripsi']; ?></p>
 			</div>
 		</div>
 		
 		
 	</div>
 </section>
 </body>
 </html>

