 <?php 
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if(isset($_POST["kirim"]))
{
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	$ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pembelian_produk ON pembelian.id_pembelian=pembelian_produk.id_pembelian WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
	while ($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}

/*echo "<prev>";
print_r($semuadata);
echo "</pre>";*/
}
?>

<h2 class="text-center">Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h2>
<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
			<label>Tanggal Mulai</label>
			<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
			<label>Tanggal Selesai</label>
			<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim">Lihat</button>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0;?>
		<?php foreach ($semuadata as $key => $value) : ?>
		<?php $total+=$value['total_pembelian'] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_pembeli"] ?></td>
			<td><?php echo $value["tanggal_pembelian"] ?></td>
			<td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total) ?></th>
			<th></th>	
		</tr>
		<a href="print1.php" class="btn-warning btn">Cetak Laporan</a>
		<br></br>
	</tfoot>
</table>
