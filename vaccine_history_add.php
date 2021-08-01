<?php include 'mysql_queries.php'; ?>
<?php

$vaccine_id = $_GET["vaccine_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the new vaccine history data to the mysql
    
    $person_id = 1;
    header("Location: vaccine_edit.php?vaccine_id=" . $person_id);
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Vaccine History</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>
<h3>History</h3>
<form class="inForm" action="/vaccine_history_add.php?vaccine_id=<?php print($vaccine_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="status">Status: </label>
        <input class="inForm" name="status" id="status" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="approved_date">Approved Date: </label>
        <input class="inForm" name="approved_date" id="approved_date" type="date">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










