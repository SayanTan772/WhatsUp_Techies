<?php

include "configure.php";
if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];
    $sql = "SELECT * FROM users WHERE ID=$user_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $is_blocked_by = mysqli_query($conn, "SELECT * FROM block_reqs WHERE send_id = $_SESSION[uniqueID] AND receive_id = $user_id AND block_sts = 'blocked'");
    $is_blocked_to = mysqli_query($conn, "SELECT * FROM block_reqs WHERE send_id = $user_id AND receive_id = $_SESSION[uniqueID] AND block_sts = 'blocked'");

    if(mysqli_num_rows($is_blocked_by) == 0 && mysqli_num_rows($is_blocked_to) == 0){
        echo $row["sts"];
    }
    else{
        echo "hidden";
    }
}

?>