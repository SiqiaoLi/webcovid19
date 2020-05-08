<?php
      

include("connectMysql.php");
session_start();
 if (array_key_exists('email', $_POST) && array_key_exists('username', $_POST) && array_key_exists('password', $_POST) && array_key_exists('confpassword', $_POST)) {
      $email=$_POST['email'];
      $username=$_POST['username'];
      $password=$_POST['password'];
          $confpassword=$_POST['confpassword'];
      
          if($password != $confpassword){
                echo "Passwords do not match";
          } else {
            $sql="insert into users (username, email, password) VALUES ('$username', '$email', '$password' )";
          
            if($con->query($sql) === TRUE){
                  $_SESSION['username']=$username;
                  $_SESSION['email']=$email;
                echo "<script>window.location.href='main'</script>";
            }else{
                echo "error!";
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
    
<title>regester</title>

</head>
<body>

<div class="container container-register">
    <h3>Register</h3>
    <form action="/register" method="post" onsubmit="return check()">
        
        <div class="form-group">
            <label for="exampleInputUsername">Username:</label>
            <input type="text" class="form-control" id="username" name="username"  placeholder="username">
        </div>
        <span id="username_tx" class="stuinfo" style="float: left;"></span>
        <div class="form-group">
            <label for="exampleInputEmail1">Email:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="email">
        </div>
        <span id="nicheng_tx" class="stuinfo" style="float: left;" id="uu"></span>
        <div class="form-group">
            <label for="exampleInputPassword">Password:</label>
            <input type="password" class="form-control" id="password1" name="password" placeholder="password">
        </div>
        <span id="password1_tx" class="stuinfo" style="float: left;"></span>
        <div class="form-group">
            <label for="Password4">Confirm Password:</label>
            <input type="password" class="form-control" id="password2" name="confpassword" placeholder="confirm password">
        </div>
        <span id="password2_tx" class="stuinfo" style="float: left;"></span>
        <br>
        <div style="clear: both;"></div>
        <button type="reset" class="btn btn-primary reset">Reset</button>
        <button type="submit" class="btn btn-primary login" >Sign up</button>
    </form>
</div>

<script>
        function check(){
            if($("#uu").html()=="1"){
                return false;
            }else{
                return true;
            }
        }
        $(function(){
            
            var username = $("#username").val();
            var nicheng = $("#email").val();
            var password1 = $("#password1").val();
            var password2 = $("#password2").val();
            
            //username
            $("#username").blur(function () {
                username = $("#username").val();
                if(username == ""){
                    $("#username_tx").html("Please enter username");
                
                }else{
                    $("#username_tx").html("");
                }
            });
            //email
            $("#email").blur(function () {
                nicheng = $("#email").val();
                if(nicheng == ""){
                    $("#email_tx").html("Please enter email");
                }else{
                    $("#email_tx").html("");
                }
            });
            //password
            $("#password1").blur(function () {
                password1 = $("#password1").val();
                if(password1 == ""){
                    $("#password1_tx").html("Please enter password");
                }else{
                    $("#password1_tx").html("");
                }
            });
            //password1 ?= password2
            $("#password2").blur(function () {
                password2 = $("#password2").val();
                password1 = $("#password1").val();
                if(password1 != password2){
                    $("#password2_tx").html("Passwords do not match");
                    $("#password1").html("");
                    $("#password2").html("");
                    $("#uu").html("1");
                }else{
                    $("#password2_tx").html("");
                }
            });
        })
    </script>
    
      
</body>
</html>