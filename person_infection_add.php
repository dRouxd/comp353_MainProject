<?php include 'mysql_queries.php'; ?>
<?php
$person_id = $_GET["person_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the new infection to the database
    
    header("Location: person_edit.php?person_id=" . $person_id);
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Person Infection</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<h3>Infection Details</h3>
<form class="inForm" action="/person_infection_add.php?person_id=<?php print($person_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="type">Type: </label>
        <input class="inForm" name="type"  id="type" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="infection_date">Infection Date: </label>
        <input class="inForm" name="infection_date"  id="infection_date" type="date">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










