<?php
include "configure.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./Media/favicon.svg">
    <link rel="stylesheet" href="forgot-passwrd.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Password Reset</title>
</head>
<body>
<div class="div">
    <div class="bg">
    <img src="./Media/reset-passwrd-bg.svg">
    </div>
    <div class="form-div">
    <p class="top">Go back ? <a href="signin.php">Sign in now</a></p>
    <div class="form">
    <form class="myform" method="POST" action="#" autocomplete="off" spellcheck="false">
    <p class="h3">Reset Password</p>
    <hr>
    <div class="alert alert-danger" role="alert" id="error"></div> <!--error message!-->
    <div class="alert alert-success" role="alert" id="success"></div> <!--success message!-->
    <div class="mb-3">
        <label for="exampleemail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="exampleusername1" class="form-label">New Password</label>
    <input type="text" class="form-control" id="password" name="password" aria-describedby="userameHelp">
    </div>
    <div class="mb-3">
    <div class="password-div">
    <label for="exampleInputPassword1" class="form-label">Confirm New Password</label>
    <input type="password" class="form-control" id="confirm-password" name="confirm-password">
    <span class="toggle" onclick="visibility()">
        <i class="fa-sharp fa-solid fa-eye-slash" id="closed-eye"></i>
        <i class="fa-solid fa-eye" id="open-eye"></i>
    </span>
    </div>
    </div>
    <button type="submit" class="save-btn" name="save-btn">Save Changes</button>
    </form>
    </div>
    </div>
    </div>  
</body>
<script src="https://kit.fontawesome.com/146a70a82f.js" crossorigin="anonymous"></script>
<script src="forgot-passwrd.js"></script>
<script>
    function visibility()
   {
    var x=document.getElementById("confirm-password");
    var icon1=document.getElementById("closed-eye");
    var icon2=document.getElementById("open-eye");

    if(x.type=="password")
     {
        x.type="text";
        icon1.style.display="none";
        icon2.style.display="block";
        icon2.style.display = "inline";
      }
    else{
        x.type="password";
        icon1.style.display="block";
        icon1.style.display = "inline";
        icon2.style.display="none";
      }
    }
</script>
</html>