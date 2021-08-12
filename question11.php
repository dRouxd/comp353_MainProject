<?php
require_once 'model/VaccinationModel.php';

use model\VaccinationModel;

require_once 'model/HealthWorkerModel.php';

use model\HealthWorkerModel;

require_once 'model/PersonModel.php';

use model\PersonModel;

require_once 'model/VaccinationFacilityModel.php';

use model\VaccinationFacilityModel;

require_once 'model/VaccineModel.php';

use model\VaccineModel;

$vaccinationFacilityModel = new VaccinationFacilityModel();
$healthWorkerModel = new HealthWorkerModel();
$personModel = new PersonModel();
$vaccineModel = new VaccineModel();
$vaccinationModel = new VaccinationModel();
if (isset($_POST['type'])) {

    if ($_POST['type'] == 'create') {
        $vaccinationModel->insertVaccination($_POST);
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
    <title>Question11</title>
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
                    <form action="question11.php" method="post">
                        <input type="hidden" name="type" id="type" value="create">
                        <div class="form-group">
                            <label for="vaccineID">vaccineID</label>
                            <select name="vaccineID" id="vaccineID" class="form-control">
                                <?php
                                foreach ($vaccineModel->vaccineList() as $item) {
                                    $vaccineID = $item['vaccineID'];
                                    $brand = $item['brand'];
                                    echo "<option value='$vaccineID'>VaccineID: $vaccineID;Brand: $brand</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="personID">PersonID</label>
                            <select name="personID" id="personID" class="form-control">
                                <?php
                                    foreach ($personModel->personList() as $item){
                                        $lastName = $item['lastName'];
                                        $firstName = $item['firstName'];
                                        $personID = $item['personID'];
                                        echo "<option value='$personID'>Name: $firstName $lastName</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="facilityID">facilityID</label>
                            <select name="facilityID" id="facilityID" class="form-control">
                                <?php
                                    foreach ($vaccinationFacilityModel->vaccinationFacilityList() as $item){
                                        $facilityID = $item['facilityID'];
                                        $name = $item['name'];
                                        echo "<option value='$facilityID'>Name: $name;FacilityID: $facilityID</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="EID">EID</label>
                            <select name="EID" id="EID" class="form-control">
                                <?php
                                    foreach ($healthWorkerModel->HealthWorkerList() as $item){
                                        $EID = $item['EID'];
                                        $personID = $item['PersonID'];
                                        echo "<option value='$EID'>EID: $EID;PersonID: $personID</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doseNumber">doseNumber</label>
                            <input type="text" required name="doseNumber" id="doseNumber" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="vaccinationDate">vaccinationDate</label>
                            <input type="date" required name="vaccinationDate" id="vaccinationDate"
                                   class="form-control">
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
            <td>vaccineID</td>
            <td>personID</td>
            <td>facilityID</td>
            <td>EID</td>
            <td>doseNumber</td>
            <td>vaccinationDate</td>
            <td>Options</td>
        </tr>
        <?php
        foreach ($vaccinationModel->vaccinationList() as $item) {
            echo "<tr>";
            $vaccineID = $item['vaccineID'];
            echo "<td>$vaccineID</td>";
            $personID = $item['personID'];
            echo "<td>$personID</td>";
            $facilityID = $item['facilityID'];
            echo "<td>$facilityID</td>";
            $EID = $item['EID'];
            echo "<td>$EID</td>";
            $doseNumber = $item['doseNumber'];
            echo "<td>$doseNumber</td>";
            $vaccinationDate = $item['vaccinationDate'];
            echo "<td>$vaccinationDate</td>";
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
                let vaccineID = $(trElement.children()[0]).text();
                $('#vaccineID').val(vaccineID);
                let personID = $(trElement.children()[1]).text();
                $('#personID').val(personID);
                let facilityID = $(trElement.children()[2]).text();
                $('#facilityID').val(facilityID);
                let EID = $(trElement.children()[3]).text();
                $('#EID').val(EID);
                let doseNumber = $(trElement.children()[4]).text();
                $('#doseNumber').val(doseNumber);
                let vaccinationDate = $(trElement.children()[5]).text();
                $('#vaccinationDate').val(vaccinationDate);
                $('#type').val('update');
            });

            $('.save').click(function () {
                //-----
                $('#vaccineID').val(null);
                $('#personID').val(null);
                $('#facilityID').val(null);
                $('#EID').val(null);
                $('#doseNumber').val(null);
                $('#vaccinationDate').val(null);
                $('#type').val('create');
            });

            $('form').submit(function () {
                if (this.type.value === 'update') {
                    return false;
                }
            })
        });
    </script>
</div>
</body>
</html>
