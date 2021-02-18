<?php
	try {
		$dns = "mysql:dbname=moradamais;host=localhost";
		$user = "root";
		$pass = "";
		$connect = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}



?>