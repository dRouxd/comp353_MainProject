<?php include 'mysql_queries.php'; ?>
<?php

$vaccine_id = $_GET["vaccine_id"];

if($_GET["confirm"] == "true")
{
    #TODO: send the request to mysql to delete vaccine_id
    $sqldelete="delete from Vaccine where vaccine_id='".$vaccine_id."'";
    
    updateVaccine($sqldelete);
    
    header("Location: vaccine.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Vaccine</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Confirm</h3>

<p>
Are you sure you want to delete this vaccine? <a href="vaccine_delete.php?vaccine_id=<?php print($vaccine_id); ?>&confirm=true">Yes</a> <a href="vaccine_edit.php?vaccine_id=<?php print($vaccine_id); ?>">No</a>
</p>


<?php include 'tail.php'; ?>










