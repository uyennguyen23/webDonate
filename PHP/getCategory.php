<?php

    include ("../Database/conect.php");
    include ("../Database/dataProcessor.php");

    class getCategory{
        private array $listCategory;

        public function __construct() {
            $this->listCategory = $this->getData($this->selectTable(category));
        }

        public function getListCategory() {
            return $this->listCatgory;
        }
    }

?>