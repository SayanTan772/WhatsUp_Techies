<?php

include "configure.php";

$outgoing_id = $_SESSION['uniqueID'];
$sql = "SELECT DISTINCT users.*
FROM users
JOIN messages ON messages.incoming_msg_id = users.ID OR messages.outgoing_msg_id = users.ID
WHERE ((messages.incoming_msg_id = $outgoing_id OR messages.outgoing_msg_id = $outgoing_id)
       AND users.ID != $outgoing_id)
       OR (messages.incoming_msg_id = $outgoing_id AND messages.outgoing_msg_id = $outgoing_id)
ORDER BY (
    CASE
        WHEN users.ID = $outgoing_id THEN (
            SELECT MAX(msg_id)
            FROM messages
            WHERE (incoming_msg_id = $outgoing_id AND outgoing_msg_id = users.ID)
               OR (outgoing_msg_id = $outgoing_id AND incoming_msg_id = users.ID)
        )
        ELSE (
            SELECT MAX(msg_id)
            FROM messages
            WHERE (incoming_msg_id = users.ID AND outgoing_msg_id = $outgoing_id)
               OR (outgoing_msg_id = users.ID AND incoming_msg_id = $outgoing_id)
        )
    END
) DESC
";
$query = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($query) == 0){
    $output .= '<div class="no-chat">
                No recent chats 
               </div>';
}elseif(mysqli_num_rows($query) > 0){
    while ($row = mysqli_fetch_assoc($query)) {
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['ID']} OR outgoing_msg_id = {$row['ID']}) AND ((outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$row['ID']}) OR (outgoing_msg_id = {$row['ID']} AND incoming_msg_id = {$outgoing_id})) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        $result = "";
    
        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['msg'];
        }
    
        (strlen($result) > 36) ? $msg =  substr($result, 0, 36) . '...' : $msg = $result;
    
        if (isset($row2['outgoing_msg_id'])) {
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        } else {
            $you = "";
        }
    
        if ($row['ID'] == $outgoing_id) {
            $output .= '<a href="chats.php?user_id='.$row["ID"].'"><div class="show-chat">
            <div class="user-pf"><img src="'.$row["Photo"].'"></div>
            <div class="details">'.$row["Username"].' (You)<br><span>'. $you . $msg .'</span></div>
            </div></a>';
        } else {
            $output .= '<a href="chats.php?user_id='.$row["ID"].'"><div class="show-chat">
            <div class="user-pf"><img src="'.$row["Photo"].'"></div>
            <div class="details">'.$row["Username"].' <br><span>'. $you . $msg .'</span></div>
            </div></a>';
        }
    }
    
}
echo $output;

?>
