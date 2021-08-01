<?php include 'mysql_queries.php'; ?>
<?php
$facility_id = $_GET["facility_id"];

# TODO: Get facility information from mysql
$facility = 
[
    "name" => "CHUM",
    "address" => "123 mapple street",
    "province" => "QC",
    "phone" => "123-345-5678",
    "website" => "chum.com",
    "type" => "Hospital",
    "manager_id" => "1",
    "manager_name" => "Matilda Grouch"
];

# TODO: Get provinces from Mysql
$provinces = [
    "AB",
    "BC",
    "MB",
    "NB",
    "NL",
    "NS",
    "NT",
    "NU",
    "ON",
    "PE",
    "QC",
    "SK",
    "YT"
];

$managers = 
[
    ["eid" => "1", "name" => "Matilda Grouch"],
    ["eid" => "2", "name" => "Joe Beau"]
];

$vaccineInv =
[
    ["vaccine_id" => "1", "brand" => "moderna", "status" => "APPROVED", "description" => "moderna vaccine", "reception_date" => "2021-02-01", "available_dose" => "10"],
    ["vaccine_id" => "2", "brand" => "pfizer", "status" => "APPROVED", "description" => "pfizer vaccine", "reception_date" => "2021-05-01", "available_dose" => "69"]
];

$employment =
[
    ["eid" => "1", "name" => "Matilda Grouch", "start_date" => "2021-01-02"],
    ["eid" => "2", "name" => "Joe Beau", "start_date" => "2021-01-02"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccination Facility Detail</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<p>
<a href="vaccination_facility_edit.php?facility_id=<?php print($facility_id); ?>">Edit</a>
</p>

<h3>Details</h3>
<table class="default">
    <tr class="default">
        <th class="default">Name</th>
        <td class="default"><?php print($facility["name"]); ?></td>
    </tr>
    <tr class="default">
        <th class="default">Address</th>
        <td class="default"><?php print($facility["address"]); ?></td>
    </tr>
    <tr class="default">
        <th class="default">Province</th>
        <td class="default"><?php print($facility["province"]); ?></td>
    </tr>
    <tr class="default">
        <th class="default">Phone</th>
        <td class="default"><?php print($facility["phone"]); ?></td>
    </tr>
    <tr class="default">
        <th class="default">Website</th>
        <td class="default"><a href="<?php print($facility["website"]); ?>"><?php print($facility["website"]); ?></a></td>
    </tr>
    <tr class="default">
        <th class="default">Type</th>
        <td class="default"><?php print($facility["type"]); ?></td>
    </tr>
    <tr class="default">
        <th class="default">Manager</th>
        <td class="default"><a href="health_worker_detail.php?eid=<?php print($facility["manager_id"]); ?>"><?php print($facility["manager_name"]); ?></a></td>
    </tr>
<table>

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
    </tr>
<?php   
}
?>
</table>

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
    </tr>
<?php   
}
?>
</table>
<?php include 'tail.php'; ?>










