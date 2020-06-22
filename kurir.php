<?php
include('koneksi.php');

$tampil=$koneksi->query("SELECT peng_kurir.kurir_nama,peng_kurir.kurir_id FROM peng_tarif,peng_kurir,peng_kota WHERE peng_tarif.kota_id_fk='$_POST[nama_kota]' AND peng_tarif.kurir_id_fk=peng_kurir.kurir_id AND peng_tarif.kota_id_fk=peng_kota.kota_id");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
    echo"
     <option selected>- Pilih Jasa Pengiriman -</option>";
     while($r=mysqli_fetch_array($tampil)){
         echo "<option value=$r[kurir_id]>$r[kurir_nama]</option>";
     }
}else{
    echo "
     <option selected>- Jasa Pengiriman Belum Tersedia -</option>";
}
?>