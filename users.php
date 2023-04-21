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
            $output .= '<a href="chats.php?user_id='.$row["ID"].'"><div class="user-tab">
                        <img class="user-pf" src="'.$row["Photo"].'">
                        <p class="uname">'.$row["Username"].'</p>
                        </div></a>';
        }
    }
    echo $output;
?>