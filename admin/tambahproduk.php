<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga(Rp.)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Stok Barang</label>
		<input type="text" class="form-control" name="stok_barang">
	</div>
	<div class="form-group">
		<label>kategori</label>
		<input type="text" class="form-control" name="kategori">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name ="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
	
</form>
<?php 
if (isset($_POST['save']))
{
	$nama=$_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto/".$nama);
	$koneksi->query("INSERT INTO menu
		(nama,harga,gambar,deskripsi,id_kategori,stok_barang)
		VALUES ('$_POST[nama]','$_POST[harga]','$nama','$_POST[deskripsi]','$_POST[kategori]','$_POST[stok_barang]')");

	echo "<div class='alert alert-info'>Data tersimpan</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>


 
