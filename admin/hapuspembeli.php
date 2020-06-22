<?php 

$koneksi->query("DELETE FROM pembelian WHERE id_pembelian='$_GET[id]'");
echo "<script>alert('data pembelian terhapus');</script>";
echo "<script>location='index.php?halaman=pembelian';</script>";

 ?>