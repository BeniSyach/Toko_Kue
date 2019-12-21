<?php 
session_start(); 
// koneksi ke data base
include 'koneksi.php';

if ( !isset($_SESSION['pelanggan'] ))
 {
  echo "<script>alert('anda harus login');</script>";
  echo "<script>location='login.php';</script>";
 }
elseif (empty($_SESSION['keranjang'])) {
	echo "<script>alert('keranjang kosong lakukan pembelanjaan');</script>";
  	echo "<script>location='index.php';</script>";
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="konten">
	<div class="container">
		<h1>Keranjang belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga </th>
					<th>Jumlah</th>
					<th>Subharga </th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja =0; ?>
				<?php foreach ($_SESSION ['keranjang'] as $id_produk => $jumlah): ?> 
				<?php 
				$ambil = $koneksi->query("SELECT * FROM menu WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga=$pecah['harga']*$jumlah;

				 ?>	
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama']; ?></td>
					<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
				</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja+=$subharga ?>
			<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja); ?></th>
				</tr>
			</tfoot>
		</table>
		
		<form method="post">
			
			<div class="row">
				<div class="col-md-4"><div class="form-group">
				<label>Nama Pembeli</label>
				<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
			</div></div>
				<div class="col-md-4"><div class="form-group">
				<label>No Telphone</label>
				<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telphone_pelanggan'] ?>" class="form-control">
			</div></div>
				<div class="col-md-4">
					<label>Jasa pengiriman</label>
					<select class="form-control" name="id_ongkir">
						<option value="">Pilih Ongkir</option>
						<?php 
						$ambil=$koneksi->query("SELECT * FROM ongkir"); 
						while ($perongkir=$ambil->fetch_assoc()) {
						?>
						<option value="<?php echo $perongkir['id_ongkir'] ?>">
							<?php echo $perongkir['nama_kota']?> -
							Rp. <?php echo number_format($perongkir['tarif']) ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Alamat lengkap pengiriman</label>
				<textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan alamat lengkap pengiriman( termasuk kode pos)"></textarea>
			</div>


			<button class="btn btn-primary" name="checkout">Checkout</button>
		</form>
		<?php if (isset($_POST["checkout"])) 
		{
			$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
			$id_ongkir = $_POST["id_ongkir"];
			$tanggal_pembelian = date("Y-m-d");
			$alamat_pengiriman = $_POST['alamat_pengiriman'];

			$ambil=$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
			$arrayongkir=$ambil->fetch_assoc();
			$tarif=$arrayongkir['tarif'];
			$nama_kota=$arrayongkir['nama_kota'];
			$total_pembelian=$totalbelanja+$tarif;

			$koneksi->query("INSERT INTO pembelian(
				id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman)VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

			

			$id_pembelian_barusan=$koneksi->insert_id;
			
			foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
			{
				$ambil=$koneksi->query("SELECT * FROM menu WHERE id_produk='$id_produk'");
				$perproduk=$ambil->fetch_assoc();

				$nama=$perproduk['nama'];
				$harga=$perproduk['harga'];
				$subharga=$perproduk['harga']*$jumlah;

				$koneksi->query("INSERT INTO pembelian_produk(id_pembelian,id_produk,nama,harga,jumlah,total_harga)
					VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$jumlah','$total_pembelian')");

			}

			unset($_SESSION["keranjang"]);




				echo "<script>alert('pembelian Berhasil')</script>";
				echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
			
		}

		?>

	</div>
</section>

</body>
</html>