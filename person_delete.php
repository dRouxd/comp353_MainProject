<?php include 'mysql_queries.php'; ?>
<?php

$person_id = $_GET["person_id"];

if($_GET["confirm"] == "true")
{
    #TODO: send the request to mysql to delete person_id
    $sqldelete="delete from Person where person_id='".$person_id."'";
    
    updatePerson($sqldelete);

    //$person_id = 1;
    header("Location: person.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Person</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Confirm</h3>

<p>
Are you sure you want to delete this person? <a href="person_delete.php?person_id=<?php print($person_id); ?>&confirm=true">Yes</a> <a href="person_edit.php?person_id=<?php print($person_id); ?>">No</a>
</p>


<?php include 'tail.php'; ?>










