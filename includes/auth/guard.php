<?php

session_start();

function require_login()
{
    if (!isset($_SESSION["user_id"])) {
        header("location: ../../login.php");
        exit();
    }
}

function require_role($role_needed)
{
    if (!isset($_SESSION["role"]) || $_SESSION["role"] != $role_needed) {
        header("location: ../../index.php?message=no_access");
        exit();
    }
}
