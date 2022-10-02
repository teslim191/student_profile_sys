<?php
include "config/db.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST["email"];
    $password = $_POST['password'];
    $cpassword = $_POST['password2'];
    $hashPassword = sha1($password);
    $passwordLength = strlen($password);

    $imagename = $_FILES["fileToUpload"]["name"];
    $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
    $path = "image/".$imagename;


    // check for empty fields
    if (empty($name) or empty($email) or empty($password) or empty($cpassword) or empty($imagename)) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>all fields are required!!</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    elseif ($passwordLength < 6 or $passwordLength > 12) {
        echo "<script>alert('password too short or too long')</script>";
    }
    elseif ($password != $cpassword) {
        echo "<script>alert('password do not match')</script>";
    }
    else {
        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>email already exist!!</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }
        else {
            move_uploaded_file($tmp_name, $path);
            $query = "INSERT INTO users(fullname,email,password,image_name) VALUES 
            ('$name','$email','$hashPassword','$imagename')";
            $res = mysqli_query($con,$query);
            if ($res) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>registration successful!!</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
        }        
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
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>


<section class="container mt-5">
    <div class="row">
        <div class="col-md-6 mt-5 m-auto">
            <h2>Sign Up</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
                <label for="">Confirm Password</label>
                <input type="password" name="password2" class="form-control">
                <label for="">Image</label>
                <input type="file" name="fileToUpload" class="form-control">
                <button type="submit" name="submit" class="btn btn-success mt-4">signup</button>
                <p>Already have an account? <a href="login.php" target="_blank" rel="noopener noreferrer">Login</a></p>
            </form>
        </div>
    </div>
</section>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>