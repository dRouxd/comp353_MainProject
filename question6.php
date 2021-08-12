<?php
require_once 'model/AgeGroupModel.php';

use model\AgeGroupModel;

$ageGroupModel = new AgeGroupModel();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'create') {
        $ageGroupModel->insertAgeGroup($_POST);
    }

    if ($_POST['type'] == 'update') {
        $ageGroupModel->updateAgeGroup($_POST);
    }

}

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'delete') {
        $ageGroupModel->deleteAgeGroup($_GET['ageGroupNumber']);
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
    <title>Question6</title>
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
                    <form action="question6.php" method="post">
                        <input type="hidden" id="type" name="type" value="create">
                        <div class="form-group">
                            <label for="ageGroupNumber">ageGroupNumber</label>
                            <input type="text" required name="ageGroupNumber" id="ageGroupNumber" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lowerBound">lowerBound</label>
                            <input type="text" required name="lowerBound" id="lowerBound" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="upperBound">upperBound</label>
                            <input type="text" required name="upperBound" id="upperBound" class="form-control">
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
            <td>ageGroupNumber</td>
            <td>lowerBound</td>
            <td>upperBound</td>
            <td>Options</td>
        </tr>
        <?php
        foreach ($ageGroupModel->ageGroupList() as $item) {
            echo "<tr>";
            $ageGroupNumber = $item['ageGroupNumber'];
            echo "<td>$ageGroupNumber</td>";
            $lowerBound = $item['lowerBound'];
            echo "<td>$lowerBound</td>";
            $upperBound = $item['upperBound'];
            echo "<td>$upperBound</td>";
            echo "<td>";
            echo "<button class='btn-link update' data-toggle='modal' data-target='#saveModal'>Update</button>";
            echo "<a class='btn-link delete' href='question6.php?type=delete&ageGroupNumber=$ageGroupNumber'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script>
        $(function () {
            $('.update').click(function () {
                let trElement = $(this).parent().parent();
                let ageGroupNumber = $(trElement.children()[0]).text();
                $('#ageGroupNumber').val(ageGroupNumber);
                let lowerBound = $(trElement.children()[1]).text();
                $('#lowerBound').val(lowerBound);
                let upperBound = $(trElement.children()[2]).text();
                $('#upperBound').val(upperBound);
                $('#type').val('update');
            });

            $('.save').click(function () {
                $('#ageGroupNumber').val(null);
                $('#lowerBound').val(null);
                $('#upperBound').val(null);
                $('#type').val('create');
            });
        });
    </script>
</div>
</body>
</html>
