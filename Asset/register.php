<?php



if( isset($_SESSION['user']) ){
	header("Location: /");
}

require 'koneksi.php';

$message = '';

if(!empty($_POST['username']) && !empty($_POST['password'])):
	$user = $_POST['username'] ;
	$userpass = $_POST['password'] ;
	
	// Enter the new user in the database
	$sql = "SELECT username FROM users  WHERE username='$user' AND password='$userpass'";
	$res = mysqli_query($konek, $sql);
	$total =  mysqli_num_rows($res) ;            
	
    if ($total== 0){
    	$sqlNewUser = "INSERT INTO users (username, password, privilege) VALUES ('$user','$userpass',0)";
        mysqli_query($konek, $sqlNewUser);
        
		$message = 'Successfully created new user';
        
    } else {
        $message = 'Sorry there must have been an issue creating your account';
    }

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="header">
		<a href="index.php">Tambah Admin</a>
	</div>
	

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<!-- <span>or <a href="login.php">login here</a></span> -->

	<form action="register.php" method="POST">
		
		<input type="text" placeholder="Enter Username" name="username">
		<input type="password" placeholder="and password" name="password">
		
		<input type="submit">

	</form>

</body>
</html>