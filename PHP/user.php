<?php

    class user{
        private string $idUser;
        private string $name;
        private string $address;
        private string $phone;
        private string $email;
        private string $password;
    }

    function __construct($name, $phone, $email, $address, $password){
        $this->idUser = "";
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }

    function castToArray() {
        return [
            "idUser" => $this->idUser,
            "name" => $this->name,
            "address" => $this->address,
            "phone" => $this->phone,
            "email" => $this->email,
            "password" => $this->password
        ]
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

    function setPassword($password) {
        $this->password = $password;
    }

    function getPassword() {
        return $this->password;
    }

?>