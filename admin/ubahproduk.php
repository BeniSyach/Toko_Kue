<h2>ubah Produk</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM menu WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


 ?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" value="<?php echo $pecah['nama']; ?>" name="nama">
	</div>
	<div class="form-group">
		<label>Harga(Rp.)</label>
		<input type="number" class="form-control" value="<?php echo $pecah['harga']; ?>" name="harga">
	</div>
	<div class="form-group">
		<img src="../foto/<?php echo $pecah['gambar']; ?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name ="deskripsi" rows="10">
			 <?php echo $pecah['deskripsi']; ?>
		</textarea>
	</div>

	<button class="btn btn-primary" name="ubah">Ubah</button>
	
</form>

<?php 
if (isset($_POST['ubah']))
{
	$menu=$_FILES['foto']['menu'];
	$lokasifoto = $_FILES['foto']['tmp_name'];

	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "../foto/".$namafoto);
		$koneksi->query("UPDATE menu SET nama ='$_POST[nama]',
			harga='$_POST[harga]',foto='$namafoto',deskripsi_produk='$_POST[deskripsi]'
			WHERE id_produk='$_GET[id]'");
		
	}
	else
	{
		$koneksi->query("UPDATE produk SET nama_produk ='$_POST[nama]',
			harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',
			deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
		
	}
	echo "<script>alert('produk telah diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
	
	
}
 ?>