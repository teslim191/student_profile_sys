<?php
include "config/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // delete record
    $query = "DELETE FROM details WHERE id='$id'";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo"<script>alert('Record deleted successfully')</script>";
        header('Refresh:0; url=index.php');
    }
    else{
        echo"<script>alert('Unable to delete record')</script>";
    }
}

?>