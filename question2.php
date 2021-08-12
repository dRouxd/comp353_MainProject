<?php
require_once 'model/HealthWorkerModel.php';
require_once 'model/PersonModel.php';

use model\HealthWorkerModel;
use model\PersonModel;

$healthWorkerModel = new HealthWorkerModel();
$personModel = new PersonModel();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'create') {
        $healthWorkerModel->insertHealthWorker($_POST);
    }

    if ($_POST['type'] == 'update') {
        $healthWorkerModel->updateHealthWorker($_POST);
    }

}

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'delete') {
        $healthWorkerModel->deleteHealthWorker($_GET['EID']);
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
    <title>Question2</title>
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
                    <form action="question2.php" method="post">
                        <input type="hidden" id="type" name="type" value="create">
                        <div class="form-group">
                            <label for="EID">EID</label>
                            <input type="text" required name="EID" id="EID" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="PersonId">PersonId</label>
                            <select name="PersonId" id="PersonId" class="form-control">
                                <?php
                                    foreach ($personModel->personList() as $person){
                                        $personID = $person['personID'];
                                        $firstName = $person['firstName'];
                                        $lastName = $person['lastName'];
                                        echo "<option value='$personID'>$firstName $lastName</option>";
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
            <td>EID</td>
            <td>PersonId</td>
            <td>Options</td>
        </tr>
        <?php
        foreach ($healthWorkerModel->HealthWorkerList() as $item) {
            echo "<tr>";
            $EID = $item['EID'];
            echo "<td>$EID</td>";
            $PersonId = $item['PersonID'];
            echo "<td>$PersonId</td>";
            echo "<td>";
            echo "<button class='btn-link update'  data-toggle='modal' data-target='#saveModal'>Update</button>";
            echo "<a class='btn-link delete' href='question2.php?type=delete&EID=$EID'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script>
        $(function () {
            $('.update').click(function () {
                let trElement = $(this).parent().parent();
                let EID = $(trElement.children()[0]).text();
                $('#EID').val(EID);
                let PersonId = $(trElement.children()[1]).text();
                $('#PersonId').val(PersonId);
                $('#type').val('update');
            });

            $('.save').click(function () {
                $('#EID').val(null);
                $('#PersonId').val(null);
                $('#type').val('create');
            });
        });
    </script>
</div>
</body>
</html>
