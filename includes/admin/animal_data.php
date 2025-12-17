<?php
require_once("../db.php");





function getAnimals(){
    global $conn;
    $query = "SELECT * FROM animal";
    $run = mysqli_query($conn,$query);
    $result = mysqli_fetch_all($run,MYSQLI_ASSOC);

     json_encode($result);
}

function getCount(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM animal";
    $run = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($run);
     $result["count"];
}