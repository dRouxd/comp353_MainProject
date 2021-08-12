<?php


namespace model;


use PDO;
use PDOStatement;

class PdoModel
{
    private $dbms;
    private $host;    
    private $dbName;  
    private $user;    
    private $pass;    
    private $port;
    private $dsn;
    public $dbh;

    /**
     * PdoModel constructor.
     */
    public function __construct()
    {
        $this->init();
        $this->dbh = new PDO($this->dsn,$this->user,$this->pass);
    }


    private function init()
    {
        $this->dbms = 'mysql';
        $this->host = 'localhost';
        $this->dbName = 'a13912';
        $this->user = 'root';
        $this->pass = '';
        $this->port = 3306;
        $this->dsn = "$this->dbms:host=$this->host;dbname=$this->dbName";
    }

    protected function toList(PDOStatement $mysqlResult)
    {
        $mysqlResult->execute();
        return $mysqlResult->fetchAll();
    }

    protected function getOne(PDOStatement $mysqlResult)
    {
        $mysqlResult->execute();
        $result = $mysqlResult->fetchAll();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

}
