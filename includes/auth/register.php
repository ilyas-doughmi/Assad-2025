<?php

require_once("../db.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $role = $_POST["role"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = password_hash($password,PASSWORD_DEFAULT);
    $isVisitor = 1;

    if($role == "guide"){
        $isVisitor = 0;
    }

    $query = "INSERT INTO users(full_name,email,password,role,isActive) VALUES(?,?,?,?,?);";
    $stmt = mysqli_prepare($conn,$query);
    if($stmt === false){
        die("Error prepare statement".mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt,"ssssi",$nom,$email,$password,$role,$isVisitor);

    mysqli_stmt_execute($stmt);

    header("location: ../../login.php?message='register success'");
    exit();

}