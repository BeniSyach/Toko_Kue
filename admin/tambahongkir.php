<h2>Tambah Data Pengiriman</h2>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
		<label>Tambah Provinsi</label>
		<input type="text" class="form-control"  name="provinsi">
	</div>
	<div class="form-group">
		<label>Tambah Jasa Pengiriman</label>
		<input type="text" class="form-control"  name="Jasa">
	</div>
	<button class="btn btn-primary" name="tambah_prov">Tambah</button>
</form>

<?php
if (isset($_POST['tambah_prov']))
{
	$koneksi->query("INSERT INTO peng_provinsi (prov_nama) VALUES ('$_POST[provinsi]')");
	$koneksi->query("INSERT INTO peng_kurir (kurir_nama) VALUES ('$_POST[Jasa]')");

	echo "<div class='alert alert-info'>Data tersimpan</div>";
	 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=tambahongkir'>";
}
?>
	<br></br>
<h2>Tambah Kabupaten/Kota Pengiriman</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
				<label>Provinsi</label>
				<select name="provinsi" class="form-control">
        <option selected>- Pilih Provinsi -</option>
        <?php $tampil=$koneksi->query("SELECT * FROM peng_provinsi ORDER BY prov_id ASC");
          while($t=mysqli_fetch_array($tampil)){
             echo "<option value='$t[prov_id]'>$t[prov_nama]</option>";
          }
		?>
      	</select>
			</div>
	<div class="form-group">
		<label>Kabupaten/Kota</label>
		<input type="text" class="form-control"  name="nama_kota">
	</div>

	<button class="btn btn-primary" name="tambah_kota">Tambah</button>
</form>
<?php
if (isset($_POST['tambah_kota']))
{

	$koneksi->query("INSERT INTO peng_kota (kota_nama,prov_id_fk) VALUES ('$_POST[nama_kota]','$_POST[provinsi]')");

	echo "<div class='alert alert-info'>Data tersimpan</div>";
}
?>

	<br></br>
	<br></br>

	<h2>Tambah tarif Pengiriman</h2>
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
				<label>Provinsi</label>
				<select name="pilih_provinsi" class="form-control">
        <option selected>- Pilih Provinsi -</option>
        <?php $tampil=$koneksi->query("SELECT * FROM peng_provinsi ORDER BY prov_id ASC");
          while($t=mysqli_fetch_array($tampil)){
             echo "<option value='$t[prov_id]'>$t[prov_nama]</option>";
          }
		?>
      	</select>
			</div>
	<div class="form-group">
				<label>Jasa Pengirim</label>
				<select name="pilih_kurir" class="form-control">
        <option selected>- Pilih Jasa Pengirim -</option>
        <?php $tampil=$koneksi->query("SELECT * FROM peng_kurir ORDER BY kurir_id ASC");
          while($t=mysqli_fetch_array($tampil)){
             echo "<option value='$t[kurir_id]'>$t[kurir_nama]</option>";
          }
		?>
      	</select>
			</div>
	<div class="form-group">
		<label>Kabupaten/Kota</label>
		<select name="pilih_kota" class="form-control">
        <option selected>- Pilih Kabupaten -</option>
        <?php $tampil=$koneksi->query("SELECT * FROM peng_kota ORDER BY kota_id ASC");
          while($t=mysqli_fetch_array($tampil)){
             echo "<option value='$t[kota_id]'>$t[kota_nama]</option>";
          }
		?>
      	</select>
			</div>
	<div class="form-group">
		<label>Tarif (Rp.)</label>
		<input type="number" class="form-control"  name="tarif">		
	</div>


<button class="btn btn-primary" name="save">Simpan</button>
	
	
</form>
<?php 
if (isset($_POST['save']))
{
	$koneksi->query("INSERT INTO peng_tarif (tarif,kurir_id_fk,kota_id_fk) VALUES ('$_POST[tarif]','$_POST[pilih_kurir]','$_POST[pilih_kota]')");

	echo "<div class='alert alert-info'>Data tersimpan</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=ongkir'>";
}
?>