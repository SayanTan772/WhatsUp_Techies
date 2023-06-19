<?php 
include('configure.php');

if(empty($_SESSION["uniqueID"])){
    header("Location: signin.php");
}
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
        <p class="text">Search from users to start chating</p>
        <div class="search">
            <input type="text" name="uname" class="uname" spellcheck="false" autocomplete="off" placeholder="Enter username . . . .">
            <button class="search-btn"><i class="fas fa-search"></i></button>
        </div>
        <div class="user-list">
        
        </div>
    </div>

    <div class="middle-div" id="middle-div">
        <?php include "display-chat.php"?>
    </div>

    <div class="right-div">
        <div class="top-text">Messages</div>
        <div class="btns">
            <div class="recent-chats">Recent Chats</div>
        </div>
        <div class="show">
            <input type="text" name="chat-search" class="chat-search" spellcheck="false" autocomplete="off" placeholder="search from recent chats . . . .">
            <div class="recent">
            
            </div>
        </div>
    </div> 
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
    <script src="recent-chats.js"></script>
    <script src="update-status.js"></script>
</body>
</html>