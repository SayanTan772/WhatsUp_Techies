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
    <link rel="stylesheet" href="signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Sign In</title>
</head>
<body>
<div class="div">
    <div class="bg">
    <img src="./Media/signin-card.svg">
    </div>
    <div class="form-div">
    <p class="top">New member ? <a href="signup.php">Sign up now</a></p>
    <div class="form">
    <form class="myform" method="POST" action="#" autocomplete="off" spellcheck="false">
    <p class="h2">Sign In</p>
    <hr>
    <div class="error" id="error" name="error"></div> <!--error message!-->
    <div class="mb-3">
    <label for="exampleusername1" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="userameHelp">
    </div>
    <div class="mb-3">
    <div class="password-div">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <span class="toggle" onclick="visibility()">
        <i class="fa-sharp fa-solid fa-eye-slash" id="closed-eye"></i>
        <i class="fa-solid fa-eye" id="open-eye"></i>
    </span>
    <div class="forget"><a href="forgot-passwrd.php">forgot password ?</a></div>
    </div>
    </div>
    <button type="submit" class="signin-btn" name="signin-btn">Sign In</button>
    </form>
    </div>
    </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/146a70a82f.js" crossorigin="anonymous"></script>
<script src="psswrdshow.js"></script>
<script src="login.js"></script>
</html>