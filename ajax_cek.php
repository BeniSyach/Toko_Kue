<script language='javascript'>

function showKab()

{

<?php

include 'koneksi.php';

// membaca semua propinsi

$query = "SELECT * FROM ongkir ORDER BY id_ongkir ASC";

$hasil =mysqli_query($koneksi,$query);

// membuat if untuk masing-masing pilihan propinsi beserta isi option untuk combobox kedua

while ($data = mysqli_fetch_array($hasil))

{

$prov = $data['id_ongkir'];

// membuat IF untuk masing-masing propinsi

echo "if (document.form1.ongkir.value == \"".$id_ongkir."\")";

echo "{";

// membuat option kota untuk masing-masing propinsi

$query2 = "SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir' ORDER BY id_ongkir ASC";

$hasil2 = mysqli_query($koneksi,$query2);

$content = "document.getElementById('kot').innerHTML = \"";

while ($data2 = mysqli_fetch_array($hasil2))

{

$content .= "<option value='".$data2['id_ongkir']."'>".$data2['nama_kota']."</option>";

}

$content .= "\"";

echo $content;

echo "}\n";

}

?>

}

</script>