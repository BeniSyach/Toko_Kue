<h2> Data Ongkos Kiriman</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Provinsi</th>
			<th>Kota/Kabupaten</th>
			<th>Jasa Pengirim</th>
			<th>Tarif</th>
			<th>Aksi</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM peng_kota,peng_kurir,peng_provinsi,peng_tarif WHERE peng_kota.prov_id_fk=peng_provinsi.prov_id and peng_kurir.kurir_id=peng_tarif.kurir_id_fk and peng_tarif.kota_id_fk=peng_kota.kota_id "); ?>
		<?php while($pecah =$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['prov_nama']; ?></td>
			<td><?php echo $pecah['kota_nama']; ?></td>
			<td><?php echo $pecah['kurir_nama']; ?></td>
			<td><?php echo $pecah['tarif']; ?></td>
			<td>
				<a href="index.php?halaman=hapusongkir&id=<?php echo $pecah['tarif_id']; ?>" onclick="return confirm('Yakin akan meghapus data ini')"  class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahongkir&id=<?php echo $pecah['tarif_id']; ?>" class="btn-warning btn">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

<a href="index.php?halaman=tambahongkir" class="btn btn-primary">Tambah Data</a>