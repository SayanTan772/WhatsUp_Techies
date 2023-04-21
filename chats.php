<?php 
include('configure.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./Media/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="chats.css">
    <link rel="stylesheet" href="friend-req.css">
    <title>Chats</title>
</head>
<body>
    <div class="left-div">
        <div class="display">
            <div class="left">
                <img class="image" src="<?=$_SESSION['pf']?>">
                <div class="username"><?=$_SESSION['username']?></div>
                <div class="status">Active</div><div class="active"></div>
            </div>
            <div class="right">
            <span class="settings-btn" id="settings-btn"><i class="fa-solid fa-gear"></i></span>
            <div class="dropdown" id="dropdown"> <!--dropdown menu!-->
            <div class="option" onclick="home()">Home</div>
            <div class="option" onclick="profile()">Profile</div>
            <div class="option" onclick="update()">Edit Profile</div>
            <div class="option" onclick="logout()">Logout</div>
            </div>
            </div>
        </div>
        <p class="text">Search from users to Send a Friend Request</p>
        <div class="search">
            <input type="text" name="uname" class="uname" spellcheck="false" autocomplete="off" placeholder="Enter username . . . .">
            <button class="search-btn"><i class="fas fa-search"></i></button>
        </div>
        <div class="user-list">
        
        </div>
    </div>

    <div class="middle-div">
    <?php
        $output="";
        if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE ID = $user_id");
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                // check if the users are friends
                $query = "SELECT * FROM friend_reqs WHERE ((sender_id='".$_SESSION["uniqueID"]."' AND receiver_id='".$user_id."') OR (sender_id='".$user_id."' AND receiver_id='".$_SESSION["uniqueID"]."')) AND sts='accepted'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0) {
                    $output .= '<div class="top-nav">
                                <img src="'.$row["Photo"].'">
                                <div class="details">'.$row["Username"].'<br><span>Active now</span><div class="active"></div></div>
                                </div>
                                <div class="chat-area">
                                </div>
                                <form action="#" class="mssg-box">
                                <input type="text" class="incoming_id" name="incoming_id" value="'.$user_id.'" hidden>
                                <input type="text" name="message" id="message" class="message" placeholder="Type your message . . . ." spellcheck="false" autocomplete="off">
                                <button class="send"><i class="fab fa-telegram-plane fa-4x"></i></button>
                                </form>';
                    echo $output;
                } else {
                    $output .= '<div class="top-nav">
                                <img src="'.$row["Photo"].'">
                                <div class="details">'.$row["Username"].'<br><span>Active now</span><div class="active"></div></div>
                                </div>
                                <div class="chat-area">
                                </div>
                                <div class="mssg-box">
                                <p class="stop-user"><span><i class="fa-solid fa-lock"></i></span>You cannot send message as this user is not in your friend list</p>
                                </div>';
                    echo $output;
                }
            }
        } else {
            $output .= '<div class="default-chat">
                        
                        </div>';
            echo $output;
        }
    ?>
    </div>

    <div class="right-div">
        <div class="top-text">Messages</div>
        <div class="btns">
            <div class="recent-chats">Recent Chats</div>
            <div class="frnd-reqs">Friend Requests</div>
        </div>
        <div class="show">
            <div class="req-list">
            
            </div>
        </div>
    </div> 
    <?php include "friend-req.php"; ?>
    <script>
        function home(){
            window.location.href="landing.php";
        }
        function profile(){
            window.location.href="profile.php";
        }
        function update(){
            window.location.href="update-profile.php";
        }
        function logout(){
            window.location.href="logout.php";
        }
    </script>
    <script src="settings.js"></script>
    <script src="users.js"></script>
    <script src="chats.js"></script>
    <script src="req-show.js"></script>
</body>
</html>