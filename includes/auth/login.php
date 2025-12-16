<?php

require_once("../db.php");
$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn,$query);

     if($stmt === false){
        die("Error prepare statement".mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt); 

    $result = mysqli_stmt_get_result($stmt);
    if($user=  mysqli_fetch_assoc($result)){
        if(password_verify($password,$user["password"])){
            $message = "Login Succ";    
        }
        else{
            $message = "password problem";
        }
    }
    else{
        $message = "account not found";
    }

                header("location: ../../login.php?message=".$message);
exit();
}