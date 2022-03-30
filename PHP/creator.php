<?php

    class creator {
        public static function createComment($idPhoto) {
            $comment = $_POST['Newcomment'];
            $idAccount = "111";
            return new comment($idAccount, $idPhoto, $comment)
        }

    }

?>