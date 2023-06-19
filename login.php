<?php

include("configure.php");
if(isset($_POST["username"]) && isset($_POST["password"])){

$username = $_POST["username"];  
$password = $_POST["password"];

if(!empty($username) && !empty($password)){

    $sql = "SELECT * FROM users WHERE Username = '$username'";  
    $result = mysqli_query($conn, $sql);  
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($user){
        if($password===$user["Password"]){
        $_SESSION["uniqueID"]=$user["ID"];
        $_SESSION["username"]=$user["Username"];
        $_SESSION["email"]=$user["Email"];
        $_SESSION["bio"]=$user["Bio"];
        $_SESSION["pf"]=$user["Photo"];
        $sql1 = "UPDATE users SET sts='Active now' WHERE ID={$user['ID']}";
        mysqli_query($conn, $sql1);
        echo "success";
      }else{
        echo "Wrong Password!";
      }
    }
    else{
    echo "Username does not exist!";
    }
}else{
    echo "All fields are required!";
}
}

?>