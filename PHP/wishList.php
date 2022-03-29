<?php

    class wishList {
        private string $idPhoto;
        private string $idAccount;

        public function __construct($idPhoto, $idAccount) {
            $this->idAccount = $idAccount;
            $this->idPhoto = $idPhoto;
        }

        public function getIdPhoto() {
            return $this->idPhoto;
        }

        public function getIdAccount() {
            return $this->idAccount;
        }
    }

?>