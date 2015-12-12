<?php

/**
 * User Class
 * Acknowledgements to Brian Yelle
 * Author: Steve Krog 
 * Project for Backend Weblab Bootcamp Fall 2015
 */

class User{

    private $_email;
    private $_name;
    private $_password;
    private $_created;
    private $_lastLogin;
    private $_role;

    public function getemail(){return $this->_email;}
    public function setemail($arg){
        if (!filter_var($arg, FILTER_VALIDATE_EMAIL)) {
            echo "Error: Invalid Email Address.";
            $this->_email = '';
            return;
        }
        $this->_email = $arg;
    }
    public function getname(){return $this->_name;}
    public function setname($arg){$this->_name = $arg;}

    public function getpassword(){return $this->_password;}
    public function setpassword($arg){$this->_password = $arg;}

    public function getcreated(){return $this->_created;}
    public function setcreated($arg){$this->_created = $arg;}

    public function getlastLogin(){return $this->_lastLogin;}
    public function setlastLogin($arg){$this->_lastLogin = $arg;}

    public function getrole(){return $this->_role;}
    public function setrole($arg){$this->_role = $arg;}

    public function isAdmin(){
        if ($this->_role == 3) {
          return TRUE;
        }
        return FALSE;
    }

    public function hydrate($arr) {
        $this->setemail(isset($arr["email"])?$arr["email"]:'');
        $this->setname(isset($arr["name"])?$arr["name"]:'');
        $this->setpassword(isset($arr["password"])?$arr["password"]:'');
        $this->setcreated(isset($arr["created"])?$arr["created"]:'');
        $this->setlastLogin(isset($arr["lastLogin"])?$arr["lastLogin"]:'');
        $this->setrole(isset($arr["roleid"])?$arr["roleid"]:'');
    }
}
