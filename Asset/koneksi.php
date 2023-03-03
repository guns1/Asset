<?php
	session_start();
	//urutan = server, userdb, passdb, namadb
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'asset';

	$konek = mysqli_connect($server, $username, $password, $database);

	// function query($sql){
	//         global $konek ;

	//         return mysqli_query($konek, $sql) ;
	//     }

	//     function total($sql){
	//         global $konek ;

	//         $res = query($sql) ;
	//         return mysqli_num_rows($res) ;
	//     }

	
?>

