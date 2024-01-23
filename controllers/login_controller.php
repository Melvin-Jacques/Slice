<?php

class User{
    public function __construct(private string $_name, private $_email, private $_password){
    }
    public function setName($name){$this->_name = $name;}
    public function setEmail($email){$this->_email = $email;}
    public function setPassword($password){$this->_password = $password;}

    public function getName(){return $this->_name;}
    public function getEmail(){return $this->_email;}
    public function getPassword(){return $this->_password;}
}