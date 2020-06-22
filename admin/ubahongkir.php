<h2>Ubah Ongkos Kiriman</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM peng_kota,peng_kurir,peng_provinsi,peng_tarif WHERE peng_kota.prov_id_fk=peng_provinsi.prov_id and peng_kurir.kurir_id=peng_tarif.kurir_id_fk and peng_tarif.kota_id_fk=peng_kota.kota_id and peng_tarif.tarif_id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


 ?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Jasa Pengirim</label>
		<input type="text" readonly class="form-control" value="<?php echo $pecah['kurir_nama']; ?>" name="nm_pengirim">
	</div>
	<div class="form-group">
		<label>provinsi</label>
		<input type="text" readonly class="form-control" value="<?php echo $pecah['prov_nama']; ?>" name="provinsi">
	</div>
	<div class="form-group">
		<label>Kabupaten/Kota</label>
		<input type="text" readonly class="form-control" value="<?php echo $pecah['kota_nama']; ?>" name="nama_kota">
	</div>
	<div class="form-group">
		<label>Tarif (Rp.)</label>
		<input type="number" class="form-control" value="<?php echo $pecah['tarif']; ?>" name="tarif">		
	</div>

	<button class="btn btn-primary" name="ubah">Ubah</button>
	
</form>

<?php 
if (isset($_POST['ubah']))
{

		$koneksi->query("UPDATE `peng_tarif` SET `tarif` = '$_POST[tarif]' WHERE `peng_tarif`.`tarif_id` ='$_GET[id]'");


	echo "<script>alert('ongkir telah diubah');</script>";
	echo "<script>location='index.php?halaman=ongkir';</script>";
	
	
}
 ?>