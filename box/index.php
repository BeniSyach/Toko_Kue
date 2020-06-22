<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>ePlusGo.com - Dynamic Select Box Menggunakan jQuery dan Ajax</title>
<meta name="description" content="Tutorial jQuery & Ajax - Dynamic Select Box Menggunakan jQuery dan Ajax" />
<meta name="keywords" content="eplusgo,dynamic,select box,ajax,jquery,php,mysql,biaya pengiriman" />
<style>
#konten {
	width:400px;
	padding: 19px;
	margin: 0 auto;
	background-color: #fff;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	box-shadow: 0 1px 2px rgba(0,0,0,.05);	
}

.normal-select, #biaya {
	background: transparent;
	padding: 5px;
	font-size: 14px;
	line-height: 1;
	border:1px solid #CCC;
	border-radius: 0;
	height: 34px;
	-webkit-appearance: none;
	border-radius:3px;
}

.normal-select {
	width:258px;
}

#biaya {
	width:100px;
}

table td {
	vertical-align:middle;
}
</style>
<script language="javascript" src="jquery.js"></script>
<script>
$(document).ready(function() {
	$('#provinsi').change(function() { // Jika Select Box id provinsi dipilih
		var provinsi = $(this).val(); // Ciptakan variabel provinsi
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'kota.php', // File yang akan memproses data
			data: 'nama_prov=' + provinsi, // Data yang akan dikirim ke file pemroses
			success: function(response) { // Jika berhasil
				$('#kota').html(response); // Berikan hasil ke id kota
			}
		});
    });



$(document).ready(function() {
	$('#kota').change(function() { // Jika select box id kota dipilih
		var kota = $(this).val(); // Ciptakan variabel kota
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'kurir.php', // File pemroses data
			data: 'nama_kota=' + kota, // Data yang akan dikirim ke file pemroses
			success: function(response) { // Jika berhasil
				$('#kurir').html(response); // Berikan hasilnya ke id kurir
			}
		});
    });
	
$(document).ready(function() {
	$('#kurir').change(function() { // Jika select box id kurir dipilih
		var kurir = $(this).val(); // Ciptakan variabel kurir
		var kota = $('#kota').val(); // Ciptakan variabel kota
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'tarif.php', // File pemroses data
			data: 'kurir=' + kurir + '&kota=' + kota, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
			success: function(response) { // Jika berhasil
				$('#biaya').val(response); // Berikan hasilnya ke id biaya
			}
		});
    });
	});

});
});
</script>
</head>
<body>
<div id="konten">
<h1 align="center">Cek Biaya Pengiriman</h1>
<table>
<tr>
	<td valign=top>Provinsi</td><td>  
    	<select name="provinsi" id="provinsi" class="normal-select">
        <option selected>- Pilih Provinsi -</option>
        <?php $tampil=$config->query("SELECT * FROM peng_provinsi ORDER BY prov_id ASC");
          while($t=mysqli_fetch_array($tampil)){
             echo "<option value='$t[prov_id]'>$t[prov_nama]</option>";
          }
		?>
      	</select>
   	</td>
</tr>

<tr>
	<td>Kota Tujuan</td>
    <td><select name="kota" id="kota" class="normal-select">
			<option selected>- Pilih Kota -</option>
        </select>
	</td>
</tr>

<tr>
	<td valign=top>Jasa Pengiriman</td><td>  
    	<select name="kurir" id="kurir" class="normal-select">
        	<option selected>- Pilih Jasa Pengiriman -</option>
      	</select>
   	</td>
</tr>
    
	
<tr>
	<td>Biaya</td>
	<td><input type="text" name="biaya" id="biaya" placeholder="Biaya" /></td>
</tr>
</table>
</div>
</body>
</html>