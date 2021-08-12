<?php
require_once 'model/PersonModel.php';

use model\PersonModel;

$personModel = new PersonModel();

if (isset($_POST['type'])) {

    if ($_POST['type'] == 'create') {
        $personModel->insertPerson($_POST);
    }

    if ($_POST['type'] == 'update') {
        $personModel->updatePerson($_POST);
    }
}

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'delete') {
        $personModel->deletePerson($_GET['personId']);
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
    <title>Question1</title>
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
                    <form action="question1.php" method="post">
                        <input type="hidden" id="type" name="type" value="create">
                        <div class="form-group">
                            <label for="personID">personID</label>
                            <input type="text" required name="personID" id="personID" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="SSN_Passport">SSN_Passport</label>
                            <input type="text" required name="SSN_Passport" id="SSN_Passport" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="firstName">firstName</label>
                            <input type="text" required name="firstName" id="firstName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lastName">lastName</label>
                            <input type="text" required name="lastName" id="lastName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="DOB">DOB</label>
                            <input type="date" required name="DOB" id="DOB" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="medicareCardNumber">medicareCardNumber</label>
                            <input type="text" required name="medicareCardNumber" id="medicareCardNumber"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="mobileNumber">mobileNumber</label>
                            <input type="text" required name="mobileNumber" id="mobileNumber" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" required name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" required name="address" id="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="postalCode">postalCode</label>
                            <input type="text" required name="postalCode" id="postalCode" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="citizenship">citizenship</label>
                            <input type="text" required name="citizenship" id="citizenship" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="age">age</label>
                            <input type="number" required name="age" id="age" class="form-control">
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
            <th>personID</th>
            <th>SSN_Passport</th>
            <th>firstName</th>
            <th>lastName</th>
            <th>DOB</th>
            <th>medicareCardNumber</th>
            <th>mobileNumber</th>
            <th>email</th>
            <th>address</th>
            <th>postalCode</th>
            <th>citizenship</th>
            <th>age</th>
            <th>Options</th>
        </tr>
        <?php
        $personList = $personModel->personList();
        foreach ($personList as $item) {

            echo "<tr>";
            $personID = $item['personID'];
            echo "<td>$personID</td>";
            $SSN_Passport = $item['SSN_Passport'];
            echo "<td>$SSN_Passport</td>";
            $firstName = $item['firstName'];
            echo "<td>$firstName</td>";
            $lastName = $item['lastName'];
            echo "<td>$lastName</td>";
            $DOB = $item['DOB'];
            echo "<td>$DOB</td>";
            $medicareCardNumber = $item['medicareCardNumber'];
            echo "<td>$medicareCardNumber</td>";
            $mobileNumber = $item['mobileNumber'];
            echo "<td>$mobileNumber</td>";
            $email = $item['email'];
            echo "<td>$email</td>";
            $address = $item['address'];
            echo "<td>$address</td>";
            $postalCode = $item['postalCode'];
            echo "<td>$postalCode</td>";
            $citizenship = $item['citizenship'];
            echo "<td>$citizenship</td>";
            $age = $item['age'];
            echo "<td>$age</td>";
            echo "<td>";
            echo "<button class='btn-link update'  data-toggle='modal' data-target='#saveModal'>Update</button>";
            echo "<a class='btn-link delete' href='question1.php?type=delete&personId=$personID'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script>
        $(function () {
            $('.update').click(function () {
                let trElement = $(this).parent().parent();
                let personID = $(trElement.children()[0]).text();
                $('#personID').val(personID);
                let SSN_Passport = $(trElement.children()[1]).text();
                $('#SSN_Passport').val(SSN_Passport);
                let firstName = $(trElement.children()[2]).text();
                $('#firstName').val(firstName);
                let lastName = $(trElement.children()[3]).text();
                $('#lastName').val(lastName);
                let DOB = $(trElement.children()[4]).text();
                $('#DOB').val(DOB);
                let medicareCardNumber = $(trElement.children()[5]).text();
                $('#medicareCardNumber').val(medicareCardNumber);
                let mobileNumber = $(trElement.children()[6]).text();
                $('#mobileNumber').val(mobileNumber);
                let email = $(trElement.children()[7]).text();
                $('#email').val(email);
                let address = $(trElement.children()[8]).text();
                $('#address').val(address);
                let postalCode = $(trElement.children()[9]).text();
                $('#postalCode').val(postalCode);
                let citizenship = $(trElement.children()[10]).text();
                $('#citizenship').val(citizenship);
                let age = $(trElement.children()[11]).text();
                $('#age').val(age);
                $('#type').val('update');
            });

            $('.save').click(function () {
                $('#personID').val(null);
                $('#SSN_Passport').val(null);
                $('#firstName').val(null);
                $('#lastName').val(null);
                $('#DOB').val(null);
                $('#medicareCardNumber').val(null);
                $('#mobileNumber').val(null);
                $('#email').val(null);
                $('#address').val(null);
                $('#postalCode').val(null);
                $('#citizenship').val(null);
                $('#age').val(null);
                $('#type').val('create');
            });
        });
    </script>
</div>
</body>
</html>
