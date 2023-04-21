<?php

include('configure.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./Media/favicon.svg">
    <link rel="stylesheet" href="landing.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <title>WhatsUp Techies</title>
</head>
<body>
    <img class="card" src="./Media/container.svg">
    <div class="overlay">
    <ul style="list-style-type:none;padding-top:20px;margin-bottom:5px;">
        <li style="float:left;padding-right:15px;"><img src="./Media/favicon.svg"></li>
        <li style="float:left;font-size:20px;font-weight:400;color:hsl(0,100%,100%);padding-top:15px;">WhatsUp Techies</li>
    </ul>
    <div class="heading">
        <img src="./Media/kyle.svg">
        <div class="about">
            <span class="kyle">Kyle</span> invites you to join WhatsUp Techies.<br>
            <div class="description">Connect and chat with Techies all around the globe or simply build a coummunity of people to grow and learn together. Join Us today!</div>
    </div>
    </div>
    <div class="btns">
        <button class="btn" onclick="signup()">Sign up</button>
        <button class="btn" onclick="signin()">Log in</button>
    </div>
    </div>
   
   <img class="circle1" src="./Media/circle1.svg">
   <img class="circle2" src="./Media/circle2.svg">
   <img class="circle3" src="./Media/circle3.svg">
   <img class="curve1" src="./Media/curve1.svg">

    <div class="nav-img img1" id="img1"></div>
    <div class="nav-img img2" id="img2"></div>
    <div class="nav-img img3" id="img3"></div>

    <script src="landing.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
    function signup(){
        window.location.href="signup.php";
    }
    function signin(){
        window.location.href="signin.php";
    }
    </script>
</body>
</html>