<?php 

include('configure.php');
session_unset();
session_destroy();
header("Location: signin.php");

?>