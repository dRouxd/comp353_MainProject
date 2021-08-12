<?php


namespace model;
require_once 'PdoModel.php';

class VaccineModel extends PdoModel
{

    public function vaccineList()
    {
        return $this->toList($this->dbh->query("select * from vaccine"));
    }


    public function insertVaccine($vaccine)
    {
        $vaccineID = $vaccine['vaccineID'];
        $brand = $vaccine['brand'];
        $currentStatus = $vaccine['currentStatus'];
        $description = $vaccine['description'];
        $sql = "insert into vaccine values (?,?,?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $vaccineID);
        $prepare->bindParam(2, $brand);
        $prepare->bindParam(3, $currentStatus);
        $prepare->bindParam(4, $description);
        return $prepare->execute();
    }

    public function updateVaccine($vaccine)
    {
        $vaccineID = $vaccine['vaccineID'];
        $brand = $vaccine['brand'];
        $currentStatus = $vaccine['currentStatus'];
        $description = $vaccine['description'];
        $sql = "update vaccine set brand = ?,currentStatus=?,description=? where vaccineID=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(4, $vaccineID);
        $prepare->bindParam(1, $brand);
        $prepare->bindParam(2, $currentStatus);
        $prepare->bindParam(3, $description);
        return $prepare->execute();
    }

    public function deleteVaccine($vaccineId)
    {
        $sql = "delete from vaccine where vaccineId = ?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $vaccineId);
        return $prepare->execute();
    }
}
