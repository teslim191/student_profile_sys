<?php
require('config/db.php');
session_start();
$email = $_SESSION['email'];
if (!isset($_SESSION['email'])) {
    header("Refresh:0; url=login.php");
    echo "<script>alert('you dont have access to this resource')</script>";
}
else {
    
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
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-md">
  <a class="navbar-brand" href="dashboard.php">Home</a>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ms-auto">
    <li class="nav-item">
      <a class="nav-link" href="" data-bs-target="#info" data-bs-toggle="modal" >Add Info</a>
    </li>
    <li  class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>

    </li>
  </ul>
  </div>
  </div>
</nav>
<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Welcome, <?php echo $_SESSION['fullname'];    ?></strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>


<?php
  $query = "SELECT * FROM users WHERE email='$email'";
  $res = mysqli_query($con, $query);
  if ($res) {
    while ($arr = mysqli_fetch_array($res)) {
      $fullname = $arr['fullname'];
      $email = $arr['email'];
      $imagename = $arr['image_name'];
    }
  }
?>


<div class="container">
  <div class="row mt-4">
    <div class="col-lg-5">
      <img style="max-width: 50%;border-radius: 50%;" src="image/<?php echo $imagename;   ?>" alt="">
      <h3>Name: <?php echo $_SESSION['fullname'];  ?></h3>
      <h3>Email: <?php echo $_SESSION['email'];  ?></h3>
    </div>
    <div class="col-lg-7 mt-5">
      <?php
      $query = "SELECT * FROM details WHERE email = '$email'";
      $res = mysqli_query($con, $query);
      if (mysqli_num_rows($res) > 0) {
        while ($arr=mysqli_fetch_array($res)) {
            $course = $arr['course'];
            $amount = $arr['amount'];
            $duration = $arr['duration'];
            $instructor = $arr['instructor'];
            $status = $arr['status'];

            echo"
            <table class='table'>
            <tbody>
              <tr>
                <th>Course</th>
                <td>$course</td>
              </tr>
              <tr>
                <th>Amount</th>
                <td>₦$amount</td>
              </tr>
              <tr>
                <th>Duration</th>
                <td>$duration</td>
              </tr>  
              <tr>
                <th>Instructor</th>
                <td>$instructor</td>
              </tr>
              <tr>
                <th>Status</th>
                <td>$status</td>
              </tr>
            </tbody>
            </table>
            ";

        }
      }
?>
  <a href="edit.php" target="_blank" class="btn btn-info px-3">Edit</a>
    </div>
  </div>
</div>

<?php
// add details
if(isset($_POST['details']))
{
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $course = $_POST['course'];
  $amount_paid = $_POST['amount'];
  $duration = $_POST['duration'];
  $instructor = $_POST['instructor'];
  $status = $_POST['status'];

  if (empty($course) or empty($amount_paid) or empty($duration) or empty($instructor) or empty($status)) 
  {
    echo"<script>alert('all fields are required!!')</script>";
  }
  else 
  {
    $query = "INSERT INTO details(fullname,email,course,amount,duration,instructor,status) VALUES ('$fullname','$email','$course','$amount_paid','$duration','$instructor','$status')";
    $res = mysqli_query($con, $query);
    if ($res) {
      echo"<script>alert('Details added successfully')</script>";
    }    
  }

}
?>




<!-- Modal -->
<div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container">
        <form action="" method="POST">
            <input type="hidden" name="fullname" value="<?php echo $_SESSION['fullname'];?>">
            <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">
            <label for="">Course:</label>
            <input type="text" name="course" class="form-control mb-2">
            
            <label for="">Amount Paid:</label>
            <input type="text" name="amount" class="form-control mb-2">
            
            <label for="">Duration:</label>
            <input type="text" name="duration" class="form-control mb-2">
            
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
            <button type="submit" class="btn btn-success" name="details">Add Details</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php } ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>