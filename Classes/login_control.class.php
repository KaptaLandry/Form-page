<?php
require_once 'login.class.php';
// include 'login.class.php';
class LoginControl extends Login
{

    private $Uname;
    private $Pass;


    public function __construct($Uname, $Pass)
    {
        $this->Uname = $Uname;
        $this->Pass = $Pass;
    }


    public function UserLogin()
    {
        if ($this->emptyInput() == false) {
            header("location: ../login.php?error=emptyInput");
            exit();
        }


        $this->getUser($this->Uname, $this->Pass);
    }

    private function emptyInput()
    {
        if (empty($this->Uname) || empty($this->Pass)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
