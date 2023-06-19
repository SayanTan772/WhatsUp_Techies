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