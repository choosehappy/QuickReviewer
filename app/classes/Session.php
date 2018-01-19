<?php

include_once('Adapter.php');
include_once('Image.php');

class Session {

    function __construct() {
        
    }

    public function start($user) {
        global $database;
        //$user=strtolower($user);
        $database->openConnection();
        $res = $database->query("SELECT id FROM users WHERE name='$user';");
        
        if ($database->getNumRows($res) == 0) {
            $database->query("INSERT INTO users VALUES(null,'$user',now())");
            $res = $database->query("SELECT id FROM users WHERE name='$user';");
        }
        $id = $database->fetchArray($res)[0];        
        session_start();
        $_SESSION["SessionTils"] = session_id();
        $_SESSION["name"] = $user;
        $_SESSION["user_id"] = $id;
        header("location:..");

        $database->closeConnection();        
    }

    public function close() {
        session_start();
        $this->destroy();
        header("location:../login.php");
    }

    public function validateStart() {
        session_start();
        if (isset($_SESSION["SessionTils"])) {
            header("location:index.php");
        }
    }

    public function validate($parent) {
        session_start();
        if (!isset($_SESSION["SessionTils"])) {
            $this->destroy();
            header("location:" . $parent . "login.php");
        }
    }

    private function destroy() {
        unset($_SESSION["SessionTils"]);
        unset($_SESSION["name"]);
        session_destroy();
    }

}
