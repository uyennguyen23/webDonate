<?php

    class like{
        private string $idLike;
        private string $idPhoto;
        private string $idUser;

        public function __construct($idUser, $idPhoto) {
            $this->idLike = "";
            $this->idUser = $idUser;
            $this->idPhoto = $idPhoto;
        }

        function castToArray() {
            return [
                "idLike" => $this->idLike,
                "idUser" => $this->idUser,
                "idPhoto" => $this->idPhoto
            ]
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