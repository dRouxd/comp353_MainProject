<?php


namespace model;
require_once 'PdoModel.php';

class HealthWorkerModel extends PdoModel
{

    function HealthWorkerList()
    {
        return $this->toList($this->dbh->query('select * from Health_Worker'));
    }

    public function insertHealthWorker($healthWorker)
    {
        $eid = $healthWorker['EID'];
        $personId = $healthWorker['PersonId'];
        $sql = "insert into Health_Worker values (?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1,$eid);
        $prepare->bindParam(2,$personId);
        return $prepare->execute();
    }

    public function updateHealthWorker($healthWorker){
        $eid = $healthWorker['EID'];
        $personId = $healthWorker['PersonId'];
        $sql = "update Health_Worker set PersonId=? where EID=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(2,$eid);
        $prepare->bindParam(1,$personId);
        return $prepare->execute();
    }

    public function deleteHealthWorker($EID){
        $sql = "delete from Health_Worker where EID = $EID";
        $prepare = $this->dbh->prepare($sql);
        return $prepare->execute();
    }

}
