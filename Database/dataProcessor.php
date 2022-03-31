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
        function selectData($table, $whereCondition) {
            foreach($whereCondition as $key => $value) {
                $condition = $key . " = '" . $value . "' AND";
            }
            $condition = substr($condition, 0, -5);
            $query = "SELECT * FROM ".$table." WHERE " . $condition;
            $result = mysqli_query($this->_connection, $query);
            if(!$result){
                return NULL;
            }
            while($row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }
            mysqli_free_result($result);
            return $array;
        }

        // Select a table
        function selectTable($table) {
            $query = "SELECT * FROM ".$table."";
            $result = mysqli_query($this->_connection, $query);
            if(!$result){
                return NULL;
            }
            while($row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }
            mysqli_free_result($result);
            return $array;
        }


        // Insert data
        function insert($table, $data) {
            $query = "INSERT INTO ".$table." (";
            $query .= implode(",", array_keys($data)) .') VALUES (';
            $query .= implode("','", array_values($data)) ."')";
            return $query;
        }

        // Update data
        function update($table, $data=[], $condition) {
            return "UPDATE $table SET $data WHERE id = $condition" ;
        }

        // Delete data
        function delete($table, $condition) {
            return "DELETE FROM $table WHERE id = $condition ";
        }

        // function getCategory($idPhoto) {
        //     $photo = $this->getData(selectData($idPhoto));
        // }

        function renderData() {
            $row = $this->selectTable("products");
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

        function addComment($idPhoto) {
            // $data = new database();
            $this->setQuery($this->insert("comment", $comment->castToArray()));
            $this->query();
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