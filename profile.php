<?php
include('configure.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="profile.css" />
    <link rel="icon" type="image/x-icon" href="./Media/favicon.svg">
    <title>Profile</title>
  </head>
  <body>
  <div class="card">
    <div class="card-bg">
      <div class="circle1"></div>
      <div class="circle2"></div>
      <div class="circle3"></div>
    </div>
    <div class="pf"><img src="<?=$_SESSION['pf']?>"></div>
    <div class="about">
      <p class="name"><?=$_SESSION['username']?></p>
      <p class="bio"><?=$_SESSION['bio']?></p>
    </div>
  </div>
  <script src="tilt.js"></script>
  </body>
</html>
