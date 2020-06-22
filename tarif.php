<?php
include('koneksi.php');

$kurir = $_POST["kurir"];
$kota = $_POST["kota"];
$biaya = $koneksi->query("SELECT * FROM peng_tarif WHERE kurir_id_fk='$kurir' and kota_id_fk='$kota'");
while($data=mysqli_fetch_array($biaya)){
	echo "$data[tarif]";
}
?>
