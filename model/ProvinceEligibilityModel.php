<?php


namespace model;
require_once 'PdoModel.php';


class ProvinceEligibilityModel extends PdoModel
{

    public function provinceEligibilityList()
    {
        return $this->toList($this->dbh->query("select * from Province_Eligibility"));
    }

    public function insertProvinceEligibility($ProvinceEligibility)
    {
        $province = $ProvinceEligibility['province'];
        $ageGroupNumber = $ProvinceEligibility['ageGroupNumber'];
        $sql = "insert into Province_Eligibility values (?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $province);
        $prepare->bindParam(2, $ageGroupNumber);
        return $prepare->execute();
    }

    public function updateProvinceEligibility($ProvinceEligibility)
    {
        $province = $ProvinceEligibility['province'];
        $ageGroupNumber = $ProvinceEligibility['ageGroupNumber'];
        $sql = "update Province_Eligibility set ageGroupNumber = ? where province = ?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(2, $province);
        $prepare->bindParam(1, $ageGroupNumber);
        return $prepare->execute();
    }

    public function deleteProvinceEligibility($province)
    {
        $sql = "delete from Province_Eligibility where province = ?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $province);
        return $prepare->execute();
    }

}
