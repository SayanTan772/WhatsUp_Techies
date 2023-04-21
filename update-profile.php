<?php

include('configure.php');

if(isset($_POST["username"]) && isset($_POST["bio"])){

  $username=$_POST["username"];
  $bio=$_POST["bio"];

  if(isset($_FILES["inputfile"]["name"]) && $_FILES["inputfile"]["error"]==0){
  $src = $_FILES["inputfile"]["tmp_name"];
  $imageName = $_FILES["inputfile"]["name"];

  $target = "./UserPF/". $imageName;

  move_uploaded_file($src, $target);

  $sql = "UPDATE users SET Username='$username', Bio='$bio', Photo='$target' WHERE ID='{$_SESSION['uniqueID']}'";
  mysqli_query($conn, $sql);
  $_SESSION['username']=$username;
  $_SESSION['bio']=$bio;
  $_SESSION['pf']=$target;

  }
  else{
  $sql = "UPDATE users SET Username='$username', Bio='$bio' WHERE ID='{$_SESSION['uniqueID']}'";
  mysqli_query($conn, $sql);
  $_SESSION['username']=$username;
  $_SESSION['bio']=$bio;
  }
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
      <div class="back-btn"><i class="fa-solid fa-circle-chevron-left fa-2x"></i></div>
      <div class="img-div"><i class="fa-solid fa-check fa-4x"></i></div>
      <div class="success-msg">Successfully Saved Changes!</div>
      </div> <!--back card ends!-->

    </div> <!--main container ends!--->
  <script>
  document.getElementById('inputfile').onchange=function(){
  document.getElementById('pf').src=URL.createObjectURL(inputfile.files[0]);
  }
  </script>
  <script src="https://kit.fontawesome.com/146a70a82f.js" crossorigin="anonymous"></script>
  <script src="slide.js"></script>
  </body>
</html>