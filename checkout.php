<?php 
session_start(); 
// koneksi ke data base
include 'koneksi.php';
include 'ajax_cek.php ';


if ( !isset($_SESSION['id_pelanggan'] ))
 {
  echo "<script>alert('anda harus login');</script>";
  echo "<script>location='login.php';</script>";
 }
elseif (empty($_SESSION['keranjang'])) {
	echo "<script>alert('keranjang kosong lakukan pembelanjaan');</script>";
  	echo "<script>location='index.php';</script>";
}

 ?>
 <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">

       
        <link rel="stylesheet" href="css/animate.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">

<script language="javascript" src="jquery.js"></script>
<script>
$(document).ready(function() {
	$('#provinsi').change(function() { // Jika Select Box id provinsi dipilih
		var provinsi = $(this).val(); // Ciptakan variabel provinsi
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'kota.php', // File yang akan memproses data
			data: 'nama_prov=' + provinsi, // Data yang akan dikirim ke file pemroses
			success: function(response) { // Jika berhasil
				$('#kota').html(response); // Berikan hasil ke id kota
			}
		});
    });



$(document).ready(function() {
	$('#kota').change(function() { // Jika select box id kota dipilih
		var kota = $(this).val(); // Ciptakan variabel kota
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'kurir.php', // File pemroses data
			data: 'nama_kota=' + kota, // Data yang akan dikirim ke file pemroses
			success: function(response) { // Jika berhasil
				$('#kurir').html(response); // Berikan hasilnya ke id kurir
			}
		});
    });
	
$(document).ready(function() {
	$('#kurir').change(function() { // Jika select box id kurir dipilih
		var kurir = $(this).val(); // Ciptakan variabel kurir
		var kota = $('#kota').val(); // Ciptakan variabel kota
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'tarif.php', // File pemroses data
			data: 'kurir=' + kurir + '&kota=' + kota, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
			success: function(response) { // Jika berhasil
				$('#biaya').val(response); // Berikan hasilnya ke id biaya
			}
		});
    });
	});

});
});
</script>


<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
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

<section class="konten">
	<div class="container">
		<h1 style="font-family: Forte; color:"><strong>Keranjang Belanja</strong></h1>
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
				<?php $sisa_stok =0; ?>
				<?php foreach ($_SESSION ['keranjang'] as $id_produk => $jumlah): ?> 
				<?php 
				$ambil = $koneksi->query("SELECT * FROM menu WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga=$pecah['harga']*$jumlah;
				$sisa_stok=$pecah['stok_barang']-$jumlah;

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
				<input type="text"  name="nama_pembeli" placeholder="Masukan Nama Pembeli" class="form-control">
			</div></div>
				<div class="col-md-4"><div class="form-group">
				<label>No Telphone</label>
				<input type="text"  name="no_telp" placeholder="Masukkan Nomor Telepon Pembeli" class="form-control">
			</div></div>
			<div class="col-md-4"><div class="form-group">
				<label>Alamat Email</label>
				<input type="text"  name="email_pembeli" placeholder="Masukkan Alamat Email" class="form-control">
			</div></div>
			<div class="col-md-4"><div class="form-group">
				<label>Provinsi</label>
				<select name="provinsi" id="provinsi" class="form-control">
        <option selected>- Pilih Provinsi -</option>
        <?php $tampil=$koneksi->query("SELECT * FROM peng_provinsi ORDER BY prov_id ASC");
          while($t=mysqli_fetch_array($tampil)){
             echo "<option value='$t[prov_id]'>$t[prov_nama]</option>";
          }
		?>
      	</select>
			</div></div>
			<div class="col-md-4"><div class="form-group">
				<label>Pilih Kota Tujuan</label>
				<select name="kota" id="kota" class="form-control">
			<option selected>- Pilih Kota -</option>
        </select>	
				</div>
			</div>
				<div class="col-md-4">
					<label>Pilih Jasa Pengiriman</label>
					<select name="kurir" id="kurir" class="form-control">
        	<option value="">- Pilih Jasa Pengiriman -</option>
      	</select>
        </div>
			</div>
			<div class="col-md-15"><div class="form-group">
				<label>Biaya Ongkos kirim (Rp.)</label>
				<input type="text" name="biaya" id="biaya" placeholder="Biaya" class="form-control">
			</div></div>


			<div class="form-group">
				<label>Alamat lengkap pengiriman</label>
				<textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan alamat lengkap pengiriman( termasuk kode pos)"></textarea>
			</div>
		

			<button class="btn btn-primary" name="checkout">Checkout</button>
		</form>
		<?php if (isset($_POST["checkout"])) 
		{
			$id_pelanggan = $_SESSION["id_pelanggan"];
			$nama_pembeli = $_POST["nama_pembeli"];
			$no_telp = $_POST["no_telp"];
			$id_ongkir = $_POST["id_ongkir"];
			$tanggal_pembelian = date("Y-m-d");
			$status =  "Belum Bayar";
			$alamat_pengiriman = $_POST['alamat_pengiriman'];
			$email_pembeli = $_POST["email_pembeli"];
			$tarif=$_POST['biaya'];
			$total_pembelian=$totalbelanja+$tarif;
			$nama_kota=$_POST['kota'];
			


			$koneksi->query("INSERT INTO pembelian(
				id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman,status_pembelian,nama_pembeli,no_telp,email_pembeli)VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman','$status','$nama_pembeli','$no_telp','$email_pembeli')");

			
			$id_pembelian_barusan=$koneksi->insert_id;
			
			foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
			{
				$ambil=$koneksi->query("SELECT * FROM menu WHERE id_produk='$id_produk'");
				$perproduk=$ambil->fetch_assoc();

				$nama=$perproduk['nama'];
				$harga=$perproduk['harga'];
				$subharga=$perproduk['harga']*$jumlah;

				$koneksi->query("UPDATE menu SET stok_barang='$sisa_stok' WHERE id_produk='$id_produk'");


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