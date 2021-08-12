<?php

namespace model;

use mysqli_result;

class Model
{
    protected $conn;
    private $user;
    private $pass;
    private $host;
    private $dbName;
    private $port;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->init();
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName, $this->port);
    }

    private function init()
    {
        $this->user = 'zjc353_1';
        $this->pass = 'DTFSK354';
        $this->host = 'zjc353.encs.concordia.ca';
        $this->dbName = 'zjc353_1';
        $this->port = 3306;
    }

    protected function toList(mysqli_result $mysqlResult)
    {
        $result = array();

        while ($houses = $mysqlResult->fetch_assoc()) {
            $result[] = $houses;
        }

        return $result;
    }

    protected function getOne(mysqli_result $mysqlResult)
    {
        if ($mysqlResult->num_rows > 0) {
            return $mysqlResult->fetch_assoc();
        } else {
            return null;
        }
    }

}
