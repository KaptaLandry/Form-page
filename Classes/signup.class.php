<?php

// include 'db.class.php';
require_once 'db.class.php';

class Signup extends Db
{
    protected function SetUser($Uname, $Email, $Tel, $Pass)
    {
        
        $stmt = $this->connect()->prepare('INSERT INTO Panel(Username, Email, PhoneNumber, Password) VALUES(?,?,?,?);');
        $hashPwd = password_hash($Pass, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($Uname, $Email, $Tel, $hashPwd))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }

       $stmt = null;
    }


    protected function CheckUser($Uname, $Email)
    {
        
        $stmt = $this->connect()->prepare('SELECT Username FROM Panel WHERE Username = ? OR Email = ?;');
        if (!$stmt->execute(array($Uname, $Email))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
             $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;
    }

    
}
