<h2>ubah ongkos kiriman</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


 ?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>" name="email_pelanggan">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>" name="nama_pelanggan">
	</div>
	<div class="form-group">
		<label>Telephone</label>
		<input type="number" class="form-control" value="<?php echo $pecah['telphone_pelanggan']; ?>" name="telphone_pelanggan">
	</div>
	<div class="form-group">
		<label>Alamat Pelanggan</label>
		<input type="text" class="form-control" value="<?php echo $pecah['alamat_pelanggan']; ?>" name="alamat_pelanggan">
	</div>

	<button class="btn btn-primary" name="ubah">Ubah</button>
	
</form>

<?php 
if (isset($_POST['ubah']))
{

		$koneksi->query("UPDATE pelanggan SET email_pelanggan ='$_POST[email_pelanggan]',
			nama_pelanggan='$_POST[nama_pelanggan]',telphone_pelanggan='$_POST[telphone_pelanggan]',
			alamat_pelanggan='$_POST[alamat_pelanggan]' WHERE id_pelanggan='$_GET[id]'");
		

	echo "<script>alert('ongkir telah diubah');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
	
	
}
 ?>