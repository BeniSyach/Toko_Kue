<?php
session_start();
  include 'koneksi.php';

if (!isset($_SESSION["id_pelanggan"]) OR empty($_SESSION["nama_pelanggan"]) ) 
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}



$id_halaman=$_GET['id']; ?>

<!DOCTYPE html>
<html>
<head>
	<title>nota pembelian</title>
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
	<!---- Navbar ---->
<nav class="navbar navbar-default">
	<div class="container">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<?php if (isset($_SESSION['pelanggan'])): ?>
				<li><a href="logout.php">Logout</a></li>
			<?php else: ?>
				<li><a href="login.php">Login</a></li>
			<?php endif ?>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="about.php">About</a></li>
		</ul>
	</div>
</nav>

<section class="konten">
	<div class="container">
		
		<h2>Nota Pembelian</h2>

<?php 
$ambil= $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
	ON pembelian.id_pelanggan = pelanggan.id_pelanggan 
	WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil-> fetch_assoc();
?>


<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
		Tanggal <?php echo $detail['tanggal_pembelian']; ?><br>
		Total pembelian : Rp. <?php echo number_format($detail['total_pembelian']); ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pembeli']; ?></strong><br>
		<p>
			<?php echo $detail['no_telp']; ?><br>
			<?php echo $detail['email_pembeli']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Kota tujuan</h3>
		<strong><?php echo $detail['nama_kota']; ?></strong><br>
		Ongkos kirim : Rp. <?php echo number_format($detail['tarif']); ?><br> 
		Alamat penerima : <?php echo $detail['alamat_pengiriman']; ?><br>
	</div> 
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['harga']; ?></td>
			
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
 <div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan melakukan pembayaran sebesar Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
				<strong>BANK MANDIRI 131-000705-9308 AN. BENI KETAREN</strong>
			</p>
			
		</div>
		<a href="index.php" class="btn btn-primary">kembali</a>
			<a href="print.php?id=<?php echo $id_halaman;?>" class="btn btn-primary">Print</a>
	</div>
</div> 


	</div>
</section>
<script>
	window.print();
</script>

</body>
</html>
