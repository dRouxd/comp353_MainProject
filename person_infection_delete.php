<?php include 'mysql_queries.php'; ?>
<?php

$infection_id = $_GET["infection_id"];

if($_GET["confirm"] == "true")
{
    
    #TODO: Get the person_id using infection_id before deletion
    $person_id = "1";

    #TODO: send the request to mysql to delete infection_id
    
    header("Location: person_edit.php?person_id=" . $person_id);
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Infection</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Confirm</h3>

<p>
Are you sure you want to delete this infection? <a href="person_infection_delete.php?infection_id=<?php print($infection_id); ?>&confirm=true">Yes</a> <a href="person_infection_edit.php?infection_id=<?php print($infection_id); ?>">No</a>
</p>


<?php include 'tail.php'; ?>










