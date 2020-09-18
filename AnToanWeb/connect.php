<?php 
    class Connect{
        public $connect;
        public function __construct() {
            $host = "localhost";
            $database = "atw";
            $user = "root";
            $pass = "";
            $this->conn = new mysqli($host, $user, $pass, $database);
            mysqli_set_charset($this->conn, "utf8");
        }
        public function getComments()
        {
            $sql = "select * from comment";
            $rs = $this->conn->query($sql);
            return $rs;
        }
    }
?>