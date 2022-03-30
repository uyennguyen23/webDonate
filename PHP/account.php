<?php

    class account{
        private string $idAccount;
        private string $idUser;
        private string $accountName;
        private string $password;

        function __construct($idUser, $accountName, $password){
            $this->$idAccount = '';
            $this->$idUser = $idUser;
            $this->accountName = $accountName;
            $this->password = $password;
        }

        function castToArray() {
            return [
                "idAccount" => $this->idAccount,
                "idUser" => $this->idUser,
                "accountName" => $this->accountName,
                "password" => $this->password,
            ]
        }

        function getIdAccount(){
            return $this->idAccount;
        }

        function setAccountName($accountName) {
            $this->accountName = $accountName;
        }

        function getAccountName() {
            return $this->accountName;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function getPassword() {
            return $this->password;
        }
    }

?>