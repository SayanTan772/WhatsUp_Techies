<?php 

include('configure.php');
$sql = "UPDATE users SET sts='Offline' WHERE ID={$_SESSION['uniqueID']}";
mysqli_query($conn, $sql);
session_unset();
session_destroy();
header("Location: signin.php");

?>
