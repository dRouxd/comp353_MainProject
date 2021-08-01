<?php include 'mysql_queries.php'; ?>
<?php

if(array_key_exists("save", $_POST))
{
    #TODO: Send the new vaccine data to the mysql and get id back
    
    $person_id = 1;
    header("Location: vaccine_edit.php?vaccine_id=" . $person_id);
    die();
}


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
<form class="inForm" action="/vaccine_add.php"  method="post">
    <p class="inForm">
        <label class="inForm" for="brand">Brand: </label>
        <input class="inForm" name="brand" id="brand" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="description">Description: </label>
        <input class="inForm" name="description" id="description" type="text">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










