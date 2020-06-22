<?php 
session_start();
include 'koneksi.php';
 include 'navbar.php'; 



if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']))
 {
  echo "<script>alert('anda harus memilih produk terlebih dahulu');</script>";
  echo "<script>location='index.php';</script>";
  
 }

 ?>
 <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">

       
        <link rel="stylesheet" href="css/animate.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
 
 <!DOCTYPE html>
<html>
<head>
	<title>keranjang</title>
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
		 <h1 style="font-family: Forte; color:"><strong>Keranjang Belanja</strong></h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th >No</th>
					<th >Produk</th>
					<th >Harga </th>
					<th >Jumlah</th>
					<th >Subharga </th>
					<th >Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION ['keranjang'] as $id_produk => $jumlah): ?> 
				<?php 
				$ambil = $koneksi->query("SELECT * FROM menu WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();

				 ?>	
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama']; ?></td>
					<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($pecah['harga']*$jumlah); ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-x5">Hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
			<?php endforeach ?>
			</tbody>
		</table>
		<a href="index.php" class="btn btn-default">Lanjutkan belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
		

	</div>
</section>
</body>
</html>
