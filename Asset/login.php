<?php




require 'koneksi.php';

if (isset($_POST['simpan'])){
        $user = $_POST['username'] ;
        $userpass = $_POST['password'] ;

        if (empty($user) || empty($userpass)){
            $msg = 'Harap masukkan data dengan benar' ;
        } else {
            $sql = "SELECT * FROM users where username='$user' and password='$userpass'" ;
            $res = mysqli_query($konek, $sql);
            $total =  mysqli_num_rows($res) ;            
	        if ($total == 1){
	            $_SESSION['user'] = mysqli_fetch_assoc($res);

                header("Location:index.php");
            } else {
                $msg = 'Login Gagal. Pastikan Username dan password benar!' ;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="index.php">Daftar Asset</a>
	</div>
	

	<?php if(!empty($msg)): ?>
		<p><?= $msg ?></p>
	<?php endif; ?>

	<h1>Login</h1>
	
	<form action="login.php" method="POST">
		
		<input type="text" placeholder="Masukan username anda" name="username">
		<input type="password" placeholder="Kata Sandi" name="password">

		<input type="submit" name = "simpan">

	</form>

</body>
</html>