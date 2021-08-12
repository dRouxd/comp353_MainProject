<?php


namespace model;
require_once 'PdoModel.php';

class AgeGroupModel extends PdoModel
{
    public function ageGroupList()
    {
        return $this->toList($this->dbh->query("select  * from Age_Group"));
    }

    public function insertAgeGroup($ageGroup)
    {
        $ageGroupNumber = $ageGroup['ageGroupNumber'];
        $lowerBound = $ageGroup['lowerBound'];
        $upperBound = $ageGroup['upperBound'];
        $sql = "insert into Age_Group values (?,?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $ageGroupNumber);
        $prepare->bindParam(2, $lowerBound);
        $prepare->bindParam(3, $upperBound);
        return $prepare->execute();
    }

    public function updateAgeGroup($ageGroup)
    {
        $ageGroupNumber = $ageGroup['ageGroupNumber'];
        $lowerBound = $ageGroup['lowerBound'];
        $upperBound = $ageGroup['upperBound'];
        $sql = "update Age_Group set upperBound=? ,lowerBound=? where ageGroupNumber=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $upperBound);
        $prepare->bindParam(2, $lowerBound);
        $prepare->bindParam(3, $ageGroupNumber);
        return $prepare->execute();
    }

    public function deleteAgeGroup($ageGroupNumber)
    {
        $sql = "delete from Age_Group where ageGroupNumber = ?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $ageGroupNumber);
        return $prepare->execute();
    }
}
