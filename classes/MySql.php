<?php
namespace classes;
class MySql{
    private $servername="localhost",$username="root",
    $password="",$dbname="onlineshop";
    protected $conn;
    public function __construct()
    {
        $this->conn=new \mysqli($this->servername,$this->username,$this->password,$this->dbname);
        

        if($this->conn->connect_error)
        {
            die("connection failed: ". $this->conn->connect_error);
        }
        else
        {
            echo "connected successfully";
        }
    }
}