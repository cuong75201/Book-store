<?php 
require 'config.php';
class dbconnect{
    public $con;
    protected $servername = host_name;
    protected $username = db_user;
    protected $password = db_password;
    protected $dbname = db_name;
    function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
  
}