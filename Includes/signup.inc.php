<?php
include_once '../Classes/db.class.php';
include_once '../Classes/signup.class.php';
include_once '../Classes/signup_control.class.php';
// include_once 'autoload.inc.php';

if (isset($_POST["submit"])) {

    $Uname = $_POST["name"];
    $Email = $_POST["email"];
    $Tel = $_POST["tel"];
    $Pass = $_POST["pass"];
    $PassRep = $_POST["pass1"];

    $sign = new SignupControl($Uname, $Email, $Tel, $Pass, $PassRep);
    $sign->UserSignup();


    // Going back to Front Page
    header("location: ../login.php?error=none");
}