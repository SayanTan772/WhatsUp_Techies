<?php
if (isset($_POST['action']) && isset($_POST["sender_id"]) && isset($_POST["receiver_id"])) {
    $action = $_POST['action'];
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];

    if ($action == 'send_request') {
        $sql = "INSERT INTO friend_reqs (sender_id, receiver_id, sts) VALUES ($sender_id, $receiver_id, 'pending')";
        mysqli_query($conn, $sql);
    } elseif ($action == 'accept_request') {
        // Check which button was clicked
        if (isset($_POST['accept'])) {
            $accept_query = "UPDATE friend_reqs SET sts = 'accepted' WHERE sender_id = $sender_id AND receiver_id = $receiver_id";
            mysqli_query($conn, $accept_query);        
        } elseif (isset($_POST['reject'])) {
            $reject_query = "UPDATE friend_reqs SET sts = 'rejected' WHERE sender_id = $sender_id AND receiver_id = $receiver_id";
            mysqli_query($conn, $reject_query);
        }
    }
}
?>