<?php


namespace model;
require_once 'PdoModel.php';
require_once 'InventoryModel.php';

class ShipmentsModel extends PdoModel
{

    public function shipmentsList()
    {
        return $this->toList($this->dbh->query("select * from Shipments"));
    }

    public function insertShipments($shipments)
    {
        $facilityID = $shipments['facilityID'];
        $vaccineID = $shipments['vaccineID'];
        $receptionDate = $shipments['receptionDate'];
        $dosesReceived = $shipments['dosesReceived'];
        $inventoryModel = new InventoryModel();
        if ($dosesReceived > $inventoryModel->remain($facilityID, $vaccineID)) {
            return false;
        }
        $sql = "insert into Shipments values (?,?,?,?)";
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindParam(1, $facilityID);
        $prepare->bindParam(2, $vaccineID);
        $prepare->bindParam(3, $receptionDate);
        $prepare->bindParam(4, $dosesReceived);
        return $prepare->execute();
    }

}
