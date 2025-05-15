<?php


require 'config.php';
class dbconnect
{
    public $con;
    private $servername = host_name;
    private $username = db_user;
    private $password = db_password;
    private $dbname = db_name;
    function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
        mysqli_set_charset($this->con, "utf8mb4");
    }
    function get_conn()
    {
        return $this->con;
    }
    // Lay ra limit ban ghi bat dau tu start
    public function pagination($query, $limit, $start)
    {
        $sql = "$query LIMIT $start,$limit";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
