<?php

include("connectMysql.php");
session_start();
 if (!empty($_POST["signup"])) {
      $email=$_POST['email'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $confpassword=$_POST['confpassword'];
      $errorMessage = array();
          if($password != $confpassword){
                $errorMessage[] = 'Passwords do not match';
                
          } else {
            $sql = "SELECT email FROM users WHERE email = '$email'";
            $result = $con->query($sql);
            $count = $result->num_rows;
            
            if($count == 0){
                $sql="insert into users (username, email, password) VALUES ('$username', '$email', '$password' )";
                
                if($con->query($sql) === TRUE){
                    $_SESSION['username']=$username;
                    $_SESSION['email']=$email;
                  echo "<script>window.location.href='main'</script>";
                }else{
                    $errorMessage[] = 'Mysql error';
                    
                }
            } else {
                $errorMessage[] = 'This email already exits';
            }   
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
      <title>register</title>
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
        <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    </div>
    
    <form class="form-signin" action="/register" method="post">

    <?php
        if (! empty($errorMessage) && is_array($errorMessage)) {
            ?>	
                    <div class="text-center mb-4 error-message">
                    <?php 

                    foreach($errorMessage as $message) {
                        echo $message . "<br/>";
                    }
                    ?>
                    </div>
        <?php
        }
        ?>
        
        <div class="form-label-group">
            <input type="text" class="form-control" id="inputUsername" name="username"  placeholder="Username" 
            value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" required autofocus>
            <label for="inputUsername">Username</label>
        </div>
        
        <div class="form-label-group">
            <input type="email" class="form-control" id="inputEmail1" name="email" placeholder="Email address" 
            value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required autofocus>
            <label for="inputEmail1">Email</label>
        </div>
        
        <div class="form-label-group">
            <input type="password" class="form-control" id="password1" name="password" placeholder="Password" 
            value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" required autofocus>
            <label for="password1">Password</label>
        </div>
        
        <div class="form-label-group">
            <input type="password" class="form-control" id="password2" name="confpassword" placeholder="Confirm Password"
            value="<?php if(isset($_POST['confpassword'])) echo $_POST['confpassword']; ?>" required autofocus> 
            <label for="password2">Confirm Password</label>
        </div>
        
        <br>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="signup" value="Sign up">
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>
    </form>
</div>
    
      
</body>
</html>