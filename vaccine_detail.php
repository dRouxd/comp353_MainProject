<?php include 'mysql_queries.php'; ?>
<?php
$vaccine_id = $_GET["vaccine_id"];

# TODO: Get vaccine data from mysql
$vaccine = 
[
    "vaccine_id" => 1,
    "brand" => "moderna",
    "current_status" => "APPROVED",
    "description" => "moderna description"
];

$vaccine=getVaccineById($vaccine_id); 

# TODO: Get history received from mysql
$histories = 
[
    ["status" => "TESTING", "approved_date" => "2021-01-01", "end_date" => "2021-03-01"],
    ["status" => "APPROVED", "approved_date" => "2021-03-01", "end_date" => "null"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccine Details</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<p>
<a href="vaccine_edit.php?vaccine_id=<?php print($vaccine_id); ?>">Edit</a>
</p>
<h3>Details</h3>

<table class="default">
    <tr class="default">
        <th class="default">Brand</th>
        <td class="default"><?php print($vaccine["brand"]); ?></td>
    </tr>
    <tr class="default">
        <th class="default">Current Status</th>
        <td class="default"><?php print($vaccine["current_status"]); ?></td>
    </tr>
    <tr class="default">
        <th class="default">Approval Date</th>
        <td class="default"><?php print($vaccine["approval_date"]); ?></td>
    </tr>
    <tr class="default">
        <th class="default">Suspended Date</th>
        <td class="default"><?php print($vaccine["suspended_date"]); ?></td>
    </tr>
    <tr class="default">
        <th class="default">Description</th>
        <td class="default"><?php print($vaccine["description"]); ?></td>
    </tr>
</table>


<h3>History</h3>
<table class="default">
    <tr class="default">
        <th class="default">Status</th>
        <th class="default">Approved Date</th>
        <th class="default">End Date</th>
    </tr>
<?php
foreach($histories as $history)
{
?>
    <tr class="default">
        <td class="default"><?php print($history["status"]); ?></td>
        <td class="default"><?php print($history["approved_date"]); ?></td>
        <td class="default"><?php print($history["end_date"]); ?></td>
    </tr>
<?php   
}
?>
</table>

<?php include 'tail.php'; ?>










