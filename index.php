<?php 
session_start(); 
// koneksi ke data base
 include 'koneksi.php';
  include 'navbar.php'; 
 ?>


 
        <?php
$per_hal = 20;
$jumlah_record = mysqli_query($koneksi, "SELECT * from menu");
$jum = mysqli_num_rows($jumlah_record);
$halaman = ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style-portfolio.css">
        <link rel="stylesheet" href="css/picto-foundry-food.css" >
        <link rel="stylesheet" href="css/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="favicon-1.ico" type="image/x-icon">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>


<!DOCTYPE html>
<html>
<head>
					
	<title>BFN BAKERY</title>
    <style>
        body{
            background-image: url('admin/assets/img/bg-01.jpg');
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>

<div class="row" id="cpy">
      <div class="col-xs-12">
        <p style="color : black; text-align: center;font-size: 50px;font-family: Cooper Std Black">KATALOG PRODUK</p>
      </div>




<!---- konten ---->
 <div class="container">
   <div class="row text-center  ">
<div class="row">
			<div class="top-brands">
    <div class="container">
        <div class="grid_5 grid_7">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                       
                <ul id="myTab" class="nav nav-pills nav-justified" role="tablist">
                        
                    <li role="presentation" class="active"><a style="color: black;" href="#kuetar" id="kuetar-tab" role="tab" data-toggle="tab" aria-controls="kuetar" aria-expanded="true">Cake Ultah</a></li>
                    <li role="presentation"><a style="color: black;" href="#kuekering" role="tab" id="kuekering-tab" data-toggle="tab" aria-controls="kuekering" s>Kue Kering</a></li>
                    <li role="presentation"><a style="color: black;" href="#kuebasah" role="tab" id="kuebasah-tab" data-toggle="tab" aria-controls="kuebasah">Kue Basah</a></li>
                </ul>
                       
<div id="myTabContent" class="tab-content">
     <div role="tabpanel" class="tab-pane fade in active" id="kuetar" aria-labelledby="kuetar-tab">
        <div class="agile-tp">
            <h2>Cake Ultah</h2>
             <br>
                                </div>
                                <div class="agile_top_brands_grids">
                                    <?php
                                        $query = "SELECT * FROM menu WHERE id_kategori=1 limit $start, $per_hal";
                                        $result_set = $koneksi->query($query);
                                        while ($row = $result_set->fetch_assoc()) {
                                    ?>
            <div class="col-md-3" >
                <div class="thumbnail" alt="">
                    <img src="foto/<?php echo $row['gambar'] ?>" class="img-rounded" height="250" width="220" class="col-md-12 img-responsive">
                    <div class="caption">
                        <h3><?php echo $row['nama']; ?></h3>
                        <h4>Stok Barang : <?php echo $row['stok_barang']; ?></h4>
                        <h4>Rp. <?php echo number_format($row['harga'] );?></h4>

                        <a href="beli.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-danger">Beli</a>
                        <a href="detail.php?id=<?php echo $row['id_produk'];?>"class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
                    <?php } ?>        
                    <div class="clearfix"> </div>   
                                </div>
                            </div>        
                           
                           <div role="tabpanel" class="tab-pane fade in active" id="kuekering" aria-labelledby="kuekering-tab">
                                <div class="agile-tp">

                                    <h2>Kue Kering</h2>
                                    <br>
                                </div>
                                <div class="agile_top_brands_grids">
                                    <?php
                                        $query = "SELECT * FROM menu WHERE id_kategori=2 limit $start, $per_hal";
                                        $result_set = $koneksi->query($query);
                                        while ($row = $result_set->fetch_assoc()) {
                                    ?>
                                   <div class="col-md-3" >
                <div class="thumbnail" alt="">
                    <img src="foto/<?php echo $row['gambar'] ?>" class="img-rounded" height="250" width="220" class="col-md-12 img-responsive">
                    <div class="caption">
                        <h3><?php echo $row['nama']; ?></h3>
                        <h4>Stok Barang : <?php echo $row['stok_barang']; ?></h4>
                        <h4>Rp. <?php echo number_format($row['harga'] );?></h4>
                        <a href="beli.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-danger">Beli</a>
                        <a href="detail.php?id=<?php echo $row['id_produk'];?>"class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
                    <?php } ?>        
                    <div class="clearfix"> </div>   
                                </div>
                            </div>  

<div role="tabpanel" class="tab-pane fade in active" id="kuebasah" aria-labelledby="kuebasah-tab">
                                <div class="agile-tp">

                                    <h2>Kue Basah</h2>
                                    <br>
                                </div>
                                <div class="agile_top_brands_grids">
                                    <?php
                                        $query = "SELECT * FROM menu WHERE id_kategori=3 limit $start, $per_hal";
                                        $result_set = $koneksi ->query($query);
                                        while ($row = $result_set->fetch_assoc()) {
                                    ?>
                                    <div class="col-md-3" >
                <div class="thumbnail" alt="">
                    <img src="foto/<?php echo $row['gambar'] ?>" class="img-rounded" height="250" width="220" class="col-md-12 img-responsive">
                    <div class="caption">
                        <h3><?php echo $row['nama']; ?></h3>
                        <h4>Stok Barang : <?php echo $row['stok_barang']; ?></h4>
                        <h4>Rp. <?php echo number_format($row['harga'] );?></h4>
                        <a href="beli.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-danger">Beli</a>
                        <a href="detail.php?id=<?php echo $row['id_produk'];?>"class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
                    <?php } ?>        
                    <div class="clearfix"> </div>   
                                </div>
                            </div>  
                            <div role="tabpanel" class="tab-pane fade in active" id="object" aria-labelledby="object-tab">
                                <div class="agile-tp">

                                    <h2></h2>
                                    <br>
                                </div>
                                <div class="agile_top_brands_grids">
                                    <?php
                                        $query = "SELECT * FROM menu WHERE id_kategori=4 limit $start, $per_hal";
                                        $result_set = $koneksi->query($query);
                                        while ($row = $result_set->fetch_assoc()) {
                                    ?>
                                    <div class="col-md-3" >
                <div class="thumbnail" alt="">
                    <img src="foto/<?php echo $row['gambar'] ?>" class="img-rounded" height="250" width="220" class="col-md-12 img-responsive">
                    <div class="caption">
                        <h3><?php echo $row['nama']; ?></h3>
                        <h5>Stok Barang : <?php echo $row['stok_barang']; ?></h5>
                        <h5>Rp. <?php echo number_format($row['harga'] );?></h5>
                        <a href="beli.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-danger">Beli</a>
                        <a href="detail.php?id=<?php echo $row['id_produk'];?>"class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
                    <?php } ?>        
                    <div class="clearfix"> </div>   
                                </div>
                            </div>  

                            
  <div role="tabpanel" class="tab-pane fade in active" id="produk" aria-labelledby="produk-tab">
                                <div class="agile-tp">

                                    <h2></h2>
                                    <br>
                                </div>
                                <div class="agile_top_brands_grids">
                                    <?php
                                        $query = "SELECT * FROM menu WHERE id_kategori=5 limit $start, $per_hal";
                                        $result_set = $koneksi->query($query);
                                        while ($row = $result_set->fetch_assoc()) {
                                    ?>
                                    <div class="col-md-3" >
                <div class="thumbnail" alt="">
                    <img src="foto/<?php echo $row['gambar'] ?>" class="img-rounded" height="250" width="220" class="col-md-12 img-responsive">
                    <div class="caption">
                        <h3><?php echo $row['nama']; ?></h3>
                        <h5>Rp. <?php echo number_format($row['harga'] );?></h5>
                        <a href="beli.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-danger">Beli</a>
                        <a href="detail.php?id=<?php echo $row['id_produk'];?>"class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
                    <?php } ?>        
                    <div class="clearfix"> </div>   
                                </div>
                            </div>  
    <!-- //top-brands -->


                


                                </div>
                            </ul>

                        </div><!-- @end #w -->
                    </div>
                </div>
            </div>  
        </section>


        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>
    

    </body>
    
<?php include('component/footer.php'); ?>
</html>


