<?php
require_once 'model/ProvinceEligibilityModel.php';

use model\ProvinceEligibilityModel;

require_once 'model/AgeGroupModel.php';

use model\AgeGroupModel;

$ageGroupModel = new AgeGroupModel();
$provinceEligibilityModel = new ProvinceEligibilityModel();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'create') {
        $provinceEligibilityModel->insertProvinceEligibility($_POST);
    }

    if ($_POST['type'] == 'update') {
        $provinceEligibilityModel->updateProvinceEligibility($_POST);
    }

}

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'delete') {
        $provinceEligibilityModel->deleteProvinceEligibility($_GET['province']);
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
    <title>Question7-8</title>
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
                    <form action="question7-8.php" method="post">
                        <input type="hidden" id="type" name="type" value="create">
                        <div class="form-group">
                            <label for="province">province</label>
                            <input type="text" required name="province" id="province" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ageGroupNumber">ageGroupNumber</label>
                            <select name="ageGroupNumber" id="ageGroupNumber" class="form-control">
                                <?php
                                foreach ($ageGroupModel->ageGroupList() as $item) {
                                    $ageGroupNumber = $item['ageGroupNumber'];
                                    $lowerBound = $item['lowerBound'];
                                    $upperBound = $item['upperBound'];
                                    echo "<option value='$ageGroupNumber'>lowerBound:$lowerBound;upperBound:$upperBound;ageGroupNumber:$ageGroupNumber</option>";
                                }
                                ?>
                            </select>
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
            <td>province</td>
            <td>ageGroupNumber</td>
            <td>Options</td>
        </tr>
        <?php
        foreach ($provinceEligibilityModel->provinceEligibilityList() as $item) {
            echo "<tr>";
            $province = $item['province'];
            echo "<td>$province</td>";
            $ageGroupNumber = $item['ageGroupNumber'];
            echo "<td>$ageGroupNumber</td>";
            echo "<td>";
            echo "<button class='btn-link update' data-toggle='modal' data-target='#saveModal'>Update</button>";
            echo "<a class='btn-link delete' href='question7-8.php?type=delete&province=$province   '>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script>
        $(function () {
            $('.update').click(function () {
                let trElement = $(this).parent().parent();
                let province = $(trElement.children()[0]).text();
                $('#province').val(province);
                let ageGroupNumber = $(trElement.children()[1]).text();
                $('#ageGroupNumber').val(ageGroupNumber);
                $('#type').val('update');
            });

            $('.save').click(function () {
                $('#province').val(null);
                $('#ageGroupNumber').val(null);
                $('#type').val('create');
            });
        });
    </script>
</div>
</body>
</html>
