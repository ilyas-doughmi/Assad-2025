<?php 
require_once("../db.php");


if(isset($_POST["users_count"])){
    getUsersCount();
}

if(isset($_POST["users"])){
    getUsers();
}

if(isset($_POST["users_not_active"])){
    getNotActiveUsers();
}


function getUsersCount(){
    global $conn;
    $query= "SELECT COUNT(*) as count FROM users";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    echo $row["count"];
}
function getNotActiveUsers(){
    global $conn;
    $query= "SELECT COUNT(*) as count FROM users WHERE isActive = 0 AND role = 'guide'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    echo $row["count"];
}

function getUsers(){
    global $conn;
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo json_encode($row);
}