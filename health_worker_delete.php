<?php include 'mysql_queries.php'; ?>
<?php

$eid = $_GET["eid"];

if($_GET["confirm"] == "true")
{
    #TODO: send the request to mysql to delete vaccine_id
    
    header("Location: health_worker.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Health Worker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Confirm</h3>

<p>
Are you sure you want to delete this health worker? <a href="health_worker_delete.php?eid=<?php print($person_id); ?>&confirm=true">Yes</a> <a href="health_worker_edit.php?eid=<?php print($eid); ?>">No</a>
</p>


<?php include 'tail.php'; ?>










