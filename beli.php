<?php 
session_start();
$id_produk=$_GET['id'];
include 'koneksi.php';
$ambil = $koneksi->query("SELECT * FROM menu WHERE id_produk='$_GET[id]'");
				$pecah = $ambil->fetch_assoc();

if($pecah['stok_barang']==0)
{
   echo "<script>alert('produk telah Habis');</script>";
   echo "<script>location='index.php';</script>";
}
if(isset($_SESSION['keranjang'][$id_produk])) 
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
else
{
	$_SESSION['keranjang'][$id_produk]=1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
echo "<script>alert('produk telah masuk ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
 ?>