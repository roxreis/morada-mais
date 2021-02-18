<?php 

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "moradamais";

    $con = mysqli_connect($host, $user, $pass, $dbName);

    if ($con) {
        
        return true;

    } else {

        die ("falha" .mysqli_errno($con));
    }

    


