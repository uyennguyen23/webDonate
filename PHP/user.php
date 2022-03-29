<?php

    class user{
        private string $idUser;
        private string $name;
        private string $phone;
        private string $email;
        private string $address;
    }

    function __construct($name, $phone, $email, $address){
        $this->idUser = date("m-d-h-i-s-a");
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
    }


    public function getIdUser(){
        return $this->idUser;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

?>