<?php


namespace model;
require_once 'PdoModel.php';

class InfectionModel extends PdoModel
{

    public function infectionList()
    {
        return $this->toList($this->dbh->query("select * from infection"));
    }

    public function insertInfection($infection)
    {
        $personID = $infection['personID'];
        $infectionNumber = $infection['infectionNumber'];
        $infectionDate = $infection['infectionDate'];
        $type = $infection['type'];
        $sql = "insert into infection values (?,?,?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $personID);
        $prepare->bindParam(2, $infectionNumber);
        $prepare->bindParam(3, $infectionDate);
        $prepare->bindParam(4, $type);
        return $prepare->execute();
    }

    public function updateInfection($infection)
    {
        $personID = $infection['personID'];
        $infectionNumber = $infection['infectionNumber'];
        $infectionDate = $infection['infectionDate'];
        $type = $infection['type'];
        $sql = "update infection set personID=? ,infectionDate=?,type=? where infectionNumber=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $personID);
        $prepare->bindParam(4, $infectionNumber);
        $prepare->bindParam(2, $infectionDate);
        $prepare->bindParam(3, $type);
        return $prepare->execute();
    }

    public function deleteInfection($infectionNumber)
    {
        $sql = "delete from infection where infectionNumber=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $infectionNumber);
        return $prepare->execute();
    }

}
