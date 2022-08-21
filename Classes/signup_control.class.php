<?php
require_once 'signup.class.php';
// include_once 'autoload.inc.php';
class SignupControl extends Signup
{

    private $Uname;
    private $Email;
    private $Tel;
    private $Pass;
    private $PassRep;


    public function __construct($Uname, $Email, $Tel, $Pass, $PassRep)
    {
        $this->Uname = $Uname;
        $this->Email = $Email;
        $this->Tel = $Tel;
        $this->Pass = $Pass;
        $this->PassRep = $PassRep;
    }


    public function UserSignup()
    {
        if ($this->emptyInput() == false) {
            header("location: ../signup.php?error=emptyInput");
            exit();
        }
        if ($this->invalidUname() == false) {
            header("location: ../signup.php?error=Username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../signup.php?error=Email");
            exit();
        }
        if ($this->invalidPhoneNum() == false) {
            header("location: ../signup.php?error=invalidPhoneNum");
            exit();
        }
        if ($this->ConfirmPwd() == false) {
            header("location: ../signup.php?error=Password");
            exit();
        }
        if ($this->UnameCheck() == false) {
            header("location: ../signup.php?error=Username/Email Exit");
            exit();
        }

        $this->setUser($this->Uname, $this->Email, $this->Tel, $this->Pass);
    }

    private function emptyInput()
    {
        if (
            empty($this->Uname) ||  empty($this->Email) || empty($this->Tel) ||  empty($this->Pass) ||  empty($this->PassRep)
        ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUname()
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->Uname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        if (!filter_var($this->Email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidPhoneNum()
    {
        if (!preg_match('/^(\+?237)?(23|6[65789])\d{7}$/', $this->Tel)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;  
    }

    private function ConfirmPwd()
    {
        if ($this->Pass !== $this->PassRep) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function UnameCheck()
    {
        if (!$this->CheckUser($this->Uname, $this->Email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
