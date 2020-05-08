<?php
include("connectMysql.php");
session_start();

if (array_key_exists('email', $_POST) && array_key_exists('password', $_POST) ) {
    $email = $_POST['email']; 
    $password = $_POST['password'];
    

    if ($email == null || !$email){
      echo "Please enter ID";
  } elseif($password == null || !$password){
      echo "Please enter password";
  } else {
    
    $sql = "SELECT email FROM users WHERE email = '$email' and password = '$password'";
    $result = $con->query($sql);
    $count = $result->num_rows;
    
    if($count == 1) {
      $_SESSION['login_email'] = $email;
      echo "user ".$email." logged-in.";
      echo "<script> window.location.href='main' </script>";
    } else {
      echo "user ".$email." failed to log in.";
    }  
  }
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container container-register">
<h3>Login</h3>
<form class="form-signin" action="/login" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <a href="register"> Register here</a>
</form>
</div>

</body>
</html>