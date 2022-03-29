<?php

    class like{
        private string $idLike;
        private string $idPhoto;
        private string $idAccount;

        public function __construct($idAccount, $idPhoto) {
            $this->idLike = "";
            $this->idAccount = $idAccount;
            $this->idPhoto = $idPhoto;
        }

        public function getIdLike() {
            return $this->idLike;
        }

        public function getIdAccount() {
            return $this->idAccount;
        }


        public function getIdPhoto() {
            return $this->idPhoto;
        }
    }

?>