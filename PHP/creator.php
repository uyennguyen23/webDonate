<?php

    class creator {
        public static function createComment($idPhoto) {
            $comment = $_POST['newComment'];
            $idUser = "111";
            return new comment($idUser, $idPhoto, $comment);
        }

    }

?>