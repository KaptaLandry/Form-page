<?php
include_once '../Classes/db.class.php';
include_once '../Classes/login.class.php';
include_once '../Classes/login_control.class.php';
// include_once 'autoload.inc.php';

if (isset($_POST["submit"])) {

    $Uname = $_POST["name"];
  
    $Pass = $_POST["pass"];

    $login = new LoginControl($Uname, $Pass);
    $login->UserLogin();

 
    // Going back to Front Page
    header("location: ../index.php?error=none");
}
