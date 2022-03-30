<?php

    class comment{
        private string $idComment;
        private string $idAccount;
        private string $idPhoto;
        private string $content;

        public function __construct($idAccount, $idPhoto, $content) {
            $this->idComment = "";
            $this->idAccount = $idAccount;
            $this->idPhoto = $idPhoto;
            $this->content = $content;
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
    }

?>