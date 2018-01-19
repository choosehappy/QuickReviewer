<?php

require_once("MySQLAdapter.php");

class Connection {

    private $cn;
    private $db_host;
    public $db_schema;
    private $db_user;
    private $db_pwd;
    

    function __construct() {
        global $database;
        
        
        
        $this->cn = $database-> mysql_connect( $this->db_host, $this->db_user, $this->db_pwd );     
        if (!$this->cn) {
            die('Error en la conexi&oacute;n: ' . mysql_error());
        }
        $bd = mysql_select_db($this->db_schema, $this->cn);
		if (!$bd) {
            die('Error en la conexi&oacute;: ' . mysql_error());
        }
        mysql_query("SET NAMES `utf8`");
    }
    function desconectar() {
        mysql_close($this->cn);
    }
}
?>