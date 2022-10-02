<?php
session_start();
if (isset($_SESSION['email'])) {
    session_destroy();
    header("Refresh:0; url=login.php");
    echo "<script>alert('you have successfully logout')</script>";
}





?>