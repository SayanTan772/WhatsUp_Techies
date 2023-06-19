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
      <?php
         if(isset($_SESSION["uniqueID"])){
          echo '<div class="about">
                <span class="kyle">Kyle</span> invites you to join WhatsUp Techies.<br>
                <div class="description" id="description">Welcome! <b>'.$_SESSION["username"].'</b> 👋🏻 We know that staying up-to-date with the latest trends and technologies can be challenging. That\'s why our chat application is designed to be a hub for learning and growth!
                </div>';
         }else{
          echo '<div class="about">
                <span class="kyle">Kyle</span> invites you to join WhatsUp Techies.<br>
                <div class="description">Connect and chat with Techies all around the globe or simply build a coummunity of people to grow and learn together. Join Us today!
                </div>';
         }
      ?>
    </div>
    </div>
    <?php
      if(isset($_SESSION["uniqueID"])){
        echo '';
      }
      else{
        echo '<div class="btns">
              <button class="btn" onclick="signup()">Sign up</button>
              <button class="btn" onclick="signin()">Log in</button>
              </div>';
      }
    ?>
    </div>
   
   <img class="circle1" src="./Media/circle1.svg">
   <img class="circle2" src="./Media/circle2.svg">
   <img class="circle3" src="./Media/circle3.svg">
   <img class="curve1" src="./Media/curve1.svg">

   <div class="slider-container swiper mySwiper">
      <div class="swiper-wrapper wrapper">
        <div class="slider-card swiper-slide card1">
          <div class="img-div"><img src="./Media/unsplash_profile_img.svg"></div>
          <h2>Hey!</h2>
          <p class="text">Would you like to see how cool your own profile looks?</p>
          <button class="buttons" onclick="profile()">View</button>
        </div>
        <div class="slider-card swiper-slide card2">
          <img src="./Media/demo-icon.png">
          <h2>bored?</h2>
          <p class="text">Would you like to chat with someone?</p>
          <button class="buttons" onclick="chats()">Chat</button>
        </div>
        <div class="slider-card swiper-slide card3">
          <div class="img-div"><img src="./Media/johnsmith.svg"></div>
          <h2>Opps!</h2>
          <p class="text">Would you like to make changes to your profile?</p>
          <button class="buttons" onclick="edit()">Edit</button>
        </div>
      </div>
    </div>

<script src="hover.js"></script>
<script>
    function signup(){
      window.location.href="signup.php";
    }
    function signin(){
      window.location.href="signin.php";
    }
    function profile(){
      window.location.href="profile.php";
    }
    function chats(){
      window.location.href="chats.php";
    }
    function edit(){
      window.location.href="update-profile.php";
    }
    function logout(){
      window.location.href="logout.php";
    }
</script>
</body>
</html>