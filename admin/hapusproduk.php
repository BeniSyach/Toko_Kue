<?php 

$ambil=$koneksi->query("SELECT * FROM menu WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$fotoproduk = $pecah['gambar'];

if (file_exists("../foto/$fotoproduk"))
{
	unlink("../foto/$fotoproduk");

}

$koneksi->query("DELETE FROM menu WHERE id_produk='$_GET[id]'");
echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";

 ?>