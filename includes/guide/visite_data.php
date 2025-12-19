<?php
require_once __DIR__ . "/../db.php";


if(isset($_POST["gettours"])){
    echo getTours();
}

function getTours(){
    global $conn;
    $query = "SELECT * FROM tours";
    $run = mysqli_query($conn,$query);
    $result = mysqli_fetch_all($run,MYSQLI_ASSOC);
    return json_encode($result);
}

function getTourInfo($tour_id){
    global $conn;
    $query = "SELECT * FROM tours WHERE id = ?";
    $stmt = mysqli_prepare($conn,$query);

    if($stmt == false){
        die("problem");
    }

    mysqli_stmt_bind_param($stmt,"i",$tour_id);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}


function getGuideName($user_id){
    global $conn;
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn,$query);

    if($stmt == false){
        die("problem");
    }

    mysqli_stmt_bind_param($stmt,"i",$user_id);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}