<?php include 'mysql_queries.php'; ?>
<?php
$facility_id = $_GET["facility_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: vaccination_facility_edit.php?facility_id=" . $facility_id);
    die();
}

$listVaccine = [
    [
        "vaccine_id" => 1,
        "brand" => "moderna"
    ],
    [
        "vaccine_id" => 2,
        "brand" => "pfizer"
    ]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccination Facility Inventory Add</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>


<h3>Add Vaccine Inventory</h3>
<form class="inForm" action="/vaccination_facility_inventory_add.php?facility_id=<?php print($facility_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="brand">Vaccine Brand: </label>
        <select class="inForm" name="brand" id="brand">
<?php
foreach($listVaccine as $v)
{
?>           <option value="<?php print($v["vaccine_id"]); ?>"><?php print($v["brand"]); ?></option>
<?php
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="doses">Available Dose: </label>
        <input class="inForm" name="doses" id="doses" type="number" min="0">
    </p>
    <p class="inForm">
        <label class="inForm" for="reception_date">Reception Date: </label>
        <input class="inForm" name="reception_date" id="reception_date" type="date">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










