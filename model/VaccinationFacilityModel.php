<?php


namespace model;
require_once 'model/PdoModel.php';

class VaccinationFacilityModel extends PdoModel
{

    public function vaccinationFacilityList()
    {
        return $this->toList($this->dbh->query("select * from Vaccination_Facility"));
    }

    public function insertVaccinationFacility($vaccinationFacility)
    {
        $facilityID = $vaccinationFacility['facilityID'];
        $name = $vaccinationFacility['name'];
        $phone = $vaccinationFacility['phone'];
        $address = $vaccinationFacility['address'];
        $province = $vaccinationFacility['province'];
        $website_url = $vaccinationFacility['website_url'];
        $type = $vaccinationFacility['type'];
        $sql = "insert into Vaccination_Facility values (?,?,?,?,?,?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $facilityID);
        $prepare->bindParam(2, $name);
        $prepare->bindParam(3, $phone);
        $prepare->bindParam(4, $address);
        $prepare->bindParam(5, $province);
        $prepare->bindParam(6, $website_url);
        $prepare->bindParam(7, $type);
        return $prepare->execute();
    }

    public function updateVaccinationFacility($vaccinationFacility){
        $facilityID = $vaccinationFacility['facilityID'];
        $name = $vaccinationFacility['name'];
        $phone = $vaccinationFacility['phone'];
        $address = $vaccinationFacility['address'];
        $province = $vaccinationFacility['province'];
        $website_url = $vaccinationFacility['website_url'];
        $type = $vaccinationFacility['type'];
        $sql = "update Vaccination_Facility set name = ?,phone=?,address=?,province=?,website_url=?,type=? where facilityID=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(7, $facilityID);
        $prepare->bindParam(1, $name);
        $prepare->bindParam(2, $phone);
        $prepare->bindParam(3, $address);
        $prepare->bindParam(4, $province);
        $prepare->bindParam(5, $website_url);
        $prepare->bindParam(6, $type);
        return $prepare->execute();
    }

    public function deleteVaccinationFacility($facilityID){
        $sql = "delete from Vaccination_Facility where facilityID=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $facilityID);
        return $prepare->execute();
    }

}
