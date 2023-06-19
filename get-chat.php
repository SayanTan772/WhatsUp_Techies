<?php 
    include_once "configure.php";
    if(isset($_SESSION['uniqueID']) && isset($_POST['incoming_id'])){
        
        $outgoing_id = $_SESSION['uniqueID'];
        $incoming_id = $_POST['incoming_id'];
        $output = "";
        $blocked_msg = ""; // Variable to store blocked message

        $is_blocked_by = mysqli_query($conn, "SELECT * FROM block_reqs WHERE send_id = $outgoing_id AND receive_id = $incoming_id AND block_sts = 'blocked'");
        $is_blocked_to = mysqli_query($conn, "SELECT * FROM block_reqs WHERE send_id = $incoming_id AND receive_id = $outgoing_id AND block_sts = 'blocked'");

        if(mysqli_num_rows($is_blocked_by)>0){
            $blocked_msg = '<div class="blocked-message"><div class="box">You have blocked this user</div></div>';
        }
        if(mysqli_num_rows($is_blocked_to)>0){
            $blocked_msg = '<div class="blocked-message"><div class="box large-box">You have been blocked by this user</div></div>';
        }

        $sql = "SELECT * FROM messages WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){ // message sender
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row["msg"] .'</p>
                                </div>
                                </div>';
                }else{ // message receiver
                    $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>'. $row["msg"] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="default-mssg"><img src="./Media/kyle.svg"><div class="details">
            <p>Opps😕 It looks like this chat is empty !</p>
        </div></div>';
        }
        // Append blocked message to the output
        $output .= $blocked_msg;

        echo $output;
    }
?>
