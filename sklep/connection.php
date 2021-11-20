<?php
require_once 'config.php';
class Connection{
    private $connection;
    public function __construct(){
        $this->connection = new PDO('mysql:host='.Config::DBHOST.';dbname='.Config::DBNAME, Config::DBUSER, Config::DBPASS);
    }

    public function query($query, $params){
        $query=$this->connection->prepare($query);
        $result= $query->execute($params);
        
        print_r($this->connection->errorInfo());
        return $query;
        
        
    }

    public function getpdo(){
       
        return $this->connection;
        
    }

} 
?>