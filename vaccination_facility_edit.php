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

<h3>Vaccinations</h3>
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
        <td class="default"><a href="vaccination_facility.php?facility_id=<?php print($vaccine["facility_id"]); ?>"><?php print($vaccine["facility_name"]); ?></a></td>
        <td class="default"><a href="person_vaccination_edit.php?vaccination_id=<?php print($vaccine["vaccination_id"]); ?>">Edit</a></td>
    </tr>
<?php   
}
?>
</table>
<p>
<a href="person_vaccination_add.php?person_id=<?php print($person_id); ?>">Add Vaccination</a>
</p>

<h3>Infections</h3>

<table class="default">
    <tr class="default">
        <th class="default">Type</th>
        <th class="default">Infection Date</th>
    </tr>
<?php
foreach($infections as $infection)
{
?>
    <tr class="default">
        <td class="default"><?php print($infection["type"]); ?></td>
        <td class="default"><?php print($infection["date_of_infection"]); ?></td>
        <td class="default"><a href="person_infection_edit.php?infection_id=<?php print($infection["infection_id"]); ?>">Edit</a></td>
    </tr>
<?php   
}
?>
</table>
<p>
<a href="person_infection_add.php?person_id=<?php print($person_id); ?>">Add Infection</a>
</p>

<?php include 'tail.php'; ?>










