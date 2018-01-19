<?php

require_once("Constants.php");

class MySQLAdapter {

    private $connection;
    public $lastQuery;

    function __construct() {
        $this->openConnection();
    }

    public function openConnection() {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_SCHEMA);
        mysqli_query($this->connection,"SET NAMES 'utf8'");
        mysqli_query($this->connection,"SET CHARACTER SET utf8");
        mysqli_query($this->connection,"SET COLLATION_CONNECTION = 'utf8_unicode_ci'");

        if (mysqli_connect_errno()) {
            printf("Falló la conexión:Database connection failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function closeConnection() {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    public function query($sql) {
        $this->lastQuery = $sql;
        $result = mysqli_query($this->connection,$sql);
        $this->confirmQuery($result);
        return $result;
    }

    public function fetchArray($resultSet) {
        return mysqli_fetch_array($resultSet);
    }

    public function getNumRows($resultSet) {
        return mysqli_num_rows($resultSet);
    }

    public function insertId() {
        return mysqli_insert_id($this->connection);
    }

    public function affectedRows() {
        return mysqli_affected_rows($this->connection);
    }

    private function confirmQuery($result) {
        if (!$result) {
            $output = "Database query failed: " . mysqli_error($this->connection) . "<br /> <br />";
            die($output);
        }
    }

}

$database = new MySQLAdapter();
?>