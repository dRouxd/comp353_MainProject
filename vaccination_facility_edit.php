<?php include 'mysql_queries.php'; ?>
<?php
$facility_id = $_GET["facility_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: vaccination_facility_detail.php?facility_id=" . $facility_id);
    die();
}

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
<title>Vaccination Facility Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<p>
<a href="vaccination_facility_delete.php?facility_id=<?php print($facility_id); ?>">Delete</a>
</p>

<h3>Edit Details</h3>
<form class="inForm" action="/vaccination_facility_edit.php?facility_id=<?php print($facility_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="name">Name: </label>
        <input class="inForm" name="name" id="name" type="text" value="<?php print($facility["name"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="address">Address: </label>
        <input class="inForm" name="address" id="address" type="text" value="<?php print($facility["address"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="province">Province: </label>
        <select class="inForm" name="province" id="province">
<?php
foreach($provinces as $p)
{
?>           <option value="<?php print($p); ?>" <?php if($p == $facility["province"]) print('selected="selected"'); ?>><?php print($p); ?></option>
<?php
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="phone">Phone: </label>
        <input class="inForm" name="phone"  id="phone" type="text" value="<?php print($facility["phone"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="website">Website: </label>
        <input class="inForm" name="website"  id="website" type="text" value="<?php print($facility["website"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="manager">Manager: </label>
        <select class="inForm" name="manager" id="manager">
<?php
foreach($managers as $m)
{
?>           <option value="<?php print($m["eid"]); ?>" <?php if($m["eid"] == $facility["manager_id"]) print('selected="selected"'); ?>><?php print($m["name"]); ?></option>
<?php
}
?>
        </select>
    </p>
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
        <td class="default"><a href="vaccination_facility_inventory_edit.php?facility_id=<?php print($facility_id); ?>&vaccine_id=<?php print($inv["vaccine_id"]); ?>">Edit</a> <a href="vaccination_facility_inventory_delete.php?facility_id=<?php print($facility_id); ?>&vaccine_id=<?php print($vaccine["vaccine_id"]); ?>">Delete</a> <a href="vaccination_facility_inventory_transfer.php?facility_id=<?php print($facility_id); ?>&vaccine_id=<?php print($vaccine["vaccine_id"]); ?>">Transfer To</a></td>
    </tr>
<?php   
}
?>
</table>
<p>
<a href="vaccination_facility_inventory_add.php?person_id=<?php print($person_id); ?>">Add Vaccine</a>
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
        <td class="default"><a href="health_worker_detail.php?eid=<?php print($e["eid"]); ?>"><?php print($e["eid"]); ?></a></td>
        <td class="default"><?php print($e["name"]); ?></td>
        <td class="default"><?php print($e["start_date"]); ?></td>
        <td class="default"><a href="vaccination_facility_employment_edit.php?facility_id=<?php print($facility_id); ?>&eid=<?php print($e["eid"]); ?>">Edit</a></td>
    </tr>
<?php   
}
?>
</table>
<p>
<a href="vaccination_facility_employment_add.php?facility_id=<?php print($facility_id); ?>">Add Employment</a>
</p>

<?php include 'tail.php'; ?>










