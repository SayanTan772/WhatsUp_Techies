<?php

include "configure.php";
    $username=$_POST["username"];
    $email=$_POST["email"];
    $bio=$_POST["bio"];
    $password=$_POST["password"];
    $status="offline";

    $image=$_FILES["file"];

    if(!empty($username) && !empty($email) && !empty($bio) && !empty($password)){

        $res=mysqli_query($conn, "SELECT * FROM users WHERE Email='$email'");
        $rows=mysqli_num_rows($res);
        if($rows>0){
            echo "Account already exists with this Email!";
        }
        else{
            
            $imgfilename=$image['name'];
            $imgfiletemp=$image['tmp_name'];
            $imgfileerror=$image['error'];

            if($imgfileerror==0){
            $filename_separate=explode('.',$imgfilename);
            $file_extension=strtolower(end($filename_separate));

            $extensions=array('jpeg','jpg','png','svg');
            
            if(in_array($file_extension,$extensions)){
                $upload_image='./UserPF/'.$imgfilename;
                move_uploaded_file($imgfiletemp, $upload_image);

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo "Invalid Email!";  
                }else{
                    if(strlen($password)<8){
                        echo "Password should be atleast 8 characters!";
                    }else{
                    $stmt=mysqli_stmt_init($conn);
                    $preparestmt=mysqli_stmt_prepare($stmt, "INSERT INTO users (Username, Email, Bio, Password, Photo, sts) VALUES (?, ?, ?, ?, ?, ?)");
                    if($preparestmt){
                    mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $bio, $password, $upload_image, $status);
                    mysqli_stmt_execute($stmt);
                    echo "success";
                    }
                    }
                }
            }
            else{
                echo "Invalid Image Format!";
            }
            }
            else{
                echo "All fields are required!";
            }
        }
    }
    else{
        echo "All fields are required!";
    }

?>