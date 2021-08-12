<?php


namespace model;
require_once 'PdoModel.php';

class HealthWorkerModel extends PdoModel
{

    function HealthWorkerList()
    {
        return $this->toList($this->dbh->query('select * from health_worker'));
    }

    public function insertHealthWorker($healthWorker)
    {
        $eid = $healthWorker['EID'];
        $personId = $healthWorker['PersonId'];
        $sql = "insert into health_worker values (?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1,$eid);
        $prepare->bindParam(2,$personId);
        return $prepare->execute();
    }

    public function updateHealthWorker($healthWorker){
        $eid = $healthWorker['EID'];
        $personId = $healthWorker['PersonId'];
        $sql = "update health_worker set PersonId=? where EID=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(2,$eid);
        $prepare->bindParam(1,$personId);
        return $prepare->execute();
    }

    public function deleteHealthWorker($EID){
        $sql = "delete from health_worker where EID = $EID";
        $prepare = $this->dbh->prepare($sql);
        return $prepare->execute();
    }

}
