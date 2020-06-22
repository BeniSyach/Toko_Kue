<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    	  <a class="navbar-brand" href="index.php" >BFN BAKERY </a>
    </div>
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>          
		<ul class="tp-hd-lft wow fadeInDown animated" data-wow-delay="0.5s" >
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right " style="margin: -7px">
			<li><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			
			<?php if (isset($_SESSION['id_pelanggan'])): ?>
				<li><a href="riwayat.php">Riwayat belanja</a></li>
				<li><a href="logout.php" >Logout</a></li>
				
				
			<?php else: ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="daftar2.php">Daftar</a></li>
			<?php endif ?>
			

		</ul>

	</div>
</ul>
</nav>
			