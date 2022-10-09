<?php include "config/db.php";  
session_start();
$email = $_SESSION['email'];
if (!isset($_SESSION['email'])) {
    header("Refresh:0; url=login.php");
    echo "<script>alert('you dont have access to this resource')</script>";
}
else {  

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $course = $_POST['course'];
    $amount_paid = $_POST['amount'];
    $duration = $_POST['duration'];
    $instructor = $_POST['instructor'];
    $status = $_POST['status'];

    // update record
    $query = "UPDATE details SET course='$course', amount='$amount_paid',
     duration='$duration', instructor='$instructor', status='$status'
      WHERE id ='$id'";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Record updated successfully')</script>";
        header("Refresh:0; url=index.php");
    }
    else {
        echo "<script>alert('Unable to update record')</script>";
    }

}



?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM details WHERE id='$id'";
        $res = mysqli_query($con, $query);
        if ($res) {
            while ($arr = mysqli_fetch_array($res)) {
                $id = $arr['id'];
                $course = $arr['course'];
                $amount = $arr['amount'];
                $duration = $arr['duration'];
                $instructor = $arr['instructor'];
                $status = $arr['status'];
            }
        } 
    }

    ?>

    <div class="container mt-3 pt-3" style="max-width: 25%;">
        <h3>Edit Details</h3>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="fullname" value="<?php echo $name; ?>" class="form-control mb-2">
            <input type="hidden" name="email" value="<?php echo $email; ?>" class="form-control mb-2">
            <label for="">Course:</label>
            <input type="text" name="course" value="<?php echo $course;  ?>" class="form-control mb-2">
            
            <label for="">Amount Paid:</label>
            <input type="text" name="amount" value="<?php echo $amount;  ?>" class="form-control mb-2">
            
            <label for="">Duration:</label>
            <input type="text" name="duration" value="<?php echo $duration;  ?>" class="form-control mb-2">
            
            <label for="">Instructor:</label>
            <input list="instructor" name="instructor" class="form-control mb-2">
            <datalist id="instructor">
              <option value="Teslim">
              <option value="Yusuf">
              <option value="Bukola">
              <option value="Victor">
              <option value="Emmanuel">
            </datalist>

            <label for="">Status:</label>
            <select name="status" id="" class="form-control mb-2">
              <option value="">---</option>
              <option value="Current">Current</option>
              <option value="Past">Past</option>
            </select>
            <button type="submit" class="btn btn-success" name="update">Update  Details</button>
        </form>
    </div>
  <?php } ?>  
</body>
</html>