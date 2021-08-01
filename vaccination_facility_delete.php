<?php include 'mysql_queries.php'; ?>
<?php

$facility_id = $_GET["facility_id"];

if($_GET["confirm"] == "true")
{
    #TODO: send the request to mysql to delete vaccine_id
    
    header("Location: vaccination_facility.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Vaccination Facility</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Confirm</h3>

<p>
Are you sure you want to delete this vaccination facility? <a href="vaccination_facility_delete.php?facility_id=<?php print($facility_id); ?>&confirm=true">Yes</a> <a href="vaccination_facility_delete.php?facility_id=<?php print($facility_id); ?>">No</a>
</p>


<?php include 'tail.php'; ?>










