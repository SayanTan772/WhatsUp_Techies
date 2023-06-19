<?php
include('configure.php');

if(empty($_SESSION["uniqueID"])){
  header("Location: signin.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="update-profile.css" />
    <link rel="icon" type="image/x-icon" href="./Media/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Profile</title>
  </head>
  <body>
    <div class="maincontainer"> <!--main container starts!--->
    
      <div class="frontcard"> <!--front card starts!-->
      <div class="card-bg">
      <div class="circle1"></div>
      <div class="circle2"></div>
      <div class="circle3"></div>
      </div>
      <form class="myform" spellcheck="false"  autocomplete="off" method="POST" enctype="multipart/form-data">
      <div class="change-pf">
      <div class="pf"><img id="pf" src="<?=$_SESSION['pf']?>"></div>
      <div class="img-change">
      <i class="fa-solid fa-camera"></i>
      <input type="file" class="inputfile" id="inputfile" name="inputfile" accept=".jpg, .jpeg, .png, .svg">
      </div>
      </div>
      <div class="input-div">
      <div class="label">Username</div>
      <input type="text" class="username" id="username" name="username" value="<?=$_SESSION['username']?>">
      </div>
      <div class="bottom-input">
      <div class="label">Bio</div>
      <textarea class="bio" name="bio" id="bio" maxlength="130"><?=$_SESSION['bio']?></textarea>
      </div>
      <div class="btn-div"><button type="submit" class="save-btn" id="save-btn" name="save-btn">Save Changes</button></div>
      </form>
      </div> <!--front card ends!-->

      <div class="backcard"> <!--back card starts!-->
      <div class="back-btn"><span style="font-size:30px;"><i class="fa-solid fa-circle-chevron-left"></i></span></div>
      <img src="./Media/profile-edit.svg">
      </div> <!--back card ends!-->

    </div> <!--main container ends!--->
  <script>
  document.getElementById('inputfile').onchange=function(){
  document.getElementById('pf').src=URL.createObjectURL(inputfile.files[0]);
  }
  </script>
  <script src="https://kit.fontawesome.com/146a70a82f.js" crossorigin="anonymous"></script>
  <script src="update-profile.js"></script>
  <script>
    const btn=document.querySelector(".save-btn");
    const front=document.querySelector(".frontcard");
    const back=document.querySelector(".back-btn");

    btn.addEventListener("click", function(){
        front.classList.add("slide-back");
    });
    back.addEventListener("click", function(){
        front.classList.remove("slide-back");
    });
  </script>
  </body>
</html>