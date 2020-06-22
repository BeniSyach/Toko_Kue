<?php 

$koneksi->query("DELETE FROM `peng_tarif` WHERE `peng_tarif`.`tarif_id` = '$_GET[id]' ");
echo "<script>alert('ongkos kiriman sudah terhapus');</script>";
echo "<script>location='index.php?halaman=ongkir';</script>";

 ?>