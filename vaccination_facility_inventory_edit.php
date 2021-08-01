<?php include 'mysql_queries.php'; ?>
<?php
$facility_id = $_GET["facility_id"];
$vaccine_id = $_GET["vaccine_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: vaccination_facility_detail.php?facility_id=" . $facility_id);
    die();
}

$vaccine =
[
"vaccine_id" => "1", "brand" => "moderna", "status" => "APPROVED", "description" => "moderna vaccine", "reception_date" => "2021-02-01", "available_dose" => "10"
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccination Facility Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<p>
<a href="vaccination_facility_inventory_delete.php?facility_id=<?php print($facility_id); ?>&vaccine_id=<?php print($vaccine_id); ?>">Delete</a>
</p>

<h3>Edit <?php print($vaccine["brand"]); ?> Inventory</h3>
<form class="inForm" action="/vaccination_facility_inventory_edit.php?facility_id=<?php print($facility_id); ?>&vaccine_id=<?php print($vaccine_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="doses">Dose Available: </label>
        <input class="inForm" name="doses" id="doses" type="number" min="0" value="<?php print($vaccine["available_dose"]); ?>">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










