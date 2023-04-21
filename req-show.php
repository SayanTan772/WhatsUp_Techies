<?php
include "configure.php";
if(isset($_SESSION["uniqueID"])){
    $sql="SELECT users.* FROM users JOIN friend_reqs ON users.ID = friend_reqs.sender_id WHERE friend_reqs.receiver_id = {$_SESSION["uniqueID"]} AND friend_reqs.sts = 'pending'";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= '<div class="no-request"><div class="robot"><i class="fa-solid fa-robot fa-3x"></i></div>No friend Requests Pending</div>';
    }elseif(mysqli_num_rows($query) > 0){
        while($row=mysqli_fetch_assoc($query)){
            $output .= '<a href="chats.php?user_id='.$row["ID"].'"><div class="req">
                        <img src="'.$row["Photo"].'">
                        <div class="details">'.$row["Username"].' <span>Send you a Friend Request</span></div>
                        </div></a>';
        }
    }
    echo $output;
}
?>