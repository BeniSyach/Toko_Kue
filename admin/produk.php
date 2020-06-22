<h2> Data poduk</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>nama</th>
			<th>harga</th>
			<th>Stok Barang</th>
			<th>deskrpsi</th>
			<th>foto</th>
			<th>Aksi</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM menu"); ?>
		<?php while($pecah =$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['harga']; ?></td>
			<td><?php echo $pecah['stok_barang']; ?></td>
			<td><?php echo $pecah['deskripsi']; ?></td>
			<td>
				<img src="../foto/<?php echo $pecah['gambar']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-warning btn">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>