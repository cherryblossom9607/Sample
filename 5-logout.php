<?php
// (A) Not Logged In
session_start();
if (!isset($_SESSION['token'])) {
    header("location: 3-login.php");
    exit;
}

// (B) Remove and Revoke Token
require "2-google.php";
$goo->setAccessToken($_SESSION["token"]);
$goo->revokeToken();
unset($_SESSION["token"]);
//Remove your own user session variables as well
header("location: 3-login.php");
