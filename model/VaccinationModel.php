<?php


namespace model;
require_once 'PdoModel.php';

class VaccinationModel extends PdoModel
{
    public function vaccinationList()
    {
        return $this->toList($this->dbh->query("select * from Vaccination"));
    }

    public function insertVaccination($vaccination)
    {
        $vaccineID = $vaccination['vaccineID'];
        $personID = $vaccination['personID'];
        $facilityID = $vaccination['facilityID'];
        $EID = $vaccination['EID'];
        $doseNumber = $vaccination['doseNumber'];
        $vaccinationDate = $vaccination['vaccinationDate'];
        $sql = "insert into Vaccination values (?,?,?,?,?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $vaccineID);
        $prepare->bindParam(2, $personID);
        $prepare->bindParam(3, $facilityID);
        $prepare->bindParam(4, $EID);
        $prepare->bindParam(5, $doseNumber);
        $prepare->bindParam(6, $vaccinationDate);
        return $prepare->execute();
    }
}
