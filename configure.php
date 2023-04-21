<?php
session_start();
$conn=mysqli_connect("localhost", "root", "", "whatsup-techies");

if(!$conn){
    echo "Something went wrong!";
    exit;
}
?>