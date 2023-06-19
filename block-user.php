<?php
include "configure.php";

if (isset($_SESSION["uniqueID"]) && isset($_POST["user_id"])) {
    $send_id = $_SESSION["uniqueID"];
    $receive_id = $_POST["user_id"];

    // Check if the user to be blocked exists in the database
    $sql = "SELECT * FROM users WHERE ID = $receive_id";
    $query = mysqli_query($conn, $sql);
    $output = "";

    if (mysqli_num_rows($query) > 0) {
        // Check if a block request already exists
        $existing_request_query = mysqli_query($conn, "SELECT * FROM block_reqs WHERE send_id = '$send_id' AND receive_id = '$receive_id'");

        if (mysqli_num_rows($existing_request_query) > 0) {
            $existing_request = mysqli_fetch_assoc($existing_request_query);

            // Toggle the block status
            if ($existing_request['block_sts'] == 'blocked') {
                $new_status = 'unblocked';
            } else {
                $new_status = 'blocked';
            }

            $sql2 = "UPDATE block_reqs SET block_sts = '$new_status' WHERE send_id = $send_id AND receive_id = $receive_id";
            $query2 = mysqli_query($conn, $sql2);
        } else {
            // Check if the user has already blocked me
            $blocked_me=mysqli_query($conn, "SELECT * FROM block_reqs WHERE send_id = '$receive_id' AND receive_id = '$send_id' AND block_sts = 'blocked'");
            if(mysqli_num_rows($blocked_me) == 0){
                // Insert a new block request
                $sql2 = "INSERT INTO block_reqs (send_id, receive_id, block_sts) VALUES ($send_id, $receive_id, 'blocked')";
                $query2 = mysqli_query($conn, $sql2);
            }
        }
    }
    echo $output;
}
?>
