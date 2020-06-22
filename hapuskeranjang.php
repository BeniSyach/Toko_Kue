<?php 
session_start();
if (!isset($_SESSION["id_pelanggan"]) OR empty($_SESSION["nama_pelanggan"]) ) 
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}
else 
{
	$id_produk=$_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('produk telah terhapus');</script>";
echo "<script>location='keranjang.php';</script>";
}


 ?>