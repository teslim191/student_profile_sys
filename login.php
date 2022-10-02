<?php
require('./config/db.php');
session_start();

if (isset($_SESSION['email'])) {
    header('Refresh:0; url=index.php');
}
else {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashPassword = sha1($password);

        if (empty($email) || empty($password)) {
            echo"<script>alert('all fields are required')</script>";
        }
        else {
            $query = "SELECT * FROM users WHERE email='$email' AND password = '$hashPassword'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) == 0) {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>email or password incorrect!!</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
            else {
                    while($arr = mysqli_fetch_array($result)) {
                        $fullname = $arr['fullname'];
                        $email = $arr['email'];

                        $_SESSION['fullname'] = $fullname;
                        $_SESSION['email'] = $email;

                        header("Refresh:0; url=index.php");
                        echo "<script>alert('you are logged in')</script>";
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
            <h2>Login</h2>
            <form action="" method="post">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
                <button type="submit" name="login" class="btn btn-success mt-4">Login</button>
                <p>Don't have an account? <a href="register.php" target="_blank" rel="noopener noreferrer">register</a></p>
            </form>
        </div>
    </div>
</section>    
    <?php } ?>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>

