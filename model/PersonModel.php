<?php


namespace model;
require_once 'PdoModel.php';

class PersonModel extends PdoModel
{
    public function personList()
    {
        return $this->toList($this->dbh->query("select * from Person"));
    }

    public function insertPerson($person)
    {
        $sql = "insert into Person values (?,?,?,?,?,?,?,?,?,?,?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $person['personID']);
        $prepare->bindParam(2, $person['SSN_Passport']);
        $prepare->bindParam(3, $person['firstName']);
        $prepare->bindParam(4, $person['lastName']);
        $prepare->bindParam(5, $person['DOB']);
        $prepare->bindParam(6, $person['medicareCardNumber']);
        $prepare->bindParam(7, $person['mobileNumber']);
        $prepare->bindParam(8, $person['email']);
        $prepare->bindParam(9, $person['address']);
        $prepare->bindParam(10, $person['postalCode']);
        $prepare->bindParam(11, $person['citizenship']);
        $prepare->bindParam(12, $person['age']);
        return $prepare->execute();
    }

    public function updatePerson($person)
    {
        $sql = "update Person set SSN_Passport = ?,firstName = ?,lastName = ?,DOB = ?,medicareCardNumber = ?,mobileNumber = ?,email = ?,address = ?,postalCode = ?,citizenship = ? ,age=? where personID = ?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $person['SSN_Passport']);
        $prepare->bindParam(2, $person['firstName']);
        $prepare->bindParam(3, $person['lastName']);
        $prepare->bindParam(4, $person['DOB']);
        $prepare->bindParam(5, $person['medicareCardNumber']);
        $prepare->bindParam(6, $person['mobileNumber']);
        $prepare->bindParam(7, $person['email']);
        $prepare->bindParam(8, $person['address']);
        $prepare->bindParam(9, $person['postalCode']);
        $prepare->bindParam(10, $person['citizenship']);
        $prepare->bindParam(11, $person['age']);
        $prepare->bindParam(12, $person['personID']);
        return $prepare->execute();
    }

    public function deletePerson($personId)
    {
        $sql = "delete from Person where personId = ?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $personId);
        return $prepare->execute();
    }

}
