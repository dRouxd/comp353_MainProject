<?php include 'mysql_queries.php'; ?>
<?php
$vaccination_id = $_GET["vaccination_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    # TODO: Get the person if using the vaccination id
    
    $person_id = "1";
    header("Location: person_edit.php?person_id=" . $person_id);
    die();
}

# TODO: Get Vaccines received from mysql
$vaccination = 
["vaccination_date" => "2021-02-01", "vaccine_id" => "1", "brand" => "moderna", "eid" => "6", "name" => "Matilda Grouch", "facility_id" => "1", "facility_name" => "CHUM"];


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
<title>Person Vaccination Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<a href="person_vaccination_delete.php?vaccination_id=<?php print($vaccination_id); ?>">Delete</a>
<h3>Edit Details</h3>
<form class="inForm" action="/person_vaccination_edit.php?vaccination_id=<?php print($vaccination_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="vaccination_date">Vaccination Date: </label>
        <input class="inForm" name="vaccination_date"  id="vaccination_date" type="date" value="<?php print($vaccination["vaccination_date"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="brand">Brand: </label>
        
        <select class="inForm" name="brand" id="brand">
<?php
foreach($vaccines as $v)
{
    if($v["vaccine_id"] == $vaccination["vaccine_id"])
    {
?>           <option value="<?php print($v["vaccine_id"]); ?>" selected="selected"><?php print($v["brand"]); ?></option>
<?php
    }
    else
    {
?>           <option value="<?php print($v["vaccine_id"]); ?>"><?php print($v["brand"]); ?></option>
<?php
    }
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
    if($e["eid"] == $vaccination["eid"])
    {
?>           <option value="<?php print($e["eid"]); ?>" selected="selected"><?php print($e["name"]); ?></option>
<?php
    }
    else
    {
?>           <option value="<?php print($e["eid"]); ?>"><?php print($e["name"]); ?></option>
<?php
    }
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
    if($h["facility_id"] == $vaccination["facility_id"])
    {
?>           <option value="<?php print($h["facility_id"]); ?>"><?php print($h["name"]); ?></option>
<?php
    }
    else
    {
?>           <option value="<?php print($h["facility_id"]); ?>" selected="selected"><?php print($h["name"]); ?></option>
<?php
    }
}
?>
        </select>
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










