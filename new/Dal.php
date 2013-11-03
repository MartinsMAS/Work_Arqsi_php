<?php

class Dal {

    private $servername = 'localhost';
    private $dbname = 'i111417';
    private $username = 'i111417';
    private $pass = '218300';
    private $conn;

    function db_connect() {

        if (!$this->conn) {
            $this->conn = mysql_connect($this->servername, $this->username, $this->pass);
            if (!$this->conn) {
                return false;
            } else {
                return true;
            }
        }
    }

    function db_selectDbName() {
        if (!mysql_select_db($this->dbname, $this->conn)) {
            return false;
        } else {
            return true;
        }
    }

    function db_close() {
        mysql_close();
    }

    function getBookByTitle($title) {
        $sql = "SELECT * FROM livro WHERE title=\"$title\"";
        return $recordset = mysql_query($sql, $this->conn);
    }

    function getBookByCategory($category) {
        $sql = "SELECT * FROM livro WHERE category=\"$category\"";
        return $recordset = mysql_query($sql, $this->conn);
    }
    
    function getAllCategory(){
        $sql = "SELECT DISTINCT category FROM livro";
        return $recordset = mysql_query($sql, $this->conn);
    }

}

?>
