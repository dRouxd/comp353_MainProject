<?php include 'mysql_queries.php'; ?>
<?php
$person_id = $_GET["person_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: vaccine_detail.php?person_id=" . $person_id);
    die();
}

# TODO: Get vaccine data from mysql
$vaccine = 
[
    "vaccine_id" => 1,
    "brand" => "moderna",
    "current_status" => "APPROVED",
    "description" => "moderna description"
];

# TODO: Get history received from mysql
$histories = 
[

];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccine Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>
<h3>Details</h3>
<form class="inForm" action="/person_edit.php?person=<?php print($person_id); ?>"  method="post">
    <input type="hidden" id="person_id" name="person_id" value="<?php print($person_id); ?>">
    <p class="inForm">
        <label class="inForm" for="brand">Brand: </label>
        <input class="inForm" name="brand" id="brand" type="brand" value="<?php print($vaccine["brand"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="description">Description: </label>
        <input class="inForm" name="description" id="description" type="text" value="<?php print($vaccine["description"]); ?>">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<h3>History</h3>
<table class="default">
    <tr class="default">
        <th class="default">Dose Number</th>
        <th class="default">Vaccination Date</th>
        <th class="default">Brand</th>
        <th class="default">Employee Name</th>
        <th class="default">HSO Location</th>
    </tr>
<?php
foreach($vaccines as $vaccine)
{
?>
    <tr class="default">
        <td class="default"><?php print($vaccine["dose_number"]); ?></td>
        <td class="default"><?php print($vaccine["vaccination_date"]); ?></td>
        <td class="default"><a href="vaccine_detail.php?vaccine_id=<?php print($vaccine["vaccine_id"]); ?>"><?php print($vaccine["brand"]); ?></a></td>
        <td class="default"><a href="person_detail.php?person_id=<?php print($vaccine["eid"]); ?>"><?php print($vaccine["name"]); ?></a></td>
        <td class="default"><a href="hso_detail.php?facility_id=<?php print($vaccine["facility_id"]); ?>"><?php print($vaccine["facility_name"]); ?></a></td>
        <td class="default"><a href="vaccination_edit.php?vaccination_id=<?php print($vaccine["vaccination_id"]); ?>">Edit</a></td>
    </tr>
<?php   
}
?>
</table>
<a href="add_vaccination.php?person_id=<?php print($person_id); ?>">Add Vaccination</a>

<h3>Infections</h3>

<table class="default">
    <tr class="default">
        <th class="default">Type</th>
        <th class="default">Date of Infection</th>
    </tr>
<?php
foreach($infections as $infection)
{
?>
    <tr class="default">
        <td class="default"><?php print($infection["type"]); ?></td>
        <td class="default"><?php print($infection["date_of_infection"]); ?></td>
        <td class="default"><a href="infection_edit.php?infection_id=<?php print($infection["infection_id"]); ?>">Edit</a></td>
    </tr>
<?php   
}
?>
</table>
<a href="add_infection.php?person_id=<?php print($person_id); ?>">Add Infection</a>

<?php include 'tail.php'; ?>










