<?php
// include_once 'autoload.inc.php';
require_once 'db.class.php';
class Login extends Db 
{
    
    protected function getUser($Uname, $Pass)
    {

        $stmt = $this->connect()->prepare('SELECT Password FROM Panel WHERE Username = ? OR Email = ?;');

        if (!$stmt->execute(array($Uname, $Uname))) {
            $stmt = null;
            header("location: ../login.php?error=stmtFailed");
            exit();
        }


        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../login.php?error=UserNotFound");
            exit();
        }

        $pwdHash = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($Pass, $pwdHash[0]["Password"]);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../login.php?error=WrongPassword");
            exit();
        } 

        elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM Panel WHERE (Username = ? OR Email = ?) AND Password = ?;');

            if (!$stmt->execute(array($Uname, $Uname, $pwdHash[0]["Password"]))) {
                $stmt = null;
                header("location: ../login.php?error=stmtFailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../login.php?error=UserNotFound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["Username"] = $user[0]["Username"];
            $stmt = null;
        }
    }
}