<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "blog_app";


$con = mysqli_connect($servername, $username,$password, $db);

if (!$con) {
    die("unable to connect to the database");
}
else{
    // echo "database connected successfully";
}



?>