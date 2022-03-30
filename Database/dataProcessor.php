<?php

    include("connect.php");

    error_reporting(1);
    
    class dataProcessor extends database {
        
        function getData($sql) {
            $data = new database();
            $data->setQuery($sql);
            $result = $data->loadAllRow();
            // $data->disconnect();
            return $result;
        }

        // Select data
        function selectData($table, $condition) {
            return "SELECT * FROM $table WHERE id = $condition";
        }

        // Select a table
        function selectTable($table) {
            return "SELECT * FROM $table";
        }


        // Insert data
        // function insert($table, $data=[]) {
        //     return "INSERT INTO $table values ($data)" 
        // }

        // Update data
        function update($table, $data=[], $condition) {
            return "UPDATE $table SET $data WHERE id = $condition" ;
        }

        // Delete data
        function delete($table, $condition) {
            return "DELETE FROM $table WHERE id = $condition ";
        }

        function getCategory($idPhoto) {
            $photo = $this->getData(selectData($idPhoto));
            
        }

        function renderData() {
            $row = $this->getData($this->selectTable(products));
            if ($row <> 0) {
                foreach ($row as $product) {
                    if ($product['image'] == null || $product['image'] == "") $product["image"] = '';
                    else  $product["image"] = '../' .  $product["image"];
                    echo ' 
                        <div class="c--product--item">
                            <div class="c--img--product--detail">

                                <img id="image-detail" src="'. $product['image'] . '" alt="" name="img--product--detail">

                            </div>
                            <div class="c--content--product--detail">
                                <h3 class="c--name--photo--detail">'.$product['name'].'</h3>
                                <hr id="c--hr">
                                <p class="c--margin--p-detail">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>Add
                                    to Wishlist
                                </p>
                                <hr>
                                <label for="" class="c--margin--p-detail">category:
                                </label>
                                <p class="c--margin--p-detail" name="catelary"></p>
                                <p class="c--margin--p-detail --c--content-detail-"
                                    name="description">
                                    In Hue, two days before the new year means busy
                                    markets and lots of colors. Tet Holiday has been
                                    quiet the past few years because of Covid-19
                                    concerns, but the markets, when they are allowed to
                                    open, are always packed.

                                </p>
                            </div>
                        </div>
                                    
                        ';
                }
            } else {
                echo "Nothing to show";
            }
        }

        function getUser($idUser) {
            return $this->getData(selectData(user,$idUser));
        }

        function getComment($idPhoto) {
            // selectData(comment, $idPhoto) . " GROUP BY idPhoto"
            return $this->getData("SELECT * FROM comment WHERE idPhoto = $idPhoto GROUP BY idPhoto");
        }

        function renderComment() {
            $listComment = $this->getComment(1);
            if($listComment <> 0) {
                foreach ($listComment as $comment){
                    echo'
                        <div class="--c--comment--content">
                            <p class="--c--content--user">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <p class="--c--content--user" name="nameuser">'. $this->getUser($comment["idUser"])["name"] .'</p>
                                <p class="--c--conten--date" name="date">12/02/2021</p>
                                <br>
                                <br>
                                <p class="--c--content--detail" name="content-user">'. $comment["content"] .'</p>
                            </p>
    
                            <br>
                            <hr>
                        </div>
                    ';
                }
            } else {
                echo "Nothing to show";
            }
            
            
        }
        
        
    }

    $test = new dataProcessor;

    $test->renderData();
    $test->renderComment();

?>