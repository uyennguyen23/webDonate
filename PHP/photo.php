<?php

    class photo{
        private string $idPhoto;
        private string $idCategory;
        private string $namePhoto;
        private string $description;
        private float $price

        public function __construct($idCategory, $namePhoto, $price, $description){
            $this->idPhoto = "";
            $this->idCategory = $idCategory;
            $this->namePhoto = $namePhoto;
            $this->price = $price;
            $this->description = $description;
        }

        public function getIdphoto() {
            return $this->idPhoto;
        }

        public function setNamePhoto($namePhoto) {
            $this->namePhoto = $namePhoto;
        }

        public function getNamePhoto() {
            return $this->namePhoto;
        }

        public function setPrice($price) {
            $this->price = $price;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getDescription() {
            return $this->description;
        }
    }

?>