<?php 
    include_once "configure.php";
    if(isset($_SESSION['uniqueID'])){
        
        $outgoing_id = $_SESSION['uniqueID'];
        $incoming_id = $_GET['incoming_id'];
        $output = "";
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
            $sql1="SELECT * FROM friend_reqs WHERE sender_id=$incoming_id AND receiver_id={$_SESSION["uniqueID"]}";
            $query=mysqli_query($conn, "SELECT * FROM users WHERE ID=$incoming_id");
            $row1=mysqli_fetch_assoc($query);
            if(mysqli_num_rows(mysqli_query($conn, $sql1))==0){
                $check_query = "SELECT * FROM friend_reqs WHERE sender_id = {$_SESSION['uniqueID']} AND receiver_id = $incoming_id";
                $res=mysqli_query($conn, $check_query);
                if(mysqli_num_rows($res) == 0){
                    $output .= '<div class="friend-req">
                                <img src="./Media/kyle.svg">
                                <div class="request">
                                <form action="chats.php?user_id='.$incoming_id.'" method="POST">
                                <input type="hidden" name="sender_id" value="'.$_SESSION["uniqueID"].'">
                                <input type="hidden" name="receiver_id" value="'.$incoming_id.'">
                                <input type="hidden" name="action" value="send_request">
                                Hey '.$_SESSION["username"].'👋🏻 Would you like to send a Friend Request to '.$row1["Username"].' ?
                                <br>
                                <button type="submit" class="send-req">Send</button>
                                </form>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="friend-req">
                                <img src="./Media/kyle.svg">
                                <div class="request">
                                Friend Request send successfully! 🫡
                                </div>
                                </div>';
                }

            }elseif(mysqli_num_rows(mysqli_query($conn, $sql1))>0){
                $output .= '<div class="friend-req">
                            <img src="./Media/kyle.svg">
                            <div class="request">
                            <form action="chats.php?user_id='.$incoming_id.'" method="POST">
                            <input type="hidden" name="sender_id" value="'.$incoming_id.'">
                            <input type="hidden" name="receiver_id" value="'.$_SESSION["uniqueID"].'">
                            <input type="hidden" name="action" value="accept_request">
                            Accept or Reject '.$row1["Username"].'\'s Friend Request ?
                            <br><button name="accept" class="accept"><i class="fa-solid fa-check fa-2x"></i></button><button name="reject" class="reject"><i class="fa-solid fa-xmark fa-2x"></i></button>
                            </form>
                            </div>
                            </div>';
            }
        }
        echo $output;
    }
?>