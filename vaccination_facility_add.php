<?php include 'mysql_queries.php'; ?>
<?php

if(array_key_exists("save", $_POST))
{
    #TODO: Send the new vaccine data to the mysql and get id back
    
    $facility_id = 1;
    header("Location: vaccination_facility_edit.php?facility_id=" . $facility_id);
    die();
}


# TODO: Get provinces from Mysql
$provinces = [
    "AB",
    "BC",
    "MB",
    "NB",
    "NL",
    "NS",
    "NT",
    "NU",
    "ON",
    "PE",
    "QC",
    "SK",
    "YT"
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Vaccination Facility</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Details</h3>
<form class="inForm" action="/vaccination_facility_add.php"  method="post">
    <p class="inForm">
        <label class="inForm" for="name">Name: </label>
        <input class="inForm" name="name" id="name" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="address">Address: </label>
        <input class="inForm" name="address" id="address" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="province">Province: </label>
        <select class="inForm" name="province" id="province">
<?php
foreach($provinces as $p)
{
?>           <option value="<?php print($p); ?>"><?php print($p); ?></option>
<?php
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="phone">Phone: </label>
        <input class="inForm" name="phone" id="phone" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="website">Website: </label>
        <input class="inForm" name="website" id="website" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="type">Type: </label>
        <input class="inForm" name="type" id="type" type="text">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










