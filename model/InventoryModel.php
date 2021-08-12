<?php


namespace model;
require_once 'PdoModel.php';

class InventoryModel extends PdoModel
{
    public function inventoryList()
    {
        return $this->toList($this->dbh->query("select * from Inventory"));
    }

    public function insertInventory($Inventory)
    {
        $facilityID = $Inventory['facilityID'];
        $vaccineID = $Inventory['vaccineID'];
        $availableDoses = $Inventory['availableDoses'];
        $sql = "insert into Inventory values (?,?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $facilityID);
        $prepare->bindParam(2, $vaccineID);
        $prepare->bindParam(3, $availableDoses);
        return $prepare->execute();
    }

    public function remain($facilityID,$vaccineID){
        $sql = "SELECT SUM(i.`availableDoses`)-(SELECT SUM(s.`dosesReceived`) FROM Shipments s WHERE facilityID= ? AND vaccineID=?) remain FROM Inventory i WHERE facilityID= ? AND vaccineID=?";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $facilityID);
        $prepare->bindParam(2, $vaccineID);
        $prepare->bindParam(3, $facilityID);
        $prepare->bindParam(4, $vaccineID);
        return $this->getOne($prepare)['remain'];
    }
}
