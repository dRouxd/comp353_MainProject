<?php
require_once 'model/VaccinationFacilityModel.php';

use model\VaccinationFacilityModel;

require_once 'model/ProvinceEligibilityModel.php';

use model\ProvinceEligibilityModel;

$provinceEligibilityModel = new ProvinceEligibilityModel();
$vaccinationFacilityModel = new VaccinationFacilityModel();

if (isset($_POST['method'])) {
    if ($_POST['method'] == 'create') {
        $vaccinationFacilityModel->insertVaccinationFacility($_POST);
    }

    if ($_POST['method'] == 'update') {
        $vaccinationFacilityModel->updateVaccinationFacility($_POST);
    }

}

if (isset($_GET['method'])) {
    if ($_GET['method'] == 'delete') {
        $vaccinationFacilityModel->deleteVaccinationFacility($_GET['facilityID']);
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
    <title>Question3</title>
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
                    <form action="question3.php" method="post">
                        <input type="hidden" id="method" name="method" value="create">
                        <div class="form-group">
                            <label for="facilityID">facilityID</label>
                            <input type="text" required name="facilityID" id="facilityID" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" required name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="text" required name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" required name="address" id="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="province">province</label>
                            <select name="province" id="province" class="form-control">
                              <?php
                                foreach ($provinceEligibilityModel->provinceEligibilityList() as $item){
                                    $province = $item['province'];
                                    echo "<option>$province</option>";
                                }
                              ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="website_url">website_url</label>
                            <input type="text" required name="website_url" id="website_url" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="type">type</label>
                            <input type="text" required name="type" id="type" class="form-control">
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
            <td>name</td>
            <td>phone</td>
            <td>address</td>
            <td>province</td>
            <td>website_url</td>
            <td>type</td>
            <td>Options</td>
        </tr>
        <?php
        foreach ($vaccinationFacilityModel->vaccinationFacilityList() as $item) {
            echo "<tr>";
            $facilityID = $item['facilityID'];
            echo "<td>$facilityID</td>";
            $name = $item['name'];
            echo "<td>$name</td>";
            $phone = $item['phone'];
            echo "<td>$phone</td>";
            $address = $item['address'];
            echo "<td>$address</td>";
            $province = $item['province'];
            echo "<td>$province</td>";
            $website_url = $item['website_url'];
            echo "<td>$website_url</td>";
            $type = $item['type'];
            echo "<td>$type</td>";
            echo "<td>";
            echo "<button class='btn-link update' data-toggle='modal' data-target='#saveModal'>Update</button>";
            echo "<a class='btn-link delete' href='question3.php?method=delete&facilityID=$facilityID'>Delete</a>";
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
                let name = $(trElement.children()[1]).text();
                $('#name').val(name);
                let phone = $(trElement.children()[2]).text();
                $('#phone').val(phone);
                let address = $(trElement.children()[3]).text();
                $('#address').val(address);
                let province = $(trElement.children()[4]).text();
                $('#province').val(province);
                let website_url = $(trElement.children()[5]).text();
                $('#website_url').val(website_url);
                let type = $(trElement.children()[6]).text();
                $('#type').val(type);
                $('#method').val('update');
            });

            $('.save').click(function () {
                //-----
                $('#facilityID').val(null);
                $('#name').val(null);
                $('#phone').val(null);
                $('#address').val(null);
                $('#province').val(null);
                $('#website_url').val(null);
                $('#type').val(null);
                $('#method').val('create');
            });
        });
    </script>
</div>
</body>
</html>
