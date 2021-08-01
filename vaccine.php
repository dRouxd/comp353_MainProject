<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccine</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>
<?php include 'mysql_queries.php'; ?>

<table class="default">
    <tr class="default">
        <th class="default">Brand</th>
        <th class="default">Current Status</th>
        <th class="default">Description</th>
    </tr>

<?php

$listVaccine = [[
    "vaccine_id" => 1,
    "brand" => "moderna",
    "current_status" => "APPROVED",
    "description" => "moderna description"
],
[
    "vaccine_id" => 2,
    "brand" => "pfizer",
    "current_status" => "APPROVED",
    "description" => "pfizer description"
]];

foreach($listVaccine as $vaccine)
{
?>  <tr class="default">
        <td class="default"><?php print($person["brand"]); ?></td>
        <td class="default"><?php print($person["current_status"]); ?></td>
        <td class="default"><?php print($person["description"]); ?></td>
        <td class="default"><a href="vaccine_detail.php?vaccine_id=<?php print($vaccine["vaccine_id"]); ?>">Detail</a> <a href="vaccine_edit.php?vaccine_id=<?php print($vaccine["vaccine_id"]); ?>">Edit</a></td>
    </tr>
<?php
}

?>

</table>

<?php include 'tail.php'; ?>