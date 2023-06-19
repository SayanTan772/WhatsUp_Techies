<?php

include("configure.php");
if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm-password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];  
    $confirm_password = $_POST["confirm-password"];

    if(empty($email)){
        echo 'All feilds are required!';
    }else{
        if(!empty($password) && !empty($confirm_password)){
            if(strlen($password)<8){
                echo "New Password should be atleast 8 characters!";
            }else{
                $sql = "SELECT * FROM users WHERE Email='$email'";  
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0){
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
                    if($user["Password"]===$password){
                        echo 'New Password is same as old password!';
                    }else{
                        if($password === $confirm_password){
                            $sql1 = "UPDATE users SET Password='$password' WHERE Email='$email'";
                            mysqli_query($conn, $sql1);
                            echo 'success';
                        }else{
                            echo 'Passwords do not match!';
                        }
                    }
                }
                else{
                    echo "No account exists with this Email!";
                }
            }
        }else{
            echo "New Password cannot be empty!";
        }
    }
}

?>