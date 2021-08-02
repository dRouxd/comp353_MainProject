<?php include 'mysql_queries.php'; ?>
<?php
$facility_id = $_GET["facility_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: vaccination_facility_detail.php?facility_id=" . $facility_id);
    die();
}

$ageGroups = [
    ["ageGroupNumber" => "1", "lowerBound" => "80", "upperBound" => "200"],
    ["ageGroupNumber" => "2", "lowerBound" => "70", "upperBound" => "79"],
    ["ageGroupNumber" => "3", "lowerBound" => "60", "upperBound" => "69"],
    ["ageGroupNumber" => "4", "lowerBound" => "50", "upperBound" => "59"],
    ["ageGroupNumber" => "5", "lowerBound" => "40", "upperBound" => "49"],
    ["ageGroupNumber" => "6", "lowerBound" => "30", "upperBound" => "39"],
    ["ageGroupNumber" => "7", "lowerBound" => "18", "upperBound" => "29"],
    ["ageGroupNumber" => "8", "lowerBound" => "12", "upperBound" => "17"],
    ["ageGroupNumber" => "9", "lowerBound" => "5", "upperBound" => "11"],
    ["ageGroupNumber" => "10", "lowerBound" => "0", "upperBound" => "4"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Age Group Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<h3>Age Group Edit</h3>
<form class="inForm" action="/age_group_edit.php"  method="post">
    
<?php
foreach($ageGroups as $age)
{
?>
    <p class="inForm">
        <label class="inForm">Age Group <?php print($age["ageGroupNumber"]); ?>: </label>
        <input class="inForm" name="lowerbound<?php print($age["ageGroupNumber"]); ?>" type="text" value="<?php print($age["lowerBound"]); ?>">
        <input class="inForm" name="upperbound<?php print($age["ageGroupNumber"]); ?>" type="text" value="<?php print($age["upperBound"]); ?>">
    </p>
<?php
}
?>
    <input type="submit" name="save" value="Save"/>
</form>

<h3>Vaccine Inventory</h3>
<table class="default">
    <tr class="default">
        <th class="default">Brand</th>
        <th class="default">Status</th>
        <th class="default">Description</th>
        <th class="default">Reception Date</th>
        <th class="default">Available Doses</th>
    </tr>
<?php
foreach($vaccineInv as $inv)
{
?>
    <tr class="default">
        <td class="default"><a href="vaccine_detail.php?vaccine_id=<?php print($inv["vaccine_id"]); ?>"><?php print($inv["brand"]); ?></a></td>
        <td class="default"><?php print($inv["status"]); ?></td>
        <td class="default"><?php print($inv["description"]); ?></td>
        <td class="default"><?php print($inv["reception_date"]); ?></td>
        <td class="default"><?php print($inv["available_dose"]); ?></td>
        <td class="default"><a href="vaccination_facility_inventory_edit.php?facility_id=<?php print($facility_id); ?>&vaccine_id=<?php print($inv["vaccine_id"]); ?>">Edit</a> <a href="vaccination_facility_inventory_transfer.php?facility_id=<?php print($facility_id); ?>&vaccine_id=<?php print($vaccine["vaccine_id"]); ?>">Transfer To</a></td>
    </tr>
<?php   
}
?>
</table>
<p>
<a href="vaccination_facility_inventory_add.php?facility_id=<?php print($facility_id); ?>">Add Vaccine Inventory</a>
</p>

<h3>Employment</h3>
<table class="default">
    <tr class="default">
        <th class="default">Employee ID</th>
        <th class="default">Name</th>
        <th class="default">Start Date</th>
    </tr>
<?php
foreach($employment as $e)
{
?>
    <tr class="default">
        <td class="default"><?php print($e["eid"]); ?></td>
        <td class="default"><a href="health_worker_detail.php?eid=<?php print($e["eid"]); ?>"><?php print($e["name"]); ?></a></td>
        <td class="default"><?php print($e["start_date"]); ?></td>
        <td class="default"><a href="vaccination_facility_employment_end.php?facility_id=<?php print($facility_id); ?>&eid=<?php print($e["eid"]); ?>">End Employment</a></td>
    </tr>
<?php   
}
?>
</table>
<p>
<a href="vaccination_facility_employment_add.php?facility_id=<?php print($facility_id); ?>">Add Employment</a>
</p>

<?php include 'tail.php'; ?>










