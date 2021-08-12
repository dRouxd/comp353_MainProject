<?php


namespace model;
require_once 'PdoModel.php';

class AgeGroupModel extends PdoModel
{
    public function ageGroupList()
    {
        return $this->toList($this->dbh->query("select  * from age_group"));
    }

    public function insertAgeGroup($ageGroup)
    {
        $ageGroupNumber = $ageGroup['ageGroupNumber'];
        $lowerBound = $ageGroup['lowerBound'];
        $upperBound = $ageGroup['upperBound'];
        $sql = "insert into age_group values (?,?,?)";
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
        $sql = "update age_group set upperBound=? ,lowerBound=? where ageGroupNumber=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $upperBound);
        $prepare->bindParam(2, $lowerBound);
        $prepare->bindParam(3, $ageGroupNumber);
        return $prepare->execute();
    }

    public function deleteAgeGroup($ageGroupNumber)
    {
        $sql = "delete from age_group where ageGroupNumber = ?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $ageGroupNumber);
        return $prepare->execute();
    }
}
