<?php
    include("connect.php");

    // error_reporting(1);
    
    class dataProcessor extends database {

        // Select data
        public function selectData($table, $whereCondition) {
            foreach($whereCondition as $key => $value) {
                $condition = $key . " = '" . $value . "' AND";
            }
            $condition = substr($condition, 0, -4);
            
            $query = "SELECT * FROM ".$table." WHERE " . $condition;
            echo "$condition";
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
        public function selectTable($table) {
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
        public function insert($table, $data) {
            $query = "INSERT INTO ".$table." (";
            $query .= implode(",", array_keys($data)) .') VALUES (';
            $query .= "'" . implode("','", array_values($data)) ."');";
            echo "$query";
            return $query;
        }

        public function addComment($idPhoto, comment $comment) {
            $sql = $this->insert("comment", $comment->castToArray());
            $this->setQuery($sql);
            $this->query();
        }

        // Update data
        public function update($table, $data=[], $condition) {
            return "UPDATE $table SET $data WHERE id = $condition" ;
        }

        // Delete data
        public function delete($table, $condition) {
            return "DELETE FROM $table WHERE id = $condition ";
        }

        public function selectDataPagination($table, $page, $limit) {
            $start = ($page -1) * $limit;
            $query = "SELECT * FROM ".$table." ORDER BY DESC LIMIT ".$start." ',' ".$limit."";
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

        public function countPage($table, $page, $limit) {
            $query = "SELECT COUNT(id) AS id FROM ".$table."";
            $result = mysqli_query($this->_connection, $query);
            if(!$result){
                return NULL;
            }
            while($row = mysqli_fetch_assoc($result)) {
                $total = $row[0]['id'];
            }
            mysqli_free_result($result);
            $pages = ceil($total / $limit);
            return $pages;
            
        }


        // function renderData() {
        //     $row = $this->selectTable("products");
        //     if ($row <> 0) {
        //         foreach ($row as $product) {
        //             if ($product['image'] == null || $product['image'] == "") $product["image"] = '';
        //             else  $product["image"] = '../' .  $product["image"];
        //             echo ' 
        //                 <div class="c--product--item">
        //                     <div class="c--img--product--detail">

        //                         <img id="image-detail" src="'. $product['image'] . '" alt="" name="img--product--detail">

        //                     </div>
        //                     <div class="c--content--product--detail">
        //                         <h3 class="c--name--photo--detail">'.$product['name'].'</h3>
        //                         <hr id="c--hr">
        //                         <p class="c--margin--p-detail">
        //                             <i class="fa fa-heart-o" aria-hidden="true"></i>Add
        //                             to Wishlist
        //                         </p>
        //                         <hr>
        //                         <label for="" class="c--margin--p-detail">category:
        //                         </label>
        //                         <p class="c--margin--p-detail" name="catelary"></p>
        //                         <p class="c--margin--p-detail --c--content-detail-"
        //                             name="description">
        //                             In Hue, two days before the new year means busy
        //                             markets and lots of colors. Tet Holiday has been
        //                             quiet the past few years because of Covid-19
        //                             concerns, but the markets, when they are allowed to
        //                             open, are always packed.

        //                         </p>
        //                     </div>
        //                 </div>
                                    
        //                 ';
        //         }
        //     } else {
        //         echo "Nothing to show";
        //     }
        // }

        // public function getUser($idUser) {
        //     return $this->getData(selectData(user,$idUser));
        // }

        

        

        public function renderComment($photo) {
            $listComment = $this->selectData("comment", $photo);
            if($listComment <> 0) {
                foreach ($listComment as $comment){
                    echo'   
                        <div class="--c--comment--content">
                            <p class="--c--content--user">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <p class="--c--content--user" name="nameuser">aa</p>
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

    // $test = new dataProcessor;

    // $test->renderData();
    // $test->renderComment();

?>