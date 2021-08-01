<?php include 'mysql_queries.php'; ?>
<?php

$vaccination_id = $_GET["vaccination_id"];

#TODO: Get the person_id using vaccination_id
$person_id = "1";

if($_GET["confirm"] == "true")
{
    
    #TODO: send the request to mysql to delete vaccination_id
    
    header("Location: person_edit.php?person_id=" . $person_id);
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Vaccination</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Confirm</h3>

<p>
Are you sure you want to delete this vaccination? <a href="person_vaccination_delete.php?vaccination_id=<?php print($vaccination_id); ?>&confirm=true">Yes</a> <a href="person_edit.php?person_id=<?php print($person_id); ?>">No</a>
</p>


<?php include 'tail.php'; ?>










