<?php

include_once('Adapter.php');

class Image {

    function __construct() {
        
    }

    public function getLastImageUser($usrId) {
        global $database;
        $res = $database->query("SELECT max(id_img) FROM img_usr WHERE id_user=$usrId;");
        if ($database->getNumRows($res) == 0) {
            return 0;
        } else {
            return $database->fetchArray($res)[0];
        }
    }

    public function getImageList($usrId) {
        global $database;
        return $database->query("SELECT id,name,img_usr.val FROM images "
                        . "LEFT JOIN img_usr ON id_img=id and id_user=$usrId;");
    }
    
    public function getImages(){
        global $database;
        return $database->query("SELECT id,name,val FROM images;");
    }


    public function getResultList(){
        global $database;
        return $database->query("SELECT images.id,images.name AS img_name,"
                . "images.val AS outcome,id_user,users.name AS user_name,"
                . "img_usr.val AS infiltration "
                . "FROM images "
                . "LEFT JOIN img_usr ON id_img=id "
                . "INNER JOIN users ON id_user=users.id;");
    }
    
    public function getResPerImage($imgId){
        global $database;
        return $database->query("SELECT val FROM img_usr WHERE id_img=$imgId;");
    }

    public function getNumImages() {
        global $database;
        $res = $database->query("SELECT count(*) FROM images;");
        return $database->fetchArray($res)[0];
    }

    public function getImageName($id) {
        global $database;
        $res = $database->query("SELECT name FROM images WHERE id=$id;");
        return $database->fetchArray($res)[0];
    }

    public function registerValue($usrId, $imgId, $val) {
        global $database;
        $res = $database->query("SELECT id_img FROM img_usr WHERE id_user=$usrId AND id_img=$imgId;");
        if ($database->getNumRows($res) == 0) {
            return $database->query("INSERT INTO img_usr VALUES($usrId,$imgId,$val)");
        } else {
            return $database->query("UPDATE img_usr SET val=$val "
                            . "WHERE id_user=$usrId AND id_img=$imgId;");
        }
    }

}
