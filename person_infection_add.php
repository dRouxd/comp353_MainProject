<?php include 'mysql_queries.php'; ?>
<?php
$infection_id = $_GET["infection_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    # TODO: Get the person id using the infection id
    
    $person_id = "1";
    header("Location: person_edit.php?person_id=" . $person_id);
    die();
}

# TODO: Get Vaccines received from mysql
$infection = ["infection_id" => "1", "type" => "delta", "date_of_infection" => "2021-01-01"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Person Infection Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<h3>Edit Details</h3>
<form class="inForm" action="/person_infection_edit.php?infection_id=<?php print($infection_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="type">Type: </label>
        <input class="inForm" name="type"  id="type" type="text" value="<?php print($infection["type"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="date_of_infection">Infection Date: </label>
        <input class="inForm" name="date_of_infection"  id="type" type="date_of_infection" value="<?php print($infection["date_of_infection"]); ?>">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










