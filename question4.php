<?php
require_once 'model/VaccineModel.php';

use model\VaccineModel;

$vaccineModel = new VaccineModel();

if (isset($_POST['type'])) {

    if ($_POST['type'] == 'create') {
        $vaccineModel->insertVaccine($_POST);
    }

    if ($_POST['type'] == 'update') {
        $vaccineModel->updateVaccine($_POST);
    }
}

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'delete') {
        $vaccineModel->deleteVaccine($_GET['vaccineID']);
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
    <title>Question4</title>
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
                    <form action="question4.php" method="post">
                        <input type="hidden" id="type" name="type" value="create">
                        <div class="form-group">
                            <label for="vaccineID">vaccineID</label>
                            <input type="text" required name="vaccineID" id="vaccineID" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="brand">brand</label>
                            <input type="text" required name="brand" id="brand" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="currentStatus">currentStatus</label>
                            <input type="text" required name="currentStatus" id="currentStatus" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <input type="text" required name="description" id="description" class="form-control">
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
            <td>brand</td>
            <td>currentStatus</td>
            <td>description</td>
            <td>Options</td>
        </tr>
        <?php
        foreach ($vaccineModel->vaccineList() as $item) {
            echo "<tr>";
            $vaccineID = $item['vaccineID'];
            echo "<td>$vaccineID</td>";
            $brand = $item['brand'];
            echo "<td>$brand</td>";
            $currentStatus = $item['currentStatus'];
            echo "<td>$currentStatus</td>";
            $description = $item['description'];
            echo "<td>$description</td>";
            echo "<td>";
            echo "<button class='btn-link update' data-toggle='modal' data-target='#saveModal'>Update</button>";
            echo "<a class='btn-link delete' href='question4.php?type=delete&vaccineID=$vaccineID'>Delete</a>";
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
                let brand = $(trElement.children()[1]).text();
                $('#brand').val(brand);
                let currentStatus = $(trElement.children()[2]).text();
                $('#currentStatus').val(currentStatus);
                let description = $(trElement.children()[3]).text();
                $('#description').val(description);
                $('#type').val('update');
            });

            $('.save').click(function () {
                //-----
                $('#vaccineID').val(null);
                $('#brand').val(null);
                $('#currentStatus').val(null);
                $('#description').val(null);
                $('#type').val('create');
            });
        });
    </script>
</div>
</body>
</html>
