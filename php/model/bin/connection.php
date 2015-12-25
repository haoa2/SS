<?php
/*
	Build by eulr @ eulr.mx
	hola@eulr.mx
*/
	class Connection{
		function connect($db){
			$servername = "localhost";
			$username = "root";
			$password = "";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $db);

			// Check connection
			if (!$conn) {
			    die("Connection failed:".PHP_EOL);
			} 

			return $conn;
		}
	}
?>