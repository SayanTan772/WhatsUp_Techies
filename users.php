<?php

include_once "configure.php";

$outgoing_id = $_SESSION['uniqueID'];
$sql = "SELECT * FROM users WHERE NOT ID = {$outgoing_id} ORDER BY ID DESC";
$query = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($query) == 0){
    $output .= '<div class="default">
                No users are available to chat
               </div>';
}elseif(mysqli_num_rows($query) > 0){
    while($row=mysqli_fetch_assoc($query)){
        $check_blocked = mysqli_query($conn, "SELECT * FROM block_reqs WHERE (send_id = '".$row["ID"]."' AND receive_id = $outgoing_id AND block_sts = 'blocked') OR (send_id = '$outgoing_id' AND receive_id = '".$row["ID"]."' AND block_sts = 'blocked')");

        if(mysqli_num_rows($check_blocked)){
            $output .= '<a href="chats.php?user_id='.$row["ID"].'"><div class="user-tab">
                        <img class="user-pf" src="'.$row["Photo"].'">
                        <div class="details">'.$row["Username"].'<br>
                        <span class="status">hidden</span></div>
                        </div></a>';
        }else{
            $output .= '<a href="chats.php?user_id='.$row["ID"].'"><div class="user-tab">
                        <img class="user-pf" src="'.$row["Photo"].'">
                        <div class="details">'.$row["Username"].'<br>
                        <span class="status">'.$row["sts"].'</span></div>
                        </div></a>';
        }
    }
}
echo $output;

?>
