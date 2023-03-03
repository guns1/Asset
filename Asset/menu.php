<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			
			<?php if (!isset($_SESSION['user'])) : ?>
				<a href="login.php" class="navbar-brand">LOGIN</a>
			<?php else : ?>
			    <a href="logout.php" class="navbar-brand">LOGOUT <b><?= strtoupper($_SESSION['user']['username']) ?> </b>
			    </a>
			<?php endif; ?>
		</div>
				<ul class="nav navbar-nav">
			<li> <a href="tambah_asset2.php"> Tambah Asset </a> </li>
			<li> <a href="daftar_asset.php"> Daftar Aset </a> </li>
			<li> <a href="log.php"> Log Asset </a> </li>
			<?php 
			if ($_SESSION['user']['privilege']){
			?> <li><a href="register.php">Register</a></li>
			<?php } ?>

		
		</ul>
	</div>
</nav>