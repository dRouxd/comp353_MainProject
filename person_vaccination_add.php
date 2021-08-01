<?php include 'mysql_queries.php'; ?>
<?php
$person_id = $_GET["person_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the new vaccination to the database
    
    header("Location: person_edit.php?person_id=" . $person_id);
    die();
}

# TODO: Get Vaccines received from mysql
$vaccines = 
[
["vaccine_id" => "1", "brand" => "moderna"],
["vaccine_id" => "2", "brand" => "pfizer"] 
];

# TODO: Get employees from mysql
$employees = [
    ["eid" => "1", "name" => "Matilda Grouch"],
    ["eid" => "2", "name" => "Joe Beau"]
];

# TODO: Get HSOs from mysql
$HSOs = [
    ["facility_id" => "1", "name" => "CHUM"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Person Vaccination</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<h3>Vaccination Details</h3>
<form class="inForm" action="/person_vaccination_add.php?person_id=<?php print($person_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="vaccination_date">Vaccination Date: </label>
        <input class="inForm" name="vaccination_date"  id="vaccination_date" type="date">
    </p>
    <p class="inForm">
        <label class="inForm" for="brand">Brand: </label>
        
        <select class="inForm" name="brand" id="brand">
<?php
foreach($vaccines as $v)
{
?>           <option value="<?php print($v["vaccine_id"]); ?>"><?php print($v["brand"]); ?></option>
<?php
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="employee">Employee: </label>
        
        <select class="inForm" name="employee" id="employee">
<?php
foreach($employees as $e)
{
?>           <option value="<?php print($e["eid"]); ?>"><?php print($e["name"]); ?></option>
<?php
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="hso">HSO Location: </label>
        
        <select class="inForm" name="hso" id="hso">
<?php
foreach($HSOs as $h)
{
?>           <option value="<?php print($h["facility_id"]); ?>"><?php print($h["name"]); ?></option>
<?php
}
?>
        </select>
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










