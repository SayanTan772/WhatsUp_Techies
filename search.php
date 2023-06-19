<?php

include_once "configure.php";

$outgoing_id = $_SESSION['uniqueID'];
if(isset($_POST['searchTerm'])){
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM users WHERE (Username LIKE '%{$searchTerm}%')";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row=mysqli_fetch_assoc($query)){
            $output .= '<a href="chats.php?user_id='.$row["ID"].'"><div class="user-tab">
                        <img class="user-pf" src="'.$row["Photo"].'">
                        <div class="details">'.$row["Username"].'<br>
                        <span class="status">'.$row["sts"].'</span></div>
                        </div></a>';
        }
    }else{
        $output .= '<div class="default">
                    No user exists with this username
                    </div>';
    }
    echo $output;
}

?>