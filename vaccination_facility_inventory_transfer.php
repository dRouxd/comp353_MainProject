<?php include 'mysql_queries.php'; ?>
<?php
$facility_id = $_GET["facility_id"];
$vaccine_id = $_GET["vaccine_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: vaccination_facility_edit.php?facility_id=" . $facility_id);
    die();
}

$facility = 
[
    "name" => "CHUM"
];

$facilities = [
    [
        "facility_id" => "1",
        "name" => "CHUM2"
    ],
    [
        "facility_id" => "2",
        "name" => "CHUM"
    ]
];

$vaccine =
[
    "brand" => "moderna", "available_dose" => "10"
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Transfer Vaccine</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>


<h3>Transfer <?php print($vaccine["brand"]); ?> Vaccine from <?php print($facility["name"]); ?></h3>
<form class="inForm" action="/vaccination_facility_inventory_transfer.php?facility_id=<?php print($facility_id); ?>&vaccine_id=<?php print($vaccine_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="facility">Vaccination Facility: </label>
        <select class="inForm" name="facility" id="facility">
<?php
foreach($facilities as $f)
{
?>           <option value="<?php print($f["facility_id"]); ?>"><?php print($f["name"]); ?></option>
<?php
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="doses">Dose: </label>
        <input class="inForm" name="doses" id="doses" type="number" min="0" max="<?php print($vaccine["available_dose"]); ?>">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










