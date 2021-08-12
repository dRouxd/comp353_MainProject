<?php
require_once 'model/ShipmentsModel.php';

use model\ShipmentsModel;

require_once 'model/VaccineModel.php';

use model\VaccineModel;

require_once 'model/VaccinationFacilityModel.php';

use model\VaccinationFacilityModel;

$shipmentsModel = new ShipmentsModel();
$vaccinationFacilityModel = new VaccinationFacilityModel();
$vaccineModel = new VaccineModel();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'create') {
        $shipmentsModel->insertShipments($_POST);
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Question10</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/container.css">
</head>
<body>
<div id="container">
    <button class="btn btn-primary save" data-toggle="modal" data-target="#saveModal">Create</button>
    <!-- Modal -->
    <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Save Person</h4>
                </div>
                <div class="modal-body">
                    <form action="question10.php" method="post">
                        <input type="hidden" id="type" name="type" value="create">
                        <div class="form-group">
                            <label for="facilityID">facilityID</label>
                            <select name="facilityID" id="facilityID" class="form-control">
                                <?php
                                foreach ($vaccinationFacilityModel->vaccinationFacilityList() as $item) {
                                    $name = $item['name'];
                                    $facilityID = $item['facilityID'];
                                    echo "<option value='$facilityID'>name: $name;facilityID:$facilityID</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vaccineID">vaccineID</label>
                            <select name="vaccineID" id="vaccineID" class="form-control">
                                <?php
                                foreach ($vaccineModel->vaccineList() as $item) {
                                    $vaccineID = $item['vaccineID'];
                                    $brand = $item['brand'];
                                    echo "<option value='$vaccineID'>brand: $brand;vaccineID:$vaccineID</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="receptionDate">receptionDate</label>
                            <input type="date" required name="receptionDate" id="receptionDate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dosesReceived">dosesReceived</label>
                            <input type="text" required name="dosesReceived" id="dosesReceived" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered" style="margin-top: 10px">
        <tr>
            <td>facilityID</td>
            <td>vaccineID</td>
            <td>receptionDate</td>
            <td>dosesReceived</td>
            <td>Options</td>
        </tr>
        <?php
        foreach ($shipmentsModel->shipmentsList() as $item) {
            echo "<tr>";
            $facilityID = $item['facilityID'];
            echo "<td>$facilityID</td>";
            $vaccineID = $item['vaccineID'];
            echo "<td>$vaccineID</td>";
            $receptionDate = $item['receptionDate'];
            echo "<td>$receptionDate</td>";
            $dosesReceived = $item['dosesReceived'];
            echo "<td>$dosesReceived</td>";
            echo "<td>";
            echo "<button class='btn-link update' data-toggle='modal' data-target='#saveModal'>Display</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script>
        $(function () {
            $('.update').click(function () {
                let trElement = $(this).parent().parent();

                // ----
                let facilityID = $(trElement.children()[0]).text();
                $('#facilityID').val(facilityID);
                let vaccineID = $(trElement.children()[1]).text();
                $('#vaccineID').val(vaccineID);
                let receptionDate = $(trElement.children()[2]).text();
                $('#receptionDate').val(receptionDate);
                let dosesReceived = $(trElement.children()[3]).text();
                $('#dosesReceived').val(dosesReceived);
                $('#type').val('update');
            });

            $('.save').click(function () {
                //-----
                $('#facilityID').val(null);
                $('#vaccineID').val(null);
                $('#receptionDate').val(null);
                $('#dosesReceived').val(null);
                $('#type').val('create');
            });

            $('form').submit(function () {
                if (this.type.value==='update'){
                    return false;
                }
            });
        });
    </script>
</div>
</body>
</html>