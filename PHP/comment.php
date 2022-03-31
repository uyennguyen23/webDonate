<?php

    class comment{
        private string $idComment;
        private string $idUser;
        private string $idPhoto;
        private string $content;
        private string $dateTime;

        public function __construct($idUser, $idPhoto, $content) {
            $this->idComment = "";
            $this->idUser = $idUser;
            $this->idPhoto = $idPhoto;
            $this->content = $content;
            $this->dateTime = $dateTime;
        }

        function castToArray() {
            return [
                "idComment" => $this->idComment,
                "idUser" => $this->idUser,
                "idPhoto" => $this->idPhoto,
                "content" => $this->content,
                "dateTime" => $this->dateTime,
            ];
        }

        public function getIdComment() {
            return $this->idComment;
        }

        public function setIdAccount($idAccount) {
            $this->idAccount = $idAccount;
        }

        public function getIdAccount() {
            return $this->idAccount;
        }

        public function setIdPhoto($idPhoto) {
            $this->idPhoto = $idPhoto;
        }

        public function getIdPhoto() {
            return $this->idPhoto;
        }

        public function setContent($content) {
            $this->content = $content;
        }

        public function getContent() {
            return $this->content;
        }

        public function setDateTime($dateTime) {
            $this->dateTime = $dateTime;
        }

        public function getDateTime() {
            return $this->dateTime;
        }
    }

?>