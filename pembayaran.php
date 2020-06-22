<?php 
session_start(); 
// koneksi ke data base
 include 'koneksi.php';

if (!isset($_SESSION["id_pelanggan"]) OR empty($_SESSION["nama_pelanggan"]) ) 
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

$idpem=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem=$ambil->fetch_assoc();

$idpelangganyangbeli=$detpem["id_pelanggan"];
$idplangganyanglogin=$_SESSION["id_pelanggan"];


if ($idpelangganyangbeli!==$idplangganyanglogin) {
	echo "<script>alert('Data terproteksi');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

 ?>

 <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">

<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
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
	<?php include 'navbar.php'; ?>

	<div class="container">
		<h2>Konfirmasi pembayaran</h2>
		<p>kirim bukti pembayaran anda disini !</p>
		<div class="alert alert-info">Total tagihan anda adalah Rp. <?php echo number_format($detpem["total_pembelian"]); ?></div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Penyetor">
			</div>
			<div class="form-group">
				<label>Bank</label>
				<input type="text" name="bank" class="form-control" placeholder="Bank yang digunakan">
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="number" name="jumlah" class="form-control" min="1" placeholder="jumlah barang">
			</div>
			<div class="form-group">
				<label>Foto bukti</label>
				<input type="file" name="bukti" class="form-control">
				<p class="text-danger">foto bukti harus JPG maksimum 2MB</p>
			</div>
			<button class="btn btn-primary " name="kirim">Kirim</button>

		</form>
	</div>

<?php 
if (isset($_POST['kirim']))
{
	$namabukti=$_FILES['bukti']['name'];
	$lokasibukti = $_FILES['bukti']['tmp_name'];
	$namafix=date(YmdHis).$namabukti;
	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafix");

	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah = $_POST["jumlah"];
	$tanggal = date("Y-m-d");

	$koneksi->query("INSERT INTO pembayaran
		(id_pembelian,nama,bank,jumlah,tanggal,bukti)
		VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafix')");

	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

	echo "<script>alert('Data tersimpan');</script>";
	echo "<script>location='riwayat.php';</script>";
}
 ?>




</body>
</html>