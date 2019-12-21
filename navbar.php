
<!---- Navbar ---->
	<link rel="stylesheet" type="text/css" href="admin/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/assets/css/main.css">
	<link rel="stylesheet" href="css/animate.css">
	
<div class="container-login100" style="background-image: url('admin/assets/img/bg-01.jpg');">
	
    	<!-- HEADER BEGIN -->
        <header>
            <div id="header">
            	<section class="top">
                	<div class="inner">
                    	<div class="fl">
                        	<div class="block_top_menu">
                            	<ul>
                                	                                </ul>
                            </div>
                        </div>


<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header" >
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" style=" height: 50px;
        padding-top: 8px;" href="index.php">Bfn Bakery</a>
                    </div>
                    
		<ul class="tp-hd-lft wow fadeInDown animated" data-wow-delay="0.5s" >
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right " style="margin: -7px">
			<li><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			
			<?php if (isset($_SESSION['pelanggan'])): ?>
				<li><a href="riwayat.php">Riwayat belanja</a></li>
				<li><a href="logout.php" >Logout</a></li>
				
				
			<?php else: ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="daftar2.php">Daftar</a></li>
			<?php endif ?>
			
		</ul>
	</div>
</nav>
	<div class="container-login100" style="background-image: url('admin/assets/img/bg-01.jpg');">
			