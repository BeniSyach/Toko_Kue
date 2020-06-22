<?php
include('koneksi.php');

$tampil=$koneksi->query("SELECT * FROM peng_kota WHERE prov_id_fk='$_POST[nama_prov]'");
$jml=$tampil->num_rows;
if($jml > 0){
    echo"
     <option selected>- Pilih Kota -</option>";
     while($r=mysqli_fetch_array($tampil)){
         echo "<option value=$r[kota_id]>$r[kota_nama]</option>";
		 //echo $r['ongkir'];
     }
}else{
    echo "
     <option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}
?>