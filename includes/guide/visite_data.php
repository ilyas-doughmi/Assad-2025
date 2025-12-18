<?php
require_once("../db.php");

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