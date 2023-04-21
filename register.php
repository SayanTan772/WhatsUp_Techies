<?php

include "configure.php";
    $username=$_POST["username"];
    $bio=$_POST["bio"];
    $password=$_POST["password"];

    $image=$_FILES["file"];

    if(!empty($username) && !empty($bio) && !empty($password)){

        $res=mysqli_query($conn, "SELECT * FROM users WHERE Username='$username'");
        $rows=mysqli_num_rows($res);
        if($rows>0){
            echo "Username already Exists!";
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

                if(strlen($password)<8){
                    echo "Password should be atleast 8 characters!";
                }else{
                $stmt=mysqli_stmt_init($conn);
                $preparestmt=mysqli_stmt_prepare($stmt, "INSERT INTO users (Username, Bio, Password, Photo) VALUES (?, ?, ?, ?)");
                if($preparestmt){
                mysqli_stmt_bind_param($stmt, "ssss", $username, $bio, $password, $upload_image);
                mysqli_stmt_execute($stmt);
                echo "success";
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