<?php 

    include "configure.php";
    if(isset($_SESSION['uniqueID'])){
        $outgoing_id = $_SESSION['uniqueID'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $is_blocked_by = mysqli_query($conn, "SELECT * FROM block_reqs WHERE send_id = $_SESSION[uniqueID] AND receive_id =$incoming_id AND block_sts = 'blocked'");
        $is_blocked_to = mysqli_query($conn, "SELECT * FROM block_reqs WHERE send_id = $incoming_id AND receive_id = $_SESSION[uniqueID] AND block_sts = 'blocked'");

        if(mysqli_num_rows($is_blocked_by) == 0 && mysqli_num_rows($is_blocked_to) == 0){
            if(!empty($message)){
                $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ($incoming_id, $outgoing_id, '$message')") or die();
            }
        }
    }
    
?>