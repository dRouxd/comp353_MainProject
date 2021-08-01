<?php include 'mysql_queries.php'; ?>
<?php

$eid = $_GET["eid"];
$facility_id = $_GET["facility_id"];

if($_GET["confirm"] == "true")
{
    #TODO: send the request to mysql to delete vaccine_id
    
    header("Location: vaccination_facility_edit.php?facility_id=" . $facility_id);
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>End Employment</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Confirm</h3>

<p>
Are you sure you want to end this employment? <a href="vaccination_facility_employment_end.php?facility_id=<?php print($facility_id); ?>&eid=<?php print($eid); ?>&confirm=true">Yes</a> <a href="vaccination_facility_edit.php?facility_id=<?php print($facility_id); ?>">No</a>
</p>


<?php include 'tail.php'; ?>










