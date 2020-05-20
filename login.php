<?php
include("connectMysql.php");
session_start();

if (!empty($_POST["login"]) ) {
    $email = $_POST['email']; 
    $password = $_POST['password'];
    
    $sql = "SELECT email, username FROM users WHERE email = '$email' AND password = '$password'";
    $result = $con->query($sql);
    $count = $result->num_rows;
    
    if($count == 1) {
      $row = $result->fetch_assoc();
      $_SESSION['email']=$email;
      $_SESSION['username']=$row["username"];
      echo "<script> window.location.href='main' </script>";
    } else {
      //echo "user ".$email." failed to log in.";
      $errorMessage = 'Invalid email or password';
    }  
  
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
      <title>login</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/floating-labels/">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .error-message {
        padding: 7px 10px;
        background: #fff1f2;
        border: #ffd5da 1px solid;
        color: #d6001c;
        border-radius: 4px;
        margin: 30px 0px 10px 0px;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="/css/floating-labels.css" rel="stylesheet">

</head>

<body>

<div class="container container-register">
<div class="text-center mb-4">
    <img class="mb-4" src="/picture/stayhome.png"> 
    <!-- <h1 class="h3 mb-3 font-weight-normal">Login</h1> -->
</div>
<form class="form-signin" action="/login" method="post">
<?php
        if (! empty($errorMessage)) {
            ?>	
                    <div class="text-center mb-4 error-message">
                    <?php 
                        echo $errorMessage . "<br/>";
                    ?>
                    </div>
  <?php
        }
  ?>
  <div class="form-label-group">
    <input type="email" class="form-control" id="inputEmail1" name="email" placeholder="Email address" required autofocus>
    <label for="inputEmail1">Email</label>
  </div>
  <div class="form-label-group">
    <input type="password" class="form-control" id="inputPassword1" name="password" placeholder="Password" required autofocus>
    <label for="inputPassword1">Password</label>
  </div>
  
  <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Login">
  <input class="btn btn-lg btn-primary btn-block" type="button" onclick="location.href='register'" value="Register"/>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Stay Home With Me </p>
</form>
</div>

</body>
</html>