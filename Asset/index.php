
<?php require 'koneksi.php';?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Menu Utama</title>
</head>
<body>
	<?php include "menu.php"; ?>
	<!-- isi -->

	<?php if (empty($_SESSION['user'])) header("Location:login.php");?>

	<div class="container-fluid" style="padding-top: 10%; text-align: center">
		<h1>
			SELAMAT DATANG DI <br>APLIKASI DAFTAR ASSET PT FIBERTRUST
		</h1>
	</div>

	
</body>
</html>