<?php include 'mysql_queries.php'; ?>
<?php

if(array_key_exists("save", $_POST))
{
    #TODO: Send the new vaccine data to the mysql and get id back
    $brand=$_POST['brand'];
    $current_status=$_POST['current_status'];
    $approval_date=$_POST['approval_date'];
    $suspended_date=$_POST['suspended_date'];
    $description =$_POST['description '];

    $sqlinsert="insert into Vaccine (brand, approval_date, current_status, suspended_date, description) values('{$brand}', '{$approval_date}', '{$current_status}', '{$suspended_date}', '{$description}')";

    $vaccinelist = addVaccine($sqlinsert);

    //$vaccine_id = 1;
    $vaccine_id = $vaccinelist["vaccine_id"];
    header("Location: vaccine_edit.php?vaccine_id=" . $vaccine_id);
    die();
}


$status = [
    "SAFE",
    "SUSPENDED"
]

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Vaccine</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Details</h3>
<form class="inForm" action="vaccine_add.php"  method="post">
    <p class="inForm">
        <label class="inForm" for="brand">Brand: </label>
        <input class="inForm" name="brand" id="brand" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="current_status">Current Status: </label>
        <select class="inForm" name="current_status" id="current_status">
<?php
foreach($status as $st)
{
?>           <option value="<?php print($st); ?>"><?php print($st); ?></option>
<?php
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="approval_date">Approval Date: </label>
        <input class="inForm" name="approval_date" id="approval_date" type="date">
    </p>
    <p class="inForm">
        <label class="inForm" for="suspended_date">Suspended Date: </label>
        <input class="inForm" name="suspended_date" id="suspended_date" type="date">
    </p>
    <p class="inForm">
        <label class="inForm" for="description">Description: </label>
        <input class="inForm" name="description" id="description" type="text">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










