<?php

$output = '';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

        $sql = mysqli_query($conn, "SELECT * FROM users WHERE ID = $user_id");

        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            // Display chat area when user is selected

            if($user_id==$_SESSION['uniqueID']){
                $output .= '<div class="top-nav">
                        <img src="'.$row["Photo"].'">
                        <div class="details">'.$row["Username"].' (You)<br><span class="user-status">'.$row["sts"].'</span></div>
                        <div class="block" data-userid="'.$user_id.'" style="display:none;"><i class="fa-solid fa-lock"></i></div>
                        </div>
                        <div class="chat-area"></div>
                        <form action="#" class="mssg-box">
                          <input type="text" class="incoming_id" name="incoming_id" value="'.$user_id.'" hidden>
                          <input type="text" name="message" id="message" class="message" placeholder="Type your message . . ." spellcheck="false" autocomplete="off">
                          <button class="send"><i class="fab fa-telegram-plane fa-4x"></i></button>
                        </form>';               
            }else{
                $output .= '<div class="top-nav">
                        <img src="'.$row["Photo"].'">
                        <div class="details">'.$row["Username"].'<br><span class="user-status">'.$row["sts"].'</span></div>
                        <div class="block" data-userid="'.$user_id.'"><i class="fa-solid fa-lock"></i></div>
                        </div>
                        <div class="chat-area"></div>
                        <form action="#" class="mssg-box">
                          <input type="text" class="incoming_id" name="incoming_id" value="'.$user_id.'" hidden>
                          <input type="text" name="message" id="message" class="message" placeholder="Type your message . . ." spellcheck="false" autocomplete="off">
                          <button class="send"><i class="fab fa-telegram-plane fa-4x"></i></button>
                        </form>';
            }
        }
} else{
    // Display default chat area if user is not selected
    $output .= '<div class="default-chat">
                   <img src="./Media/default-chat.png">
               </div>';
}

echo $output;

?>
<script src="block-user.js"></script>

