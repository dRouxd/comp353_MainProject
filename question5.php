<?php
require_once 'model/InfectionModel.php';

use model\InfectionModel;

require_once 'model/PersonModel.php';

use model\PersonModel;

$infectionModel = new InfectionModel();
$personModel = new PersonModel();

if (isset($_POST['method'])) {

    if ($_POST['method'] == 'create') {
        $infectionModel->insertInfection($_POST);
    }

    if ($_POST['method'] == 'update') {
        $infectionModel->updateInfection($_POST);
    }
}

if (isset($_GET['method'])) {
    if ($_GET['method'] == 'delete') {
        $infectionModel->deleteInfection($_GET['infectionNumber']);
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
    <title>Question5</title>
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
                    <form action="question5.php" method="post">
                        <input type="hidden" name="method" id="method" value="create">
                        <div class="form-group">
                            <label for="personID">personID</label>
                            <select name="personID" id="personID" class="form-control">
                                <?php
                                foreach ($personModel->personList() as $item) {
                                    $personID = $item['personID'];
                                    $name = $item['firstName'] .' '. $item['lastName'];
                                    echo "<option value='$personID'>Name: $name;PersonID: $personID</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="infectionNumber">infectionNumber</label>
                            <input type="text" required name="infectionNumber" id="infectionNumber"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="infectionDate">infectionDate</label>
                            <input type="date" required name="infectionDate" id="infectionDate" class="form-control">
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
            <td>personID</td>
            <td>infectionNumber</td>
            <td>infectionDate</td>
            <td>type</td>
            <td>Options</td>
        </tr>
        <?php
        foreach ($infectionModel->infectionList() as $item) {
            echo "<tr>";
            $personID = $item['personID'];
            echo "<td>$personID</td>";
            $infectionNumber = $item['infectionNumber'];
            echo "<td>$infectionNumber</td>";
            $infectionDate = $item['infectionDate'];
            echo "<td>$infectionDate</td>";
            $type = $item['type'];
            echo "<td>$type</td>";
            echo "<td>";
            echo "<button class='btn-link update' data-toggle='modal' data-target='#saveModal'>Update</button>";
            echo "<a class='btn-link delete' href='question5.php?method=delete&infectionNumber=$infectionNumber'>Delete</a>";
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
                let personID = $(trElement.children()[0]).text();
                $('#personID').val(personID);
                let infectionNumber = $(trElement.children()[1]).text();
                $('#infectionNumber').val(infectionNumber);
                let infectionDate = $(trElement.children()[2]).text();
                $('#infectionDate').val(infectionDate);
                let type = $(trElement.children()[3]).text();
                $('#type').val(type);
                $('#method').val('update');
            });

            $('.save').click(function () {
                //-----
                $('#personID').val(null);
                $('#infectionNumber').val(null);
                $('#infectionDate').val(null);
                $('#type').val(null);
                $('#method').val('create');
            });
        });
    </script>
</div>
</body>
</html>
