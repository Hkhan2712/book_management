<?php
class ConnectDb {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = null;
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if ($this->conn->connect_error) {
            throw new Exception("Connection Database error!");
        }

        if (!$this->conn->set_charset("utf8")) {
            throw new Exception("Error loading character set utf8: %s\n", $mysqli->error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new ConnectDb();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>